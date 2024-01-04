<?php

namespace TheDigitalMedium\ApiHelperCommand;

use TheDigitalMedium\ApiHelperCommand\Commands\ApiGenerateCommand;
use TheDigitalMedium\ApiHelperCommand\Commands\GeneratePermissions;
use TheDigitalMedium\ApiHelperCommand\Commands\MakeActionCommand;
use TheDigitalMedium\ApiHelperCommand\Commands\MakeEnumCommand;
use TheDigitalMedium\ApiHelperCommand\Commands\MakeFilterCommand;
use Illuminate\Support\ServiceProvider;

class ApiHelperCommandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->AddConfigFiles();

        $this->registerCommands();
    }

    public function AddConfigFiles(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/api-helper-command.php', 'api-helper-command');

        $this->mergeConfigFrom(__DIR__ . '/../config/api-helper-command-internal.php', 'api-helper-command-internal');

        if ($this->app->runningInConsole() && function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/../config/api-helper-command.php' => config_path('api-helper-command.php'),
            ], 'config');
        }
    }

    public function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ApiGenerateCommand::class,
                MakeActionCommand::class,
                MakeEnumCommand::class,
                GeneratePermissions::class,
                MakeFilterCommand::class,
            ]);
        }
    }
}
