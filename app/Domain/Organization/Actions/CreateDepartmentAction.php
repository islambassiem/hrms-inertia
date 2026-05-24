<?php

declare(strict_types=1);

namespace App\Domain\Organization\Actions;

use App\Domain\Organization\Data\CreateDepartmentData;
use App\Domain\Organization\Models\Department;

final class CreateDepartmentAction
{
    public function handle(CreateDepartmentData $data): Department
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Department::query()->create($attributes);
    }
}
