<?php

return [
    'middleware' => [],
    'handler' => Wyxos\LaravelResources\ResourceHandler::class,
    'extend' => [
        'resource' => \Wyxos\LaravelResources\ResourceRequest::class,
        'route' => \Wyxos\LaravelResources\FormRequest::class,
    ]
];
