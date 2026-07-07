<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Organization\Models\Department;
use Illuminate\Database\Eloquent\Builder;

final class DepartmentListQuery
{
    /**
     * @return Builder<Department>
     */
    public function build(?DepartmentType $type = null): Builder
    {
        return Department::query()
            ->select('id', 'name')
            ->when($type, function ($query, $type): void {
                $query->where('type', $type->value);
            });
    }
}
