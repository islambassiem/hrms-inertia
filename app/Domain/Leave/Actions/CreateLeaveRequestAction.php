<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Data\CreateLeaveRequestData;
use App\Domain\Leave\Enums\LeaveStatus;
use App\Domain\Leave\Models\LeaveRequest;

final class CreateLeaveRequestAction
{
    public function handle(CreateLeaveRequestData $data): LeaveRequest
    {
        return LeaveRequest::query()->create([
            'employee_id' => $data->employee_id,
            'leave_type_id' => $data->leave_type_id,
            'start_date' => $data->start_date,
            'end_date' => $data->end_date,
            'total_days' => (int) $data->start_date->diffInDays($data->end_date) + 1,
            'status' => LeaveStatus::PENDING->value,
            'reason' => $data->reason,
        ]);
    }
}
