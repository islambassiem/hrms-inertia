<?php

declare(strict_types=1);

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\CreateEmployeeData;
use App\Domain\Employee\Models\Employee;

final class CreateEmployeeAction
{
    public function handle(CreateEmployeeData $data): Employee
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Employee::query()->create($attributes);
    }
}
