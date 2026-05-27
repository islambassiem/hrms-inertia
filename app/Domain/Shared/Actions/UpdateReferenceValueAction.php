<?php

declare(strict_types=1);

namespace App\Domain\Shared\Actions;

use App\Domain\Shared\Data\UpdateReferenceValueData;
use App\Domain\Shared\Models\ReferenceValue;

final class UpdateReferenceValueAction
{
    public function handle(UpdateReferenceValueData $data, ReferenceValue $value): ReferenceValue
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $value->update($attributes);

        return $value;
    }
}
