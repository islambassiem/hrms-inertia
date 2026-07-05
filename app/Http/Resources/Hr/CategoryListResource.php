<?php

namespace App\Http\Resources\Hr;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class CategoryListResource extends JsonApiResource
{
    /**
     * @var array<int, string> $attributes
     */
    public array $attributes = [
        'id',
        'name',
    ];
}
