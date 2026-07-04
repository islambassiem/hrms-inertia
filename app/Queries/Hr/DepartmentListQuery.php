<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Organization\Models\Department;
use Illuminate\Database\Eloquent\Collection;

final class DepartmentListQuery
{
    /**
     * @return Collection<int, Department>
     */
    public function __invoke(?DepartmentType $type = null): Collection
    {
        return Department::query()
            ->select('id', 'name')
            ->when($type, fn ($query, $type) => $query->where('type', $type->value))
            ->get();
    }
}
