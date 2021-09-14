<?php

namespace Wyxos\LaravelResources;

use Illuminate\Support\Facades\Route;

class ResourceServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        Route::any('/resource/{resource}/{handler}', ResourceHandler::class)
            ->name('resource')
            ->where('handler', '.*');
    }

    public function register()
    {

    }
}
