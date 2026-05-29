<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\CreateIncludedSpecialtyData;
use App\Domain\Qualification\Models\IncludedSpecialty;

final class CreateIncludedSpecialtyAction
{
    public function handle(CreateIncludedSpecialtyData $data): IncludedSpecialty
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return IncludedSpecialty::query()->create($attributes);
    }
}
