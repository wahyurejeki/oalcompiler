<?php

namespace Wahyurejeki\Oalcompiler\Laravel;

use OALBaseVisitor;

class LaravelModelCompiler extends OALBaseVisitor
{
    private $migrations = [];
    private $models = [];
    private $modelMetadata = [];

    // ================= Models =================
    public function visitModelStmt(\Context\ModelStmtContext $ctx)
    {
        $modelName = $ctx->ID()->getText();
        $fields = [];
        $relations = [];
        $metadata = [];

        foreach ($ctx->modelBody() as $body) {
            if ($body->field()) {
                $f = $body->field();
                $name = $f->ID()->getText();
                $type = $f->oalType()->getText();
                $fields[] = $this->visit($f);
                $metadata[$name] = $type;
            }
            if ($body->relation()) $relations[] = $this->visit($body->relation());
        }

        $this->modelMetadata[$modelName] = $metadata;

        $fieldsCode = implode("\n    ", $fields);
        $relationsCode = implode("\n\n    ", $relations);

        $tableName = strtolower($modelName) . 's';

        $modelCode = <<<PHP
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class $modelName extends Model
{
    protected \$table = '$tableName';

    $fieldsCode

    $relationsCode
}
PHP;

        $this->models[$modelName] = $modelCode;

        // Generate Migration
        $this->generateMigration($modelName, $ctx->modelBody());

        return $modelCode;
    }

    public function visitField(\Context\FieldContext $ctx)
    {
        $type = $ctx->oalType()->getText();
        $name = $ctx->ID()->getText();
        return "protected \$$name; // type: $type";
    }

    private function camelCase(string $name): string
    {
        return lcfirst(preg_replace('/[^a-zA-Z0-9]+/', '', $name));
    }

    private function pluralize(string $word): string
    {
        $word = trim($word);
        if (str_ends_with(strtolower($word), 'y')) {
            return substr($word, 0, -1) . 'ies';
        }
        if (str_ends_with(strtolower($word), 's')) {
            return $word;
        }
        return $word . 's';
    }

    public function visitRelation(\Context\RelationContext $ctx)
    {
        // Ambil teks relation
        $type = $ctx->getChild(0)->getText();
        $related = $ctx->getChild(1)->getText();

        // normalize method name: camelCase and pluralize for *Many relations
        $methodName = $this->camelCase($related);
        if ($type === 'hasMany' || $type === 'belongsToMany') {
            $methodName = $this->camelCase($this->pluralize($related));
        }

        switch ($type) {
            case 'hasMany':
                return "public function {$methodName}() { return \$this->hasMany($related::class); }";
            case 'belongsTo':
                return "public function {$methodName}() { return \$this->belongsTo($related::class); }";
            case 'hasOne':
                return "public function {$methodName}() {  return \$this->hasOne($related::class); }";
            case 'belongsToMany':
                return "public function {$methodName}() { return \$this->belongsToMany($related::class); }";
        }

        return '';
    }

    private function mapColumnType(string $type): string
    {
        // Map OAL types to Laravel schema builder methods
        return match ($type) {
            'datetime' => 'dateTime',
            default => $type,
        };
    }

    private function generateMigration($modelName, $modelBody)
    {
        $tableName = strtolower($modelName) . 's';
        $className = 'Create'.$modelName.'sTable';
        $fields = [];

        foreach ($modelBody as $body) {
            if ($body->field()) {
                $f = $body->field();
                $name = $f->ID()->getText();
                $type = $f->oalType()->getText();
                $mods = [];
                foreach ($f->fieldModifier() as $mod) { $mods[] = $mod->getText(); }

                // Special handling for id primary
                if ($name === 'id' && in_array('primary', $mods, true)) {
                    $col = "            \$table->" . ($type === 'integer' ? 'increments' : 'bigIncrements') . "('id');";
                    $fields[] = $col;
                    continue;
                }

                $laravelType = $this->mapColumnType($type);
                $col = '            $table->' . $laravelType . "('$name')";
                foreach ($mods as $modText) {
                    if ($modText === 'primary') $col .= "->primary()";
                    if ($modText === 'unique') $col .= "->unique()";
                    if ($modText === 'nullable') $col .= "->nullable()";
                    if (str_starts_with($modText, 'default')) {
                        preg_match('/default\((.*)\)/', $modText, $matches);
                        if (isset($matches[1])) $col .= "->default(" . $matches[1] . ")";
                    }
                }
                $col .= ";";
                $fields[] = $col;
            }
        }

        $txtCreateFields = implode("\n", $fields) ."\n";
        $txtCreateFields.= '$table->timestamps();';

        $migrationCode = <<<PHP
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class $className extends Migration
{
    public function up(): void
    {
        Schema::create('$tableName', function (Blueprint \$table) {
            $txtCreateFields
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('$tableName');
    }
};
PHP;

        $filename = date('Y_m_d_His') . "_create_{$tableName}_table.php";
        $this->migrations[$filename] = $migrationCode;
    }

    public function getModels() { return $this->models; }
    public function getMigrations() { return $this->migrations; }
    public function getModelMetadata() { return $this->modelMetadata; }

}
