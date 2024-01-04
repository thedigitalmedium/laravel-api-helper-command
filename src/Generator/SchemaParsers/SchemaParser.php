<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers;

use TheDigitalMedium\ApiHelperCommand\Generator\SchemaDefinition;

abstract class SchemaParser
{
    public function __construct(private SchemaDefinition $schema)
    {
    }

    public function parse(): string
    {
        if (empty($this->schema->getColumns())) {
            return '';
        }

        return $this->getParsedSchema($this->schema);
    }

    abstract protected function getParsedSchema(SchemaDefinition $schemaDefinition): string;
}
