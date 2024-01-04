<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers;

use TheDigitalMedium\ApiHelperCommand\Generator\ColumnDefinition;
use TheDigitalMedium\ApiHelperCommand\Generator\Guessers\ValidationRuleGuesserInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\SchemaDefinition;

class CreateValidationRulesParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(function (ColumnDefinition $definition): string {
                $guesser = new ValidationRuleGuesserInterface($definition, ['required']);

                return "'{$definition->getName()}' => [{$guesser->guess()}],";
            })
            ->implode(PHP_EOL . "\t\t\t");
    }
}
