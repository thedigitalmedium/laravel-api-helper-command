<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Commands;

use TheDigitalMedium\ApiHelperCommand\Generator\ApiGenerationCommandInputs;
use TheDigitalMedium\ApiHelperCommand\Generator\Configs\PathConfigHandler;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\GeneratorCommandInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\HasDynamicContentInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\GeneratedFileInfo;
use TheDigitalMedium\ApiHelperCommand\Generator\Helpers\StubVariablesProvider;
use Illuminate\Filesystem\Filesystem;

abstract class GeneratorCommand implements GeneratorCommandInterface
{
    protected const TAGS = [
        'soft-delete',
        'request',
        'resource',
        'filter',
    ];

    protected string $type;

    protected ApiGenerationCommandInputs $apiGenerationCommandInputs;

    public function __construct(protected Filesystem $filesystem)
    {
    }

    public function run(ApiGenerationCommandInputs $apiGenerationCommandInputs): void
    {
        $this->apiGenerationCommandInputs = $apiGenerationCommandInputs;

        $this->generateFiles();
    }

    abstract protected function getStubName(): string;

    protected function generateFiles(): void
    {
        if ( ! file_exists($this->generatedFileInfo()->getFolderPath())) {
            $this->createFolder();
        }

        $this->saveContentToFile();
    }

    protected function generatedFileInfo(): GeneratedFileInfo
    {
        return PathConfigHandler::generateFilePathInfo(
            pathGroupName: $this->apiGenerationCommandInputs->getPathGroup(),
            generatedFileType: $this->type,
            modelName: $this->apiGenerationCommandInputs->getModel()
        );
    }

    protected function createFolder(): void
    {
        $this->filesystem
            ->makeDirectory(
                path: $this->generatedFileInfo()->getFolderPath(),
                mode: 0777,
                recursive: true,
                force: true
            );
    }

    protected function saveContentToFile(): void
    {
        file_put_contents(
            filename: $this->generatedFileInfo()->getFullPath(),
            data: $this->parseStub($this->getStubName())
        );
    }

    protected function parseStub(string $type): string
    {
        $output = $this->replacePatternsInTheStub($type);

        return $this->removeTags($output);
    }

    protected function replacePatternsInTheStub(string $type): array|string|null
    {
        $replacements = StubVariablesProvider::generate(
            modelName: $this->apiGenerationCommandInputs->getModel(),
            pathGroup: $this->apiGenerationCommandInputs->getPathGroup()
        );

        if ($this instanceof HasDynamicContentInterface) {
            $replacements = array_merge($replacements, $this->getContent());
        }

        return strtr(
            $this->getStubContent($type),
            $replacements
        );
    }

    protected function removeTags(string $content): string
    {
        $processedContent = $content;

        foreach (self::TAGS as $option) {
            $processedContent = $this->extractConditionalBlock(
                $processedContent,
                $this->apiGenerationCommandInputs->getUserChoices()[$option],
                $option
            );
        }

        return $processedContent;
    }

    protected function extractConditionalBlock(string $string, bool $condition, string $tag): string
    {
        $pattern = "/@if\('{$tag}'\)(.*?)@endif\('{$tag}'\)/s";

        return preg_replace_callback($pattern, function ($matches) use ($condition) {
            $parts = explode('@else', $matches[1], 2);
            return $condition ? trim($parts[0]) : (isset($parts[1]) ? trim($parts[1]) : '');
        }, $string);
    }

    protected function getStubContent(string $stubName): string
    {
        return file_get_contents(__DIR__ . "/../../Stubs/{$stubName}.stub");
    }
}
