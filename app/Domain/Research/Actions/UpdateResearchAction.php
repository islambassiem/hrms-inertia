<?php

declare(strict_types=1);

namespace App\Domain\Research\Actions;

use App\Domain\Research\Data\UpdateResearchData;
use App\Domain\Research\Models\Research;

final class UpdateResearchAction
{
    public function handle(UpdateResearchData $data, Research $research): Research
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $research->update($attributes);

        return $research;
    }
}
