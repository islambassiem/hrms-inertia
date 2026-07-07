<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Builder;

final class EmployeeListQuery
{
    /**
     * @return Builder<Employee>
     */
    public function build(string $search = ''): Builder
    {
        return Employee::query()
            ->with($this->getWith())
            ->select($this->getFields())
            ->when(
                $search !== '',
                fn (Builder $query) => $this->applySearchFilter($query, $search),
                $this->applyActiveFilter(...)
            );
    }

    /**
     * @param  Builder<Employee>  $builder
     */
    private function applySearchFilter(Builder $builder, string $search): void
    {
        $builder->where(function ($query) use ($search): void {
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
                ], 'like', sprintf('%%%s%%', $search))
                ->orWhereHas('user', fn ($q) => $q->where('email', 'like', sprintf('%%%s%%', $search)))
                ->orWhereHas('nationalId', fn ($q) => $q->where('identity_number', 'like', sprintf('%%%s%%', $search)));
        });
    }

    /**
     * @param  Builder<Employee>  $builder
     */
    private function applyActiveFilter(Builder $builder): void
    {
        $builder->where('is_active', true);
    }

    /**
     * @return string[]
     */
    private function getWith(): array
    {
        return [
            'department:id,name',
            'user:id,email',
            'nationalId:id,employee_id,identity_type_id,identity_number',
        ];
    }

    /**
     * @return string[]
     */
    private function getFields(): array
    {
        return [
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
        ];
    }
}
