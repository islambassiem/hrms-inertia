<?php

declare(strict_types=1);

namespace App\Http\Resources\Hr;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

final class OrganizationAttributeListResource extends JsonApiResource
{
    /**
     * @var array<int, string>
     */
    public array $attributes = [
        'id',
        'name',
    ];
}
