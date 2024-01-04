<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;

class ControllerGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::CONTROLLER;

    protected function getStubName(): string
    {
        return 'DummyController';
    }
}
