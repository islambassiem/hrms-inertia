<?php

declare(strict_types=1);

namespace App\Domain\Research\Actions;

use App\Domain\Research\Data\CreateResearchData;
use App\Domain\Research\Models\Research;

final class CreateResearchAction
{
    public function handle(CreateResearchData $data): Research
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Research::query()->create($attributes);
    }
}
