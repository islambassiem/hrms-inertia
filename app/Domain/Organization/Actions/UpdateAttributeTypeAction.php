<?php

declare(strict_types=1);

namespace App\Domain\Organization\Actions;

use App\Domain\Organization\Data\UpdateAttributeTypeData;
use App\Domain\Organization\Models\AttributeType;

final class UpdateAttributeTypeAction
{
    public function handle(UpdateAttributeTypeData $data, AttributeType $type): AttributeType
    {
        /** @var array<string, mixed> */
        $attributes = $data->toArray();

        $type->update($attributes);

        return $type;
    }
}
