<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Models\SickLeaveCycle;

final class UpdateEmployeeSickLeaveCycleAction
{
    public function handle(int $used_days, SickLeaveCycle $sickLeaveCycle): SickLeaveCycle
    {
        $sickLeaveCycle->increment('used_days', $used_days);

        return $sickLeaveCycle;
    }
}
