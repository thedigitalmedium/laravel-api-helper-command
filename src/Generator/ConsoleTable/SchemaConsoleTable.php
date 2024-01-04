<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\ConsoleTable;

use TheDigitalMedium\ApiHelperCommand\Generator\ApiGenerationCommandInputs;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\ConsoleTableInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\TableDate;

class SchemaConsoleTable implements ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate
    {
        $tableData = [];

        foreach ($apiGenerationCommandInputs->getSchema()->getColumns() as $column) {
            $tableData[] = [$column->getName(), $column->getType(), $column->getOptionsAsString()];
        }

        $headers = ['Column Name', 'Column Type', 'Options'];

        return new TableDate($headers, $tableData);
    }
}
