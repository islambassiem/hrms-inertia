<?php

declare(strict_types=1);

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\CreateEmployeeLeavePolicyAssignmentData;
use App\Domain\Employee\Models\EmployeeLeavePolicyAssignment;

final class CreateEmployeeLeavePolicyAssignmentAction
{
    public function handle(CreateEmployeeLeavePolicyAssignmentData $data): EmployeeLeavePolicyAssignment
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return EmployeeLeavePolicyAssignment::query()->create($attributes);
    }
}
