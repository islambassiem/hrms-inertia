<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Models\CompensationEntry;

final class RecordCompensationEntryAction
{
    public function handle(
        int $leave_request_id,
        float $days,
        int $compensation_rate,
    ): void {
        CompensationEntry::query()->create([
            'leave_request_id' => $leave_request_id,
            'days' => $days,
            'compensation_rate' => $compensation_rate,
        ]);
    }
}
