<?php

declare(strict_types=1);

namespace App\Queries;

use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class ContactsQuery
{
    /**
     * @return LengthAwarePaginator<int, Employee>
     */
    public function __invoke(string $search): LengthAwarePaginator
    {
        return Employee::query()
            ->with([
                'user:id,name,email',
                'extentions:employee_id,extention',
            ])
            ->when($search !== '', fn (Builder $query) => $query->where(fn (Builder $query) => $query->where('full_name_ar', 'like', $search)
                ->orWhere('full_name_ar', 'like', $search)
                ->orWhere('employee_code', 'like', $search)
                ->orWhere('phone', 'like', $search)
                ->orWhereHas('user', fn (Builder $query) => $query->where('name', 'like', $search)
                    ->orWhere('email', 'like', $search)
                )
                ->orWhereHas('extentions', fn (Builder $query) => $query->where('extention', 'like', $search)
                )
            ))
            ->select([
                'employees.first_name_en',
                'employees.middle_name_en',
                'employees.third_name_en',
                'employees.last_name_en',
                'employees.full_name_en',
                'employees.first_name_ar',
                'employees.middle_name_ar',
                'employees.third_name_ar',
                'employees.last_name_ar',
                'employees.full_name_ar',
                'employees.employee_code',
                'employees.image',
                'employees.gender_id',
                'user_id',
                'employees.id',
                'phone',
            ])
            ->paginate()
            ->withQueryString()
            ->onEachSide(1);
    }
}
