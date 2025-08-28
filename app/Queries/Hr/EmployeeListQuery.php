<?php

namespace App\Queries\Hr;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeListQuery
{
    /**
     * @return Collection<int, Employee>
     */
    public function handle(): Collection
    {
        return Employee::with([
            'user', 'nationality', 'sponsorship', 'categories', 'positions', 'departments',
        ])->get();
    }
}
