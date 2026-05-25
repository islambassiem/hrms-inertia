<?php

declare(strict_types=1);

namespace App\Domain\Experience\Actions;

use App\Domain\Experience\Data\CreateExperienceData;
use App\Domain\Experience\Models\Experience;

final class CreateExperienceAction
{
    public function handle(CreateExperienceData $data): Experience
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Experience::query()->create($attributes);
    }
}
