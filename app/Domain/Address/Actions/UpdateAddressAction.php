<?php

declare(strict_types=1);

namespace App\Domain\Address\Actions;

use App\Domain\Address\Data\UpdateAddressData;
use App\Domain\Address\Models\Address;

final class UpdateAddressAction
{
    public function handle(UpdateAddressData $data, Address $address): Address
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $address->update($attributes);

        return $address;
    }
}
