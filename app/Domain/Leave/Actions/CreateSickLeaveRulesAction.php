<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Data\CreateSickLeaveRulesData;
use App\Domain\Leave\Models\SickLeaveRule;

final class CreateSickLeaveRulesAction
{
    public function handle(CreateSickLeaveRulesData $data): SickLeaveRule
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return SickLeaveRule::query()->create($attributes);
    }
}
