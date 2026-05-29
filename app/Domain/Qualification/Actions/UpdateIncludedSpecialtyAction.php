<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\UpdateIncludedSpecialtyData;
use App\Domain\Qualification\Models\IncludedSpecialty;

final class UpdateIncludedSpecialtyAction
{
    public function handle(UpdateIncludedSpecialtyData $data, IncludedSpecialty $specialty): IncludedSpecialty
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $specialty->update($attributes);

        return $specialty;
    }
}
