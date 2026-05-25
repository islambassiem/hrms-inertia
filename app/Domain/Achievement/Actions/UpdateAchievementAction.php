<?php

declare(strict_types=1);

namespace App\Domain\Achievement\Actions;

use App\Domain\Achievement\Data\UpdateAchievementData;
use App\Domain\Achievement\Models\Achievement;

final class UpdateAchievementAction
{
    public function handle(UpdateAchievementData $data, Achievement $achievement): Achievement
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $achievement->update($attributes);

        return $achievement;
    }
}
