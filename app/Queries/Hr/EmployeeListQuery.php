<?php

namespace App\Queries\Hr;

use App\Dtos\EmployeeFilterDTO;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;

class EmployeeListQuery
{

    /**
     * @return Builder<Employee>
     */
    public function handle(EmployeeFilterDTO $dto): Builder
    {
        return Employee::with([
            'user',
            'nationality',
            'sponsorship',
            'categories',
            'positions',
            'departments',
            'nationalId',
            'extentions',
            'passport',
        ])
            ->when(! empty($dto->active_from) && ! empty($dto->active_to), function ($query) use ($dto) {
                return $query->whereDate('joining_date', '<=', $dto->active_to)
                    ->where(function ($query) use ($dto) {
                        return $query->whereDate('resignation_date', '>=', $dto->active_from)
                            ->orWhereNull('resignation_date');
                    });
            })
            ->when(! empty($dto->joining_date_from) && ! empty($dto->joining_date_to), function ($query) use ($dto) {
                return $query->whereDate('joining_date', '>=', $dto->joining_date_from)
                    ->whereDate('joining_date', '<=', $dto->joining_date_to);
            })
            ->when(! empty($dto->resignation_date_from) && ! empty($dto->resignation_date_to), function ($query) use ($dto) {
                return $query->whereDate('resignation_date', '>=', $dto->resignation_date_from)
                    ->whereDate('resignation_date', '<=', $dto->resignation_date_to);
            })
            ->when(! empty($dto->is_active), function ($query) use ($dto) {
                return $query->whereIn('is_active', $dto->is_active);
            })
            ->when(! empty($dto->gender), function ($query) use ($dto) {
                return $query->whereIn('gender', $dto->gender);
            })
            ->when(! empty($dto->identification), function ($query) use ($dto) {
                return $query->whereHas('nationalId', function ($query) use ($dto) {
                    return $query->where('id_number', 'like', '%'.$dto->identification.'%');
                });
            })
            ->when(! empty($dto->passport), function ($query) use ($dto) {
                return $query->whereHas('passport', function ($query) use ($dto) {
                    return $query->where('id_number', 'like', '%'.$dto->passport.'%');
                });
            })
            ->when(! empty($dto->departments), function ($query) use ($dto) {
                return $query->whereHas('departments', function ($query) use ($dto) {
                    return $query->whereIn('_departments.id', $dto->departments);
                });
            })
            ->when(! empty($dto->categories), function ($query) use ($dto) {
                return $query->whereHas('categories', function ($query) use ($dto) {
                    return $query->whereIn('_categories.id', $dto->categories);
                });
            })
            ->when(! empty($dto->countries), function ($query) use ($dto) {
                return $query->whereIn('nationality_id', $dto->countries);
            })
            ->when(! empty($dto->sponsorships), function ($query) use ($dto) {
                return $query->whereIn('sponsorship_id', $dto->sponsorships);
            })
            ->when(! empty($dto->qualifications), function ($query) use ($dto) {
                return $query->whereHas('qualification', function ($query) use ($dto) {
                    return $query->whereIn('qualifications.qualification', $dto->qualifications);
                });
            });
    }
}
