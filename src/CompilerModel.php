<?php

namespace Wahyurejeki\Oalcompiler;

use OALBaseVisitor;
use OALParser;

class CompilerModel extends OALBaseVisitor
{

    private $migrations = [];
    private $models = [];

    // ================= Models =================
    public function visitModelStmt(\Context\ModelStmtContext $ctx)
    {
        $modelName = $ctx->ID()->getText();
        $fields = [];
        $relations = [];

        foreach ($ctx->modelBody() as $body) {
            if ($body->field()) $fields[] = $this->visit($body->field());
            if ($body->relation()) $relations[] = $this->visit($body->relation());
        }

        $fieldsCode = implode("\n    ", $fields);
        $relationsCode = implode("\n\n    ", $relations);

        $modelCode = <<<PHP
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class $modelName extends Model
{
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
        $type = $ctx->laravelType()->getText();
        $name = $ctx->ID()->getText();
        return "protected \$$name; // type: $type";
    }

    public function visitRelation(\Context\RelationContext $ctx)
    {
        // Ambil teks relation
        $type = $ctx->getChild(0)->getText();
        $related = $ctx->getChild(1)->getText();

        switch ($type) {
            case 'hasMany':
                return "public function {$related}() { return \$this->hasMany($related::class); }";
            case 'belongsTo':
                return "public function {$related}() { return \$this->belongsTo($related::class); }";
            case 'hasOne':
                return "public function {$related}() {  return \$this->hasOne($related::class); }";
            case 'belongsToMany':
                return "public function {$related}() { return \$this->belongsToMany($related::class); }";
        }

        return '';
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
                $type = $f->laravelType()->getText();

                $col = "            \$table->$type('$name')";
                foreach ($f->fieldModifier() as $mod) {
                    $modText = $mod->getText();
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

}