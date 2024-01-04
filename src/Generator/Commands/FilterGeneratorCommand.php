<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;

class FilterGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::FILTER;

    protected function getStubName(): string
    {
        return 'DummyFilters';
    }
}
