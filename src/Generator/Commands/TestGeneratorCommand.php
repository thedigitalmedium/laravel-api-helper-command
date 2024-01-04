<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;

class TestGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::TEST;

    protected function getStubName(): string
    {
        return 'DummyTest';
    }
}
