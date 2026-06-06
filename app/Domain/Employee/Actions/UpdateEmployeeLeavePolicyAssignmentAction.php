<?php

declare(strict_types=1);

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\UpdateEmployeeLeavePolicyAssignmentData;
use App\Domain\Employee\Models\EmployeeLeavePolicyAssignment;

final class UpdateEmployeeLeavePolicyAssignmentAction
{
    public function handle(UpdateEmployeeLeavePolicyAssignmentData $data, EmployeeLeavePolicyAssignment $assignment): EmployeeLeavePolicyAssignment
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $assignment->update($attributes);

        return $assignment;
    }
}
