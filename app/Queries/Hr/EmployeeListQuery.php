<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Employee\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;

final class EmployeeListQuery
{
    /**
     * @return LengthAwarePaginator<int, Employee>
     */
    public function __invoke(string $search = ''): LengthAwarePaginator
    {
        return Employee::query()
            ->with([
                'department:id,name',
                'user:id,email',
                'nationalId:id,employee_id,identity_type_id,identity_number',
            ])
            ->select([
                'id',
                'first_name_en',
                'middle_name_en',
                'third_name_en',
                'last_name_en',
                'full_name_en',
                'first_name_ar',
                'middle_name_ar',
                'third_name_ar',
                'last_name_ar',
                'full_name_ar',
                'employee_code',
                'department_id',
                'user_id',
                'phone',
                'joining_date',
                'leaving_date',
                'image',
                'is_active',
            ])
            ->when($search !== '', function ($builder) use ($search) {
                $builder->where(function ($query) use ($search) {
                    $query
                        ->whereAny([
                            'first_name_en',
                            'middle_name_en',
                            'third_name_en',
                            'last_name_en',
                            'full_name_en',
                            'first_name_ar',
                            'middle_name_ar',
                            'third_name_ar',
                            'last_name_ar',
                            'full_name_ar',
                            'employee_code',
                            'phone',
                        ], 'like', "%{$search}%")
                        ->orWhereHas('user', fn ($q) => $q->where('email', 'like', "%{$search}%"))
                        ->orWhereHas('nationalId', fn ($q) => $q->where('identity_number', 'like', "%{$search}%"));
                });
            })
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);
    }
}
