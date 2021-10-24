<?php

namespace Wyxos\LaravelResources;

use Exception;
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

    /**
     * @param $class
     * @return Builder
     */
    public function queryResource($class): Builder
    {
        return $class::query()->where('id', $this->getId());
    }

    /**
     * @param $class
     * @return Model
     */
    public function findResource($class): Model
    {
        return $class::query()->find($this->getId());
    }

    /**
     * @throws Exception
     */
    public function deleteResource($resource)
    {
        if (!$this->queryResource($resource)->delete()) {
            throw new Exception("Failed to delete resource $resource with id {$this->getId()}");
        }
    }

    /**
     * @throws Exception
     */
    public function deleteModel(Model $model)
    {
        if (!$model->delete()) {
            $resource = class_basename($model);
            throw new Exception("Failed to delete model $resource with id {$this->getId()}");
        }
    }
}
