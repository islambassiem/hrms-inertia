<?php

declare(strict_types=1);

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\UpdateEmployeeData;
use App\Domain\Employee\Models\Employee;

final class UpdateEmployeeAction
{
    public function handle(UpdateEmployeeData $data, Employee $employee): Employee
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $employee->update($attributes);

        return $employee;
    }
}
