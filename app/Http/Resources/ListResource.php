<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class ListResource extends JsonResource
{
    /**
     * @var array<int, string>
     */
    public array $attributes = [
        'id',
        'name',
    ];
}
