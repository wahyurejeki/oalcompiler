<?php

namespace Wahyurejeki\Oalcompiler;

use OALBaseVisitor;

class CompilerController extends OALBaseVisitor
{
    private $controllers = [];
    private $usedModels = [];

    // ================= Controllers =================
    public function visitControllerStmt($ctx)
    {
        $name = $ctx->ID()->getText();
        $methods = [];

        $bodies = $ctx->controllerBody();
        if (!is_array($bodies)) $bodies = [$bodies];

        foreach ($bodies as $body) {
            $methods[] = $this->visit($body->controllerMethod());
        }

        $txtMethod = implode("\n\n", $methods);

        $imporUsedModels = $this->importUsedModels($name);

        $controllerCode = <<<PHP
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
$imporUsedModels

class $name extends Controller {
$txtMethod
}
PHP;

        $this->controllers[$name] = $controllerCode;
        return $controllerCode;
    }

    private function importUsedModels($controllerName)
    {
        $strImportModel = '';
        if (!empty($this->usedModels[$controllerName])) {
            foreach ($this->usedModels[$controllerName] as  $usedModel) {
                $strImportModel .= 'use App\Models\\'.$usedModel.';'."\n";
            }
        }

        return $strImportModel;
    }

    public function visitControllerMethod($ctx)
    {
        $name = $ctx->CONTROLLER_METHOD_NAME()->getText();
        $params = [];

        if ($ctx->parameterList()) {
            $plist = $ctx->parameterList()->parameter();
            if (!is_array($plist)) $plist = [$plist];
            foreach ($plist as $p) $params[] = $p->ID(0)->getText() . ' $' . $p->ID(1)->getText();
        }

        $body = [];
        $stmts = $ctx->block()->statement();
        if (!is_array($stmts)) $stmts = [$stmts];
        foreach ($stmts as $stmt) {
            $stmtCode = $this->visit($stmt);
            if ($stmtCode) $body[] = '        ' . $stmtCode;
        }

        $bodyCode = implode("\n", $body);
        return "    public function $name(" . implode(', ', $params) . ") {\n$bodyCode\n    }";
    }

    public function getControllers() { return $this->controllers; }

    public function getUsedModels() { return $this->usedModels; }

    // ================= Statements =================
    public function visitVarStmt($ctx)
    {
        $varName = '$' . $ctx->ID()->getText();
        $expr = $this->visit($ctx->expression());
        return "$varName = $expr;";
    }

    public function visitAssignmentStmt($ctx)
    {
        $varName = '$' . $ctx->ID()->getText();
        $expr = $this->visit($ctx->expression());
        return "$varName = $expr;";
    }

    public function visitExpressionStmt($ctx)
    {
        $expr = $this->visit($ctx->expression());
        if (!$expr) return ';';

        if (is_string($expr)) {
            if (preg_match('/^json\(/', $expr)) $expr = str_replace('json(', 'response()->json(', $expr);
            elseif (preg_match('/^html\(/', $expr)) $expr = str_replace('html(', 'response()->html(', $expr);
            elseif (preg_match('/^redirect\(/', $expr)) $expr = str_replace('redirect(', 'response()->redirect(', $expr);
            elseif (preg_match('/^print\(/', $expr)) $expr = str_replace('print(', 'echo(', $expr);
        }

        return "$expr;";
    }

    public function visitReturnStmt($ctx)
    {
        if ($ctx->expression()) {
            $expr = $this->visit($ctx->expression());
            if (is_string($expr) && preg_match('/^(response|echo)/', $expr)) return $expr . ';';
            return 'return ' . $expr . ';';
        }
        return 'return;';
    }

    public function visitIfStmt($ctx)
    {
        $cond = $this->visit($ctx->expression(0));
        $code = "if ($cond) " . $this->visit($ctx->block(0));

        $elseifCount = count($ctx->ELSEIF());
        for ($i = 0; $i < $elseifCount; $i++) {
            $elseifCond = $this->visit($ctx->expression($i + 1));
            $elseifBody = $this->visit($ctx->block($i + 1));
            $code .= " elseif ($elseifCond) $elseifBody";
        }

        if ($ctx->ELSE()) {
            $elseBody = $this->visit($ctx->block(count($ctx->block()) - 1));
            $code .= " else $elseBody";
        }

        return $code;
    }

    public function visitBlock($ctx)
    {
        $stmts = $ctx->statement();
        if (!is_array($stmts)) $stmts = [$stmts];

        $out = [];
        foreach ($stmts as $stmt) $out[] = '    ' . $this->visit($stmt);
        return "{\n" . implode("\n", $out) . "\n    }";
    }

    public function visitForStmt($ctx)
    {
        $init = $this->visit($ctx->varStmt());
        $cond = $this->visit($ctx->expression());
        $update = $this->visit($ctx->assignmentStmt());
        $body = $this->visit($ctx->block());

        return "for ($init $cond; $update) $body";
    }

    public function visitForeachStmt($ctx)
    {
        $var = '$' . $ctx->ID()->getText();
        $expr = $this->visit($ctx->expression());
        $body = $this->visit($ctx->block());

        return "foreach ($expr as $var) $body";
    }

    public function visitIdChain($ctx)
    {
        $ids = $ctx->ID();
        if (!is_array($ids)) $ids = [$ids];

        $out = '$' . $ids[0]->getText();
        for ($i = 1; $i < count($ids); $i++) {
            $name = $ids[$i]->getText();
            $out .= ($name === 'count') ? '->count()' : '->' . $name;
        }
        return $out;
    }

    public function visitFunctionCall($ctx)
    {
        $name = $ctx->ID()->getText();
        $args = [];

        if ($ctx->argumentList()) {
            $exprs = $ctx->argumentList()->expression();
            if (!is_array($exprs)) $exprs = [$exprs];
            foreach ($exprs as $e) $args[] = $this->visit($e);
        }

        switch ($name) {
            case 'json': return 'response()->json(' . implode(', ', $args) . ')';
            case 'html': return 'response()->html(' . implode(', ', $args) . ')';
            case 'redirect': return 'response()->redirect(' . implode(', ', $args) . ')';
            case 'print': return 'echo ' . implode(' . ', $args);
            default: return $name . '(' . implode(', ', $args) . ')';
        }
    }

    // ================= Model Methods =================
    private function buildWhereFromArgs($args)
    {
        if (!$args || !is_array($args)) return '';

        $where = '';
        foreach ($args as $key => $value) {
            if (is_array($value) && count($value) === 2 && is_string($value[0])) {
                $op = $value[0];
                $val = $this->phpValue($value[1]);

                $key = preg_replace('/"/','',$key);
                $key = preg_replace("/'/",'', $key);

                $op = preg_replace('/"/','',$op);
                $op = preg_replace("/'/",'', $op);

                $where .= "->where('$key', '$op', $val)";
            } else {
                $key = preg_replace('/"/','',$key);
                $key = preg_replace("/'/",'', $key);
                $val = $this->phpValue($value);
                $where .= "->where('$key', $val)";
            }
        }

        return $where;
    }

    private function buildOrmCreate($varName, $model, $args)
    {
        if (!$args || !is_array($args)) return '';
        $strOrm = '';
        if(empty($varName)){
            $varName = '$varName';
            $strOrm.= $varName.'=';
        }

        $strOrm.='new '. $model.'();'."\n";
        $txtObj = '';
        foreach ($args as $key => $value) {
            $key = preg_replace('/["\']/', '', $key);
            $txtObj.= $varName.'->'.$key.' = '.$this->phpValue($value).";\n";
        }
        $txtObj.=$varName.'->save()';
        $strOrm.=$txtObj;

        return $strOrm;
    }

    private function buildOrmUpdate($varName, $model, $where, $updates)
    {
        if (!$updates || !is_array($updates)) return '';
        $strOrm = '';
        if(empty($varName)){
            $varName = '$varName';
            $strOrm.= $varName.'=';
        }

        $whereParams= $this->buildWhereFromArgs($where);
        $strOrm.=$model.'::query()'.$whereParams.'->first();'."\n";
        $txtObj = '';
        foreach ($updates as $key => $value) {
            $key = preg_replace('/["\']/', '', $key);
            $txtObj.= $varName.'->'.$key.' = '.$this->phpValue($value).";\n";
        }
        $txtObj.=$varName.'->update()';
        $strOrm.=$txtObj;

        return $strOrm;
    }

    private function phpValue($value)
    {
        if (is_null($value)) return 'null';
        if (is_bool($value)) return $value ? 'true' : 'false';
        if (is_string($value)) {
            if (preg_match('/^\$[a-zA-Z_][a-zA-Z0-9_\->]*$/', $value)) return $value;
            return '"' . addslashes($value) . '"';
        }
        return $value;
    }

    private function getVariableName($ctx)
    {
        $parent = $ctx->getParent();
        while ($parent !== null) {
            $class = get_class($parent);
            if ($class === 'Context\VarStmtContext' || $class === 'Context\AssignmentStmtContext') {
                return '$' . $parent->ID()->getText();
            }
            $parent = $parent->getParent();
        }
        return null;
    }

    private function getCurrentControllerName($ctx)
    {
        $parent = $ctx->getParent();
        while ($parent !== null) {
            $class = get_class($parent);
            if ($class === 'Context\ControllerStmtContext') {
                return $parent->ID()->getText();
            }
            $parent = $parent->getParent();
        }
        return null;
    }

    public function visitModelMethodCall($ctx)
    {
        $varName = $this->getVariableName($ctx);
        $controllerName = $this->getCurrentControllerName($ctx);
        $model = $ctx->ID()->getText();
        $this->usedModels[$controllerName][$model] = $model;
        $method = $ctx->MODEL_METHOD()->getText();
        $paramsCtx = $ctx->modelMethodParams();
        $argsCode = [];

        if ($paramsCtx) {
            $tmp = $this->visit($paramsCtx);
            if (is_array($tmp)) $argsCode = $tmp;
        }

        switch ($method) {
            case 'modelFindAll':
                $where = $this->buildWhereFromArgs($argsCode[0] ?? []);
                return "$model::query()$where"."->get()";

            case 'modelFindOne':
                $where = $this->buildWhereFromArgs($argsCode[0] ?? []);
                return "$model::query()$where"."->first()";

            case 'modelCreate':
                $args = $argsCode[0] ?? [];
                return $this->buildOrmCreate($varName, $model, $args);

            case 'modelUpdate':
                $where =  $argsCode[0] ?? [];
                $updates = $argsCode[1] ?? [];
                return $this->buildOrmUpdate($varName, $model, $where, $updates);

            case 'modelDelete':
                $where = $this->buildWhereFromArgs($argsCode[0] ?? []);
                return "$model::query()$where"."->delete()";

            case 'modelCount':
                $where = $this->buildWhereFromArgs($argsCode[0] ?? []);
                return "$model::query()$where"."->count()";

            default:
                return "// Unknown model method: $method";
        }
    }

    public function visitModelMethodParams($ctx)
    {
        $arrays = $ctx->arrayLiteral();
        if (!is_array($arrays)) $arrays = [$arrays];
        $out = [];
        foreach ($arrays as $a) $out[] = $this->visit($a);
        return $out;
    }

    public function visitArrayLiteral($ctx)
    {
        $elements = $ctx->arrayElement();
        if (!is_array($elements)) $elements = [$elements];

        $out = [];
        foreach ($elements as $el) {
            $val = $this->visit($el);
            if (is_array($val) && count($val) === 2 && is_string($val[0])) {
                $out[$val[0]] = $val[1];
            } else {
                $out[] = $val;
            }
        }

        return $out;
    }

    public function visitArrayElement($ctx)
    {
        $exprs = $ctx->expression();
        if (!is_array($exprs)) $exprs = [$exprs];
        if (count($exprs) === 2) {
            $key = $this->visit($exprs[0]);
            $val = $this->visit($exprs[1]);
            return [$key, $val];
        }
        return $this->visit($exprs[0]);
    }

    // ================= Atom & JSON Handling =================
    public function visitAtom($ctx)
    {
        if ($ctx->STRING()) return $ctx->STRING()->getText();
        elseif ($ctx->NUMBER()) return $ctx->NUMBER()->getText();
        elseif ($ctx->getText() === 'true') return 'true';
        elseif ($ctx->getText() === 'false') return 'false';
        elseif ($ctx->getText() === 'null') return 'null';

        if ($ctx->responseFunction()) {
            return $this->visitResponseFunction($ctx->responseFunction());
        }

        return parent::visitAtom($ctx);
    }

    public function visitResponseFunction($ctx)
    {
        $name = $ctx->getChild(0)->getText();
        $args = [];

        if ($ctx->argumentList()) {
            $exprs = $ctx->argumentList()->expression();
            if (!is_array($exprs)) $exprs = [$exprs];
            foreach ($exprs as $e) $args[] = $this->visit($e);
        }

        switch ($name) {
            case 'json': return 'response()->json(' . implode(', ', $args) . ')';
            case 'html': return 'response()->html(' . implode(', ', $args) . ')';
            case 'redirect': return 'response()->redirect(' . implode(', ', $args) . ')';
            case 'print': return 'echo ' . implode(' . ', $args);
        }
    }
}
