<?php

declare(strict_types=1);

namespace App\Domain\Shared\Actions;

use App\Domain\Shared\Data\CreateReferenceValueData;
use App\Domain\Shared\Models\ReferenceValue;

final class CreateReferenceValueAction
{
    public function handle(CreateReferenceValueData $data): ReferenceValue
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return ReferenceValue::query()->create($attributes);
    }
}
