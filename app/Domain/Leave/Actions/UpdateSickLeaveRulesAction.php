<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Data\UpdateSickLeaveRulesData;
use App\Domain\Leave\Models\SickLeaveRule;

final class UpdateSickLeaveRulesAction
{
    public function handle(UpdateSickLeaveRulesData $data, SickLeaveRule $sickLeaveRule): SickLeaveRule
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $sickLeaveRule->update($attributes);

        return $sickLeaveRule;
    }
}
