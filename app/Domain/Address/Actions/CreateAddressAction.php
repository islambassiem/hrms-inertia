<?php

declare(strict_types=1);

namespace App\Domain\Address\Actions;

use App\Domain\Address\Data\CreateAddressData;
use App\Domain\Address\Models\Address;

final class CreateAddressAction
{
    public function handle(CreateAddressData $data): Address
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Address::query()->create($attributes);
    }
}
