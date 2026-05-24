<?php

declare(strict_types=1);

namespace App\Domain\Organization\Actions;

use App\Domain\Organization\Data\UpdateDepartmentData;
use App\Domain\Organization\Models\Department;

final class UpdateDepartmentAction
{
    public function handle(UpdateDepartmentData $data, Department $department): Department
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $department->update($attributes);

        return $department;
    }
}
