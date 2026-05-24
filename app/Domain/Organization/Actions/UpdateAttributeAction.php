<?php

declare(strict_types=1);

namespace App\Domain\Organization\Actions;

use App\Domain\Organization\Data\UpdateAttributeData;
use App\Domain\Organization\Models\Attribute;

final class UpdateAttributeAction
{
    public function handle(UpdateAttributeData $data, Attribute $attribute): Attribute
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $attribute->update($attributes);

        return $attribute;
    }
}
