<?php

namespace Webike\MigrationsGenerator\Generators;

use Doctrine\DBAL\Schema\Column;
use Illuminate\Database\Schema\Builder;
use Webike\MigrationsGenerator\MigrationMethod\ColumnName;
use Webike\MigrationsGenerator\MigrationMethod\ColumnType;

class StringField
{
    public function makeField(array $field, Column $column): array
    {
        if ($field['field'] === ColumnName::REMEMBER_TOKEN && $column->getLength() === 100 && !$column->getFixed()) {
            $field['type'] = ColumnType::REMEMBER_TOKEN;
            $field['field'] = null;
            $field['args'] = [];

            return $field;
        }

        if ($column->getFixed()) {
            $field['type'] = ColumnType::CHAR;
        }

        if ($column->getLength() && $column->getLength() !== Builder::$defaultStringLength) {
            $field['args'][] = $column->getLength();
        }

        return $field;
    }
}
