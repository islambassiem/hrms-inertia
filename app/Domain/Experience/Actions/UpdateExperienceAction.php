<?php

declare(strict_types=1);

namespace App\Domain\Experience\Actions;

use App\Domain\Experience\Data\UpdateExperienceData;
use App\Domain\Experience\Models\Experience;

final class UpdateExperienceAction
{
    public function handle(UpdateExperienceData $data, Experience $experience): Experience
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $experience->update($attributes);

        return $experience;
    }
}
