<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Data\UpdateLeaveRequestData;
use App\Domain\Leave\Models\LeaveRequest;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Optional;

final class UpdateLeaveRequestAction
{
    public function handle(UpdateLeaveRequestData $data, LeaveRequest $leave): LeaveRequest
    {
        /** @var CarbonImmutable $startDate */
        $startDate = $data->start_date instanceof Optional
            ? $leave->start_date
            : $data->start_date;

        /** @var CarbonImmutable $endDate */
        $endDate = $data->end_date instanceof Optional
            ? $leave->end_date
            : $data->end_date;

        $leave->update([
            'leave_type_id' => $data->leave_type_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_days' => (int) $startDate->diffInDays($endDate) + 1,
            'status' => $data->status,
            'reason' => $data->reason,
        ]);

        return $leave;
    }
}
