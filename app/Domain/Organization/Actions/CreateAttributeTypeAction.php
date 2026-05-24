<?php

declare(strict_types=1);

namespace App\Domain\Organization\Actions;

use App\Domain\Organization\Data\CreateAttributeTypeData;
use App\Domain\Organization\Models\AttributeType;

final class CreateAttributeTypeAction
{
    public function handle(CreateAttributeTypeData $data): AttributeType
    {
        /** @var array<string, mixed> */
        $attributes = $data->toArray();

        return AttributeType::query()->create($attributes);
    }
}
