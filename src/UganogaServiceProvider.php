<?php

namespace Uganoga;

use Illuminate\Support\ServiceProvider;

class UganogaServiceProvider extends ServiceProvider
{
    /**
     * Register the package services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/uganoga.php', 'uganoga');
    }

    /**
     * Bootstrap any package services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Publish configuration
            $this->publishes([
                __DIR__ . '/../config/uganoga.php' => config_path('uganoga.php'),
            ], 'config');

            // Register the Artisan command
            $this->commands([
                Commands\ObfuscateCommand::class,
            ]);
        }
    }
}
