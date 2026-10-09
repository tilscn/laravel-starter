<?php

namespace Tilscn\LaravelStarter;

use Illuminate\Support\ServiceProvider;

class StarterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/starter.php' => config_path('starter.php'),
        ]);
    }
}
