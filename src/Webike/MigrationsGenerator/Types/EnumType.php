<?php

namespace Webike\MigrationsGenerator\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Webike\MigrationsGenerator\MigrationMethod\ColumnType;

class EnumType extends Type
{
    /**
     * @inheritDoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'ENUM';
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return ColumnType::ENUM;
    }
}
