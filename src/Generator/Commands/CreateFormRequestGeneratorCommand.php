<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\HasDynamicContentInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers\CreateValidationRulesParser;

class CreateFormRequestGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::CREATE_REQUEST;

    public function getContent(): array
    {
        return [
            '{{createValidationRules}}' => (new CreateValidationRulesParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'CreateDummyRequest';
    }
}
