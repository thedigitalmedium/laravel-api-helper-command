<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Contracts;

use TheDigitalMedium\ApiHelperCommand\Generator\ApiGenerationCommandInputs;

interface GeneratorCommandInterface
{
    public function run(ApiGenerationCommandInputs $apiGenerationCommandInputs): void;
}
