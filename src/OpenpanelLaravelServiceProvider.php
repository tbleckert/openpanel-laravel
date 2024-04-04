<?php

namespace Bleckert\OpenpanelLaravel;

use Illuminate\Support\ServiceProvider;

class OpenpanelLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('openpanel.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'openpanel');
        $this->app->singleton(Openpanel::class, fn () => new Openpanel);
    }
}
