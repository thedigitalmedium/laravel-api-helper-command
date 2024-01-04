<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;

class SeederGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::SEEDER;

    protected function getStubName(): string
    {
        return 'DummySeeder';
    }
}
