<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Actions;

use App\Domain\Workflow\Data\UpdateWorkflowApprovalData;
use App\Domain\Workflow\Models\Approval;

final class UpdateWorkflowApprovalAction
{
    public function handle(UpdateWorkflowApprovalData $data, Approval $approval): Approval
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $approval->update($attributes);

        return $approval;
    }
}
