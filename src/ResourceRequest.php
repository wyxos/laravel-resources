<?php

namespace Wyxos\LaravelResources;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 */
abstract class ResourceRequest extends FormRequest
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function queryResource($class): Builder
    {
        return $class::query()->where('id', $this->getId());
    }

    public function findResource($class): Model
    {
        return $class::query()->find($this->getId());
    }

    public function deleteResource($resource)
    {
        if (!$this->queryResource($resource)->delete()) {
            throw new \Exception("Failed to delete resource $resource with id $this->id");
        }
    }
}
