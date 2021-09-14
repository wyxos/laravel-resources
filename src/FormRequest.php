<?php

namespace Wyxos\LaravelResources;

use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;

class FormRequest extends LaravelFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function __invoke()
    {
        return app()->call([$this, 'handle']);
    }
}
