<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Contracts;

use TheDigitalMedium\ApiHelperCommand\Generator\ApiGenerationCommandInputs;
use TheDigitalMedium\ApiHelperCommand\Generator\TableDate;

interface ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate;
}
