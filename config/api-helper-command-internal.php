<?php

use TheDigitalMedium\ApiHelperCommand\Enum\GeneratorFilesType;

return [
    /*
    |--------------------------------------------------------------------------
    | API Generators Commands
    |--------------------------------------------------------------------------
    |
    | Define API generator commands.
    |
    */
    'api_generator_commands' => [
        GeneratorFilesType::MODEL => TheDigitalMedium\ApiHelperCommand\Generator\Commands\ModelGeneratorCommand::class,
        GeneratorFilesType::FACTORY => TheDigitalMedium\ApiHelperCommand\Generator\Commands\FactoryGeneratorCommand::class,
        GeneratorFilesType::SEEDER => TheDigitalMedium\ApiHelperCommand\Generator\Commands\SeederGeneratorCommand::class,
        GeneratorFilesType::CONTROLLER => TheDigitalMedium\ApiHelperCommand\Generator\Commands\ControllerGeneratorCommand::class,
        GeneratorFilesType::RESOURCE => TheDigitalMedium\ApiHelperCommand\Generator\Commands\ResourceGeneratorCommand::class,
        GeneratorFilesType::TEST => TheDigitalMedium\ApiHelperCommand\Generator\Commands\TestGeneratorCommand::class,
        GeneratorFilesType::CREATE_REQUEST => TheDigitalMedium\ApiHelperCommand\Generator\Commands\CreateFormRequestGeneratorCommand::class,
        GeneratorFilesType::UPDATE_REQUEST => TheDigitalMedium\ApiHelperCommand\Generator\Commands\UpdateFormRequestGeneratorCommand::class,
        GeneratorFilesType::FILTER => TheDigitalMedium\ApiHelperCommand\Generator\Commands\FilterGeneratorCommand::class,
        GeneratorFilesType::MIGRATION => TheDigitalMedium\ApiHelperCommand\Generator\Commands\MigrationGeneratorCommand::class,
        GeneratorFilesType::ROUTES => TheDigitalMedium\ApiHelperCommand\Generator\Commands\RoutesGeneratorCommand::class,
    ],

];
