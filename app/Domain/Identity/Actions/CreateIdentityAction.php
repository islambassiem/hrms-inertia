<?php

declare(strict_types=1);

namespace App\Domain\Identity\Actions;

use App\Domain\Identity\Data\CreateIdentityData;
use App\Domain\Identity\Models\Identity;

final class CreateIdentityAction
{
    public function handle(CreateIdentityData $data): Identity
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Identity::query()->create($attributes);
    }
}
