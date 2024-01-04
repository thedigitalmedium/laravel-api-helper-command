<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\HasDynamicContentInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers\FillableColumnsParser;
use TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers\RelationshipMethodsParser;

class ModelGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::MODEL;

    public function getContent(): array
    {
        return [
            '{{fillableColumns}}' =>  (new FillableColumnsParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
            '{{modelRelations}}' => (new RelationshipMethodsParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyModel';
    }
}
