<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\ConsoleTable;

use TheDigitalMedium\ApiHelperCommand\Generator\ApiGenerationCommandInputs;
use TheDigitalMedium\ApiHelperCommand\Generator\Configs\PathConfigHandler;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\ConsoleTableInterface;
use TheDigitalMedium\ApiHelperCommand\Generator\TableDate;

class GeneratedFilesConsoleTable implements ConsoleTableInterface
{
    public function generate(ApiGenerationCommandInputs $apiGenerationCommandInputs): TableDate
    {
        $tableData = $this->generateTableData($apiGenerationCommandInputs);

        $headers = ['Type', 'File Path'];

        return new TableDate($headers, $tableData);
    }

    private function generateTableData(ApiGenerationCommandInputs $apiGenerationCommandInputs): array
    {
        $configForPathGroup = PathConfigHandler::getFileInfoForAllTypes(
            pathGroupName: $apiGenerationCommandInputs->getPathGroup(),
            modelName: $apiGenerationCommandInputs->getModel()
        );

        $tableData = [];

        foreach ($configForPathGroup as $type => $generatedFileInfo) {
            if ($apiGenerationCommandInputs->isOptionSelected($type)) {
                $tableData[] = [
                    $type,
                    $generatedFileInfo->getFullPath(),
                ];
            }
        }

        return $tableData;
    }
}
