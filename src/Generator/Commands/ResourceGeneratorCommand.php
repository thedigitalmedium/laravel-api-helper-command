<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\HasDynamicContentInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers\ResourceAttributesParser;

class ResourceGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::RESOURCE;

    public function getContent(): array
    {
        return [
            '{{resourceContent}}' => (new ResourceAttributesParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyResource';
    }
}
