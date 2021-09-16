<?php

namespace Wyxos\LaravelResources;

use Illuminate\Testing\TestResponse;

trait ResourceTestHelpers
{
    protected function getResource($resource, $handler, $params = []): TestResponse
    {
        $merge = array_merge([$resource, $handler], $params);

        return $this->get(route('resource', $merge));
    }

    protected function postResource($resource, $handler, $data = []): TestResponse
    {
        return $this->post(route('resource', [$resource, $handler]), $data);
    }
}
