<?php

namespace Wyxos\LaravelResources;

use Illuminate\Support\Str;
use function app;

class ResourceHandler extends FormRequest
{
    public function handle()
    {
        $resource = Str::studly($this->route('resource'));

        $handler = collect(explode('\/', $this->route('handler')))->map(function($segment){
            return Str::studly($segment);
        })->join('\\');

        $class = "App\\Resources\\$resource\\$handler";

        if (!class_exists($class)) {
            throw new \Exception("$class is not defined.");
        }

        return app()->call("$class@handle");
    }
}
