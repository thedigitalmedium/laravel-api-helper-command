<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\HasDynamicContentInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\SchemaParsers\MigrationContentParser;

class MigrationGeneratorCommand extends GeneratorCommand implements HasDynamicContentInterface
{
    protected string $type = GeneratorFilesType::MIGRATION;

    public function getContent(): array
    {
        return [
            '{{migrationContent}}' => (new MigrationContentParser($this->apiGenerationCommandInputs->getSchema()))->parse(),
        ];
    }

    protected function getStubName(): string
    {
        return 'DummyMigration';
    }
}
