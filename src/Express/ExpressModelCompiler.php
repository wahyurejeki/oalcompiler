<?php

namespace Wahyurejeki\Oalcompiler\Express;

use OALBaseVisitor;

class ExpressModelCompiler extends OALBaseVisitor
{
    private $models = [];

    public function visitModelStmt(\Context\ModelStmtContext $ctx)
    {
        $modelName = $ctx->ID()->getText();
        $fields = [];

        foreach ($ctx->modelBody() as $body) {
            if ($body->field()) {
                $f = $body->field();
                $fieldName = $f->ID()->getText();
                $type = $f->oalType()->getText();
                $mods = [];
                foreach ($f->fieldModifier() as $mod) {
                    $mods[] = $mod->getText();
                }

                $sequelizeType = $this->mapSequelizeType($type);
                $fieldDef = "        $fieldName: {\n";
                $fieldDef .= "            type: $sequelizeType";

                foreach ($mods as $modText) {
                    if ($modText === 'primary') $fieldDef .= ",\n            primaryKey: true, autoIncrement: true";
                    if ($modText === 'unique') $fieldDef .= ",\n            unique: true";
                    if ($modText === 'nullable') $fieldDef .= ",\n            allowNull: true";
                    if (str_starts_with($modText, 'default')) {
                        preg_match('/default\((.*)\)/', $modText, $matches);
                        if (isset($matches[1])) $fieldDef .= ",\n            defaultValue: " . $matches[1];
                    }
                }
                
                // Sequelize defaults to allowNull: true unless specified
                if (!in_array('nullable', $mods)) {
                    $fieldDef .= ",\n            allowNull: false";
                }

                $fieldDef .= "\n        }";
                $fields[] = $fieldDef;
            }
        }

        $fieldsCode = implode(",\n", $fields);
        $tableName = strtolower($this->pluralize($modelName));

        $modelCode = <<<JS
const { DataTypes } = require('sequelize');
const sequelize = require('../config/database');

const $modelName = sequelize.define('$modelName', {
$fieldsCode
}, {
    tableName: '$tableName',
    timestamps: true
});

module.exports = $modelName;
JS;

        $this->models[$modelName] = $modelCode;
        return $modelCode;
    }

    private function mapSequelizeType(string $type): string
    {
        return match ($type) {
            'string' => 'DataTypes.STRING',
            'text' => 'DataTypes.TEXT',
            'integer' => 'DataTypes.INTEGER',
            'bigInteger' => 'DataTypes.BIGINT',
            'float' => 'DataTypes.FLOAT',
            'double' => 'DataTypes.DOUBLE',
            'decimal' => 'DataTypes.DECIMAL',
            'boolean' => 'DataTypes.BOOLEAN',
            'date' => 'DataTypes.DATEONLY',
            'datetime' => 'DataTypes.DATE',
            'time' => 'DataTypes.TIME',
            'timestamp' => 'DataTypes.DATE',
            default => 'DataTypes.STRING',
        };
    }

    public function getModels() { return $this->models; }

    public function getDatabaseConfig()
    {
        return <<<JS
const { Sequelize } = require('sequelize');

const sequelize = new Sequelize(
    process.env.DB_NAME || 'database',
    process.env.DB_USER || 'root',
    process.env.DB_PASS || '',
    {
        host: process.env.DB_HOST || '127.0.0.1',
        dialect: 'mysql', // default to mysql
        logging: false
    }
);

module.exports = sequelize;
JS;
    }
}
