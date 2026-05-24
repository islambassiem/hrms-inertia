<?php

declare(strict_types=1);

namespace App\Domain\Organization\Actions;

use App\Domain\Organization\Data\CreateAttributeData;
use App\Domain\Organization\Models\Attribute;

final class CreateAttributeAction
{
    public function handle(CreateAttributeData $data): Attribute
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Attribute::query()->create($attributes);
    }
}
