<?php

namespace App\Http\Resources\Hr;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class DepartmentListResource extends JsonApiResource
{
    /**
     * @var array<int, string> $attributes
     */
    public array $attributes = [
        'id',
        'name',
    ];
}
