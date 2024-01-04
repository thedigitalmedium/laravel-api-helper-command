<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers;

use TheDigitalMedium\ApiHelperCommand\Generator\ColumnDefinition;
use TheDigitalMedium\ApiHelperCommand\Generator\Guessers\FactoryMethodGuesserInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\SchemaDefinition;
use Illuminate\Support\Str;

class FactoryColumnsParser extends SchemaParser
{
    protected function getParsedSchema(SchemaDefinition $schemaDefinition): string
    {
        return collect($schemaDefinition->getColumns())
            ->map(fn (ColumnDefinition $definition): string => $this->generateFactoryColumnDefinition($definition))
            ->implode(PHP_EOL . "\t\t\t");
    }

    private function generateFactoryColumnDefinition(ColumnDefinition $definition): string
    {
        if ($this->isRelationColumn($definition)) {
            return "'{$definition->getName()}' => {$this->getRelationFactoryMethod($definition)},";
        }

        $factoryMethodGuesser = new FactoryMethodGuesserInterface($definition);
        $factoryMethod = $factoryMethodGuesser->guess();

        return "'{$definition->getName()}' => \$this->faker->{$factoryMethod},";
    }

    private function isRelationColumn(ColumnDefinition $definition): bool
    {
        return str_ends_with($definition->getName(), '_id');
    }

    private function getRelationFactoryMethod(ColumnDefinition $definition): string
    {
        $relatedModel = Str::studly(Str::beforeLast($definition->getName(), '_id'));

        return "createOrRandomFactory(\App\Models\\{$relatedModel}::class)";
    }
}
