<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Actions;

use App\Domain\Workflow\Enums\WorkflowStatus;
use App\Domain\Workflow\Models\Approval;

final class RecordWorkflowApprovalAction
{
    public function handle(
        string $approveable_type,
        int $approveable_id,
        int $approver_id,
        int $role_id,
    ): Approval {
        return Approval::query()->create([
            'approveable_type' => $approveable_type,
            'approveable_id' => $approveable_id,
            'approver_id' => $approver_id,
            'role_id' => $role_id,
            'status' => WorkflowStatus::PENDING->value,
        ]);
    }
}
