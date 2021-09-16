<?php

namespace Wyxos\LaravelResources;

use Illuminate\Support\Facades\Route;

class ResourceServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRouteCommand::class
            ]);
        }

        Route::any('/resource/{resource}/{handler}', ResourceHandler::class)
            ->name('resource')
            ->where('handler', '.*');
    }

    public function register()
    {

    }
}
