<?php

declare(strict_types=1);

namespace App\Domain\Achievement\Actions;

use App\Domain\Achievement\Data\CreateAchievementData;
use App\Domain\Achievement\Models\Achievement;

final class CreateAchievementAction
{
    public function handle(CreateAchievementData $data): Achievement
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Achievement::query()->create($attributes);
    }
}
