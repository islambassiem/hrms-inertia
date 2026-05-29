<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\CreateSpecialtyData;
use App\Domain\Qualification\Models\Specialty;

final class CreateSpecialtyAction
{
    public function handle(CreateSpecialtyData $data): Specialty
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Specialty::query()->create($attributes);
    }
}
