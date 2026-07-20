<?php

namespace Wahyurejeki\Oalcompiler\Laravel;

use Wahyurejeki\Oalcompiler\BaseCompiler;

class LaravelControllerCompiler extends BaseCompiler
{
    private $controllers = [];
    private $usedModels = [];
    private $modelMetadata = [];

    public function setModelMetadata($metadata) { $this->modelMetadata = $metadata; }

    public function visitControllerStmt($ctx)
    {
        $name = $ctx->ID()->getText();
        $methods = [];
        $bodies = $ctx->controllerBody();
        if (!is_array($bodies)) $bodies = [$bodies];
        foreach ($bodies as $body) $methods[] = $this->visit($body->controllerMethod());

        $txtMethod = implode("\n\n", $methods);
        $imporUsedModels = $this->importUsedModels($name);
        $externalImports = $this->getExternalImportsCode();
        
        $facades = "";
        if (str_contains($txtMethod, 'Cookie::')) {
            $facades .= "use Illuminate\Support\Facades\Cookie;\n";
        }

        $controllerCode = <<<PHP
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
$imporUsedModels
$externalImports
$facades

class $name extends Controller {
$txtMethod
}
PHP;
        $this->controllers[$name] = $controllerCode;
        return $controllerCode;
    }

    private function importUsedModels($controllerName)
    {
        $str = '';
        if (!empty($this->usedModels[$controllerName])) {
            foreach ($this->usedModels[$controllerName] as $m) $str .= "use App\Models\\$m;\n";
        }
        return $str;
    }

    private function guessMainModel($controllerName)
    {
        $modelGuess = str_replace('Controller', '', $controllerName);
        if (isset($this->modelMetadata[$modelGuess])) return $modelGuess;
        $modelGuessSingular = preg_replace('/ies$/', 'y', $modelGuess);
        if (isset($this->modelMetadata[$modelGuessSingular])) return $modelGuessSingular;
        $modelGuessSingular = preg_replace('/s$/', '', $modelGuess);
        if (isset($this->modelMetadata[$modelGuessSingular])) return $modelGuessSingular;
        if (!empty($this->usedModels[$controllerName])) return array_values($this->usedModels[$controllerName])[0];
        return 'BaseModel';
    }

    private function guessNameField($modelName)
    {
        $nameField = 'name';
        if (isset($this->modelMetadata[$modelName])) {
            $fields = array_keys($this->modelMetadata[$modelName]);
            foreach (['name', 'full_name', 'title', strtolower($modelName) . '_name'] as $candidate) {
                if (in_array($candidate, $fields)) {
                    $nameField = $candidate;
                    break;
                }
            }
        }
        return $nameField;
    }

    public function visitControllerMethod($ctx)
    {
        $name = $ctx->CONTROLLER_METHOD_NAME()->getText();
        $controllerName = $this->getCurrentControllerName($ctx);
        $params = ['Request $request'];
        
        if ($ctx->parameterList()) {
            $plist = $ctx->parameterList()->parameter();
            if (!is_array($plist)) $plist = [$plist];
            foreach ($plist as $p) {
                // If there are multiple IDs, the last one is the variable name
                $ids = $p->ID();
                if (!is_array($ids)) $ids = [$ids];
                $type = count($ids) === 2 ? $ids[0]->getText() : null;
                $varName = $ids[count($ids) - 1]->getText();
                
                // Skip if it is Request type or named req/request
                if ($type === 'Request' || $varName === 'req' || $varName === 'request') {
                    continue;
                }
                $params[] = '$' . $varName;
            }
        }

        $bodyCode = $this->visit($ctx->block());
        return "    public function $name(" . implode(', ', $params) . ") $bodyCode";
    }

    public function visitVarStmt($ctx)
    {
        $varName = '$' . $ctx->ID()->getText();
        $val = $this->visit($ctx->expression());
        
        if (is_string($val) && str_contains($val, 'if ($request->ajax())')) {
            return $val;
        }

        if (is_string($val) && (str_contains($val, 'new ') || str_contains($val, '->') || str_contains($val, '('))) {
            if (str_starts_with($val, $varName . ' =')) return $val . ';';
            $expr = $val;
        } else {
            $expr = $this->phpCode($val);
        }
        
        return "$varName = $expr;";
    }

    public function visitAssignmentStmt($ctx)
    {
        $varName = '$' . $ctx->ID()->getText();
        $val = $this->visit($ctx->expression());

        if (is_string($val) && str_contains($val, 'if ($request->ajax())')) {
            return $val;
        }

        if (is_string($val) && (str_contains($val, 'new ') || str_contains($val, '->') || str_contains($val, '('))) {
            if (str_starts_with($val, $varName . ' =')) return $val . ';';
            $expr = $val;
        } else {
            $expr = $this->phpCode($val);
        }

        return "$varName = $expr;";
    }

    public function visitModelMethodCall($ctx)
    {
        $varName = $this->getVariableName($ctx);
        $controllerName = $this->getCurrentControllerName($ctx);
        $model = $ctx->ID()->getText();
        $this->usedModels[$controllerName][$model] = $model;
        $method = $ctx->MODEL_METHOD()->getText();
        $argsCode = ($paramsCtx = $ctx->modelMethodParams()) ? $this->visit($paramsCtx) : [];

        switch ($method) {
            case 'modelDataTable': return $this->buildDataTableLogic($controllerName, $model, $varName);
            case 'modelFindAll': return "$model::query()" . $this->buildWhere($argsCode[0] ?? []) . "->get()";
            case 'modelFindOne': return "$model::query()" . $this->buildWhere($argsCode[0] ?? []) . "->first()";
            case 'modelCreate': return $this->buildOrmCreate($varName, $model, $argsCode[0] ?? []);
            case 'modelUpdate': return $this->buildOrmUpdate($varName, $model, $argsCode[0] ?? [], $argsCode[1] ?? []);
            case 'modelDelete': return "$model::query()" . $this->buildWhere($argsCode[0] ?? []) . "->delete()";
            case 'modelCount': return "$model::query()" . $this->buildWhere($argsCode[0] ?? []) . "->count()";
            default: return "// Unknown: $method";
        }
    }

    private function buildDataTableLogic($controllerName, $mainModel, $varName)
    {
        $fields = $this->modelMetadata[$mainModel] ?? ['id' => 'integer', 'name' => 'string'];
        $allowedColumns = "";
        $searchLogicArr = [];
        $rowMapping = "";
        $eagerLoads = [];

        foreach ($fields as $fName => $fType) {
            $allowedColumns .= "                '$fName' => '$fName',\n";
            if (str_ends_with($fName, '_id')) {
                $relationName = str_replace('_id', '', $fName);
                $relatedModel = ucfirst($relationName);
                $this->usedModels[$controllerName][$relatedModel] = $relatedModel;
                $eagerLoads[] = "'$relationName'";
                $relatedNameField = $this->guessNameField($relatedModel);
                $method = empty($searchLogicArr) ? "whereHas" : "orWhereHas";
                $searchLogicArr[] = "{$method}('$relationName', function(\$query) use (\$globalSearch) { \$query->where('$relatedNameField', 'LIKE', \"%\$globalSearch%\"); })";
                $rowMapping .= "                \$row['$fName'] = \$item->{$fName};\n";
                $rowMapping .= "                \$row['{$relationName}_name'] = \$item->{$relationName}->{$relatedNameField} ?? '-';\n";
            } else {
                $method = empty($searchLogicArr) ? "where" : "orWhere";
                $searchLogicArr[] = "{$method}('$fName', 'LIKE', \"%\$globalSearch%\")";
                $rowMapping .= "                \$row['$fName'] = \$item->$fName;\n";
            }
        }

        $searchLogic = implode("\n                    ->", $searchLogicArr);
        $withClause = !empty($eagerLoads) ? "->with([" . implode(', ', $eagerLoads) . "])" : "";
        $nameFieldForSelect2 = $this->guessNameField($mainModel);
        $v = $varName ?? '$data';

        return <<<PHP
$v = [];
        if (\$request->ajax()) {
            if (\$request->input('type') === 'select2') {
                \$search = trim((string) \$request->input('q', ''));
                \$query = $mainModel::query();
                if (\$search !== '') {
                    \$query->where('$nameFieldForSelect2', 'LIKE', "%\$search%");
                }
                \$items = \$query->take(20)->get();
                return response()->json([
                    'results' => \$items->map(fn (\$item) => ['id' => \$item->id, 'text' => \$item->$nameFieldForSelect2])
                ]);
            }

            \$draw = (int) \$request->input('draw', 0);
            \$start = (int) \$request->input('start', 0);
            \$length = (int) \$request->input('length', 10);
            \$globalSearch = trim((string) \$request->input('search.value', ''));

            \$allowedColumns = [
$allowedColumns            ];

            \$baseQuery = $mainModel::query()$withClause;
            \$recordsTotal = (clone \$baseQuery)->count();

            if (\$globalSearch !== '') {
                \$baseQuery->where(function (\$q) use (\$globalSearch) {
                    \$q->$searchLogic;
                });
            }

            \$recordsFiltered = (clone \$baseQuery)->count();

            \$order = \$request->input('order', []);
            \$columns = \$request->input('columns', []);
            if (is_array(\$order) && count(\$order) > 0) {
                foreach (\$order as \$ord) {
                    \$colIndex = (int) (\$ord['column'] ?? 0);
                    \$dir = strtolower(\$ord['dir'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
                    \$colName = \$columns[\$colIndex]['data'] ?? \$columns[\$colIndex]['name'] ?? 'id';
                    \$dbCol = \$allowedColumns[\$colName] ?? 'id';
                    \$baseQuery->orderBy(\$dbCol, \$dir);
                }
            } else {
                \$baseQuery->orderBy('id', 'desc');
            }

            if (\$length !== -1) {
                \$baseQuery->skip(\$start)->take(\$length);
            }

            \$items = \$baseQuery->get();
            \$dataRows = [];
            \$dtIndex = \$start + 1;

            foreach (\$items as \$item) {
                \$row = [];
                \$row['DT_RowIndex'] = \$dtIndex;
$rowMapping
                \$row['action'] = \$item->id;
                \$dataRows[] = \$row;
                \$dtIndex++;
            }

            return response()->json([
                'draw' => \$draw,
                'recordsTotal' => \$recordsTotal,
                'recordsFiltered' => \$recordsFiltered,
                'data' => \$dataRows,
            ]);
        }
PHP;
    }

    public function visitValidateStmt($ctx)
    {
        $rules = $this->phpCode($this->visit($ctx->arrayLiteral()));
        return "\$request->validate($rules);";
    }

    private function getVariableName($ctx)
    {
        $parent = $ctx->getParent();
        while ($parent !== null) {
            if (get_class($parent) === 'Context\VarStmtContext' || get_class($parent) === 'Context\AssignmentStmtContext') return '$' . $parent->ID()->getText();
            $parent = $parent->getParent();
        }
        return null;
    }

    private function getCurrentControllerName($ctx)
    {
        $parent = $ctx->getParent();
        while ($parent !== null) {
            if (get_class($parent) === 'Context\ControllerStmtContext') return $parent->ID()->getText();
            $parent = $parent->getParent();
        }
        return null;
    }

    public function visitModelMethodParams($ctx)
    {
        $arrays = $ctx->arrayLiteral();
        if (!is_array($arrays)) $arrays = [$arrays];
        $out = [];
        foreach ($arrays as $a) $out[] = $this->visit($a);
        return $out;
    }

    private function buildWhere($args)
    {
        $where = '';
        foreach ($args as $key => $value) {
            $key = preg_replace('/["\']/', '', $key);
            if (is_array($value) && count($value) === 2 && is_string($value[0])) {
                $op = preg_replace('/["\']/', '', $value[0]);
                $valPhp = $this->phpValue($value[1]);
                if ($valPhp === 'null') {
                    if ($op === '!=') {
                        $where .= "->whereNotNull('$key')";
                    } else {
                        $where .= "->whereNull('$key')";
                    }
                } else {
                    $where .= "->where('$key', '$op', $valPhp)";
                }
            } else {
                $valPhp = $this->phpValue($value);
                if ($valPhp === 'null') {
                    $where .= "->whereNull('$key')";
                } else {
                    $where .= "->where('$key', $valPhp)";
                }
            }
        }
        return $where;
    }

    private function buildOrmCreate($varName, $model, $args)
    {
        $v = $varName ?? '$temp';
        $str = "$v = new $model();\n";
        foreach ($args as $key => $val) {
            $k = preg_replace('/["\']/', '', $key);
            $str .= "        " . $v . "->" . $k . " = " . $this->phpValue($val) . ";\n";
        }
        $str .= "        " . $v . "->save()";
        return $str;
    }

    private function buildOrmUpdate($varName, $model, $where, $updates)
    {
        $v = $varName ?? '$temp';
        $str = "$v = $model::query()" . $this->buildWhere($where) . "->first();\n";
        if (empty($updates)) return $str;
        
        foreach ($updates as $key => $val) {
            $k = preg_replace('/["\']/', '', $key);
            $str .= "        " . $v . "->" . $k . " = " . $this->phpValue($val) . ";\n";
        }
        $str .= "        " . $v . "->save()";
        return $str;
    }

    public function visitResponseFunction($ctx) { return parent::visitResponseFunction($ctx); }

    public function generateBladeFile($viewPath)
    {
        $fullPath = __DIR__ . '/../../template/resources/views/' . str_replace('.', '/', $viewPath) . '.blade.php';
        if (!is_dir(dirname($fullPath))) mkdir(dirname($fullPath), 0755, true);
        
        $title = ucfirst(str_replace(['.', '_'], ' ', $viewPath));
        $parts = explode('.', $viewPath);
        $folderName = $parts[0];
        
        $modelGuess = ucfirst($folderName);
        if (!isset($this->modelMetadata[$modelGuess])) {
            if (str_ends_with(strtolower($folderName), 'ies')) {
                $modelGuess = ucfirst(substr($folderName, 0, -3) . 'y');
            } elseif (str_ends_with(strtolower($folderName), 's')) {
                $modelGuess = ucfirst(substr($folderName, 0, -1));
            }
        }
        
        if (!isset($this->modelMetadata[$modelGuess])) {
            foreach ($this->modelMetadata as $mName => $meta) {
                if (strtolower($mName) === strtolower($modelGuess) || strtolower($this->pluralize($mName)) === strtolower($folderName)) {
                    $modelGuess = $mName;
                    break;
                }
            }
        }
        
        $fields = $this->modelMetadata[$modelGuess] ?? ['id' => 'integer', 'name' => 'string'];

        if (str_contains($viewPath, 'index') || str_contains($viewPath, 'list')) {
            $content = $this->generateDataTableHTML($title, $fields, $viewPath);
        } elseif (str_contains($viewPath, 'create') || str_contains($viewPath, 'add') || str_contains($viewPath, 'edit')) {
            $isEdit = str_contains($viewPath, 'edit');
            $content = $this->generateCrudForm($title, $fields, $isEdit, $viewPath);
        } else {
            $content = $this->generateDefaultViewContent($title, $viewPath);
        }

        $finalBlade = <<<BLADE
@extends('layouts.admin')

@section('content')
$content
@endsection
BLADE;
        file_put_contents($fullPath, $finalBlade);
    }

    private function generateDataTableHTML($title, $fields, $viewPath)
    {
        $headers = "<th>No</th>\n";
        $jsColumns = "{ data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },\n";
        
        foreach ($fields as $name => $type) {
            if (str_ends_with($name, '_id')) {
                $relationName = str_replace('_id', '', $name);
                $displayName = ucfirst($relationName);
                $headers .= "<th>{$displayName}</th>\n";
                $jsColumns .= "{ data: '{$relationName}_name', name: '{$relationName}_name', className: 'text-center' },\n";
            } else {
                $headers .= "<th>" . ucfirst($name) . "</th>\n";
                if ($name === 'image') {
                    $jsColumns .= "{ data: 'image', name: 'image', className: 'text-center', orderable: false, searchable: false, render: function(data) { return '<img src=\"'+data+'\" width=\"100\" class=\"img-fluid rounded\">'; } },\n";
                } else {
                    $jsColumns .= "{ data: '$name', name: '$name', className: 'text-center' },\n";
                }
            }
        }
        $headers .= "<th>Aksi</th>";
        
        $folder = explode('.', $viewPath)[0];
        $urlBase = "{{ config('app.url') }}/" . $folder;
        $jsColumns .= <<<JS
{
    data: 'action',
    name: 'action',
    className: 'text-center',
    orderable: false,
    searchable: false,
    render: function(data, type, row) {
        let urlShow = `{$urlBase}/\${row.id}`;
        let urlEdit = `{$urlBase}/\${row.id}/edit`;
        let urlDelete = `{$urlBase}/\${row.id}`;
        return `
            <div class="dropdown dropdown-inline">
                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="navbar-nav px-3">
                        <li><a href="\${urlShow}" class="dropdown-item">Detail</a></li>
                        <li><a href="\${urlEdit}" class="dropdown-item">Edit</a></li>
                        <li><a href="javascript:void(0);" class="dropdown-item text-danger js-delete" data-id="\${row.id}" data-url="\${urlDelete}">Hapus</a></li>
                    </ul>
                </div>
            </div>`;
    }
}
JS;

        $tableId = str_replace('.', '-', $viewPath) . "-datatable";

        return <<<HTML
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{$title}</h1>
    <a href="#" class="btn btn-primary btn-sm shadow-sm"><i class="fas fa-plus fa-sm"></i> Tambah</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="{$tableId}" width="100%" cellspacing="0">
                <thead><tr>{$headers}</tr></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let table = $('#{$tableId}').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.href,
        columns: [
            {$jsColumns}
        ]
    });

    $(document).on('click', '.js-delete', function() {
        let id = $(this).data('id');
        let url = $(this).data('url');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                    }
                });
            }
        });
    });
});
</script>
HTML;
    }

    private function generateCrudForm($title, $fields, $isEdit = false, $viewPath = '')
    {
        $inputs = "";
        $hasDate = false;
        $hasDateTime = false;
        $hasSelect2 = false;

        foreach ($fields as $name => $type) {
            if ($name === 'id') continue;
            $label = ucfirst($name);
            $value = $isEdit ? "{{ \$data->$name ?? '' }}" : "";
            
            if (str_ends_with($name, '_id')) {
                $hasSelect2 = true;
                $relationName = str_replace('_id', '', $name);
                $plural = $this->pluralize(strtolower($relationName));
                $ajaxUrl = "{{ config('app.url') }}/" . $plural;
                $inputs .= "<div class=\"form-group\"><label>{$label}</label>";
                $inputs .= "<select name=\"{$name}\" class=\"form-control select2-ajax\" data-url=\"{$ajaxUrl}\">";
                if ($isEdit) {
                    $relatedName = $this->guessNameField(ucfirst($relationName));
                    $inputs .= "<option value=\"{{ \$data->$name }}\" selected>{{ \$data->{$relationName}->{$relatedName} ?? \$data->$name }}</option>";
                }
                $inputs .= "</select></div>\n";
            } elseif ($type === 'text') {
                $inputs .= "<div class=\"form-group\"><label>{$label}</label><textarea name=\"{$name}\" class=\"form-control\">{$value}</textarea></div>\n";
            } elseif ($type === 'date') {
                $hasDate = true;
                $inputs .= "<div class=\"form-group\"><label>{$label}</label><input type=\"text\" name=\"{$name}\" class=\"form-control datepicker\" value=\"{$value}\" autocomplete=\"off\"></div>\n";
            } elseif ($type === 'datetime' || $type === 'timestamp') {
                $hasDateTime = true;
                $inputs .= "<div class=\"form-group\"><label>{$label}</label><input type=\"text\" name=\"{$name}\" class=\"form-control datetimepicker\" value=\"{$value}\" autocomplete=\"off\"></div>\n";
            } else {
                $inputType = ($type === 'integer' || $type === 'float' || $type === 'double') ? 'number' : 'text';
                $inputs .= "<div class=\"form-group\"><label>{$label}</label><input type=\"{$inputType}\" name=\"{$name}\" class=\"form-control\" value=\"{$value}\"></div>\n";
            }
        }

        $methodField = $isEdit ? "@method('PUT')" : "";
        $actionUrl = $isEdit ? "{{ config('app.url') }}/" . explode('.', $viewPath)[0] . "/{{ \$data->id }}" : "#";

        $script = "";
        if ($hasDate || $hasDateTime || $hasSelect2) {
            $script = "\n<script>\n$(document).ready(function() {\n";
            if ($hasDate) $script .= "    $('.datepicker').datepicker({ format: 'yyyy-mm-dd', autoclose: true, todayHighlight: true });\n";
            if ($hasDateTime) $script .= "    $('.datetimepicker').datetimepicker({ format: 'YYYY-MM-DD HH:mm:ss', icons: { time: 'fas fa-clock', date: 'fas fa-calendar' } });\n";
            if ($hasSelect2) {
                $script .= <<<JS
    $('.select2-ajax').each(function() {
        let url = $(this).data('url');
        $(this).select2({
            placeholder: 'Pilih data',
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return { q: params.term, type: 'select2' };
                },
                processResults: function(data) {
                    return { results: data.results };
                },
                cache: true
            }
        });
    });
JS;
            }
            $script .= "});\n</script>\n";
        }

        return <<<HTML
<div class="card shadow mb-4">
    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">{$title}</h6></div>
    <div class="card-body">
        <form action="{$actionUrl}" method="POST">
            @csrf
            {$methodField}
            {$inputs}
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="#" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
{$script}
HTML;
    }

    private function generateDefaultViewContent($title, $viewPath)
    {
        return "<div class=\"card shadow mb-4\"><div class=\"card-body\">View: {$viewPath}</div></div>";
    }

    public function visitSessionFunction($ctx) { return parent::visitSessionFunction($ctx); }
    public function visitCookieFunction($ctx) { return parent::visitCookieFunction($ctx); }
    public function getControllers() { return $this->controllers; }
    public function getUsedModels() { return $this->usedModels; }
}
