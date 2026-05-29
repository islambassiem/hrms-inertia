<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\UpdateSpecialtyData;
use App\Domain\Qualification\Models\Specialty;

final class UpdateSpecialtyAction
{
    public function handle(UpdateSpecialtyData $data, Specialty $specialty): Specialty
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $specialty->update($attributes);

        return $specialty;
    }
}
