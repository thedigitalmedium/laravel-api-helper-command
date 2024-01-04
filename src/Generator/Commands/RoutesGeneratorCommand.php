<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;

class RoutesGeneratorCommand extends GeneratorCommand
{
    protected string $type = GeneratorFilesType::ROUTES;

    protected function getStubName(): string
    {
        return 'DummyRoutes';
    }

    protected function saveContentToFile(): void
    {
        $this->filesystem->append(
            $this->generatedFileInfo()->getFullPath(),
            $this->parseStub('DummyRoutes')
        );
    }
}
