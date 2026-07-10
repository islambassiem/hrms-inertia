<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

final class ListResource extends JsonApiResource
{
    /**
     * @var array<int, string>
     */
    public array $attributes = [
        'id',
        'name',
    ];
}
