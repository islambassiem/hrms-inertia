<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Data\DateRangeData;
use App\Data\EmploeeFilterData;
use App\Domain\Employee\Models\Employee;
use App\Domain\Organization\Models\Department;
use Illuminate\Database\Eloquent\Builder;

final class EmployeeListQuery
{
    /**
     * @return Builder<Employee>
     */
    public function build(EmploeeFilterData $filter): Builder
    {
        return Employee::query()
            ->with($this->getWith())
            ->select($this->getFields())
            ->when($filter->search !== '',
                fn (Builder $query) => $this->applySearchFilter($query, $filter->search ?? '')
            )
            ->when($filter->statuses,
                fn (Builder $query) => $this->filterStatus($query, $filter->statuses ?? [])
            )
            ->when($filter->entities,
                fn (Builder $query) => $this->filterEntity($query, $filter->entities ?? []),
            )
            ->when($filter->colleges,
                fn (Builder $query) => $this->filterCollege($query, $filter->colleges ?? [])
            )
            ->when($filter->departments,
                fn (Builder $query) => $this->filterDepartment($query, $filter->departments ?? [])
            )
            ->when($filter->categories,
                fn (Builder $query) => $this->filterCategory($query, $filter->categories ?? [])
            )
            ->when($filter->academicRanks,
                fn (Builder $query) => $this->filterAcademicRanks($query, $filter->academicRanks ?? [])
            )
            ->when($filter->positions,
                fn (Builder $query) => $this->filterPosition($query, $filter->positions ?? [])
            )
            ->when($filter->sponsorships,
                fn (Builder $query) => $this->filterSponsorship($query, $filter->sponsorships ?? [])
            )
            ->when($filter->nationalities,
                fn (Builder $query) => $this->filterNationality($query, $filter->nationalities ?? [])
            )
            ->when($filter->genders,
                fn (Builder $query) => $this->filterGender($query, $filter->genders ?? [])
            )
            ->when($filter->joining,
                fn (Builder $query): Builder => $this->filterJoiningDate($query, $filter->joining)
            )
            ->when($filter->resignation,
                fn (Builder $query): Builder => $this->filterResignationDate($query, $filter->resignation)
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
                ], 'like', \sprintf('%%%s%%', $search))
                ->orWhereHas('user', fn ($q) => $q->where('email', 'like', sprintf('%%%s%%', $search)))
                ->orWhereHas('nationalId', fn ($q) => $q->where('identity_number', 'like', sprintf('%%%s%%', $search)));
        });
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $entities
     */
    private function filterEntity(Builder $builder, array $entities): void
    {
        $builder->whereIn(
            'department_id',
            Department::allDescendantIds($entities)
        );
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $colleges
     */
    private function filterCollege(Builder $builder, array $colleges): void
    {
        $builder->whereIn(
            'department_id',
            Department::allDescendantIds($colleges)
        );
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $departments
     */
    private function filterDepartment(Builder $builder, array $departments): void
    {
        $builder->whereIn('department_id', $departments);
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $academicRanks
     */
    private function filterAcademicRanks(Builder $builder, array $academicRanks): void
    {
        $builder->whereHas('organizationAttribute', function ($query) use ($academicRanks): void {
            $query->whereIn('attribute_id', $academicRanks)
                ->whereNull('end_date');
        });
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $positions
     */
    private function filterPosition(Builder $builder, array $positions): void
    {
        $builder->whereHas('organizationAttribute', function ($query) use ($positions): void {
            $query->whereIn('attribute_id', $positions)
                ->whereNull('end_date');
        });
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $genders
     */
    private function filterGender(Builder $builder, array $genders): void
    {
        $builder->whereIn('gender_id', $genders);
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $categories
     */
    private function filterCategory(Builder $builder, array $categories): void
    {
        $builder->whereIn('category_id', $categories);
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $sponsorships
     */
    private function filterSponsorship(Builder $builder, array $sponsorships): void
    {
        $builder->whereHas('organizationAttribute', function ($query) use ($sponsorships): void {
            $query->whereIn('attribute_id', $sponsorships)
                ->whereNull('end_date');
        });
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $nationalities
     */
    private function filterNationality(Builder $builder, array $nationalities): void
    {
        $builder->whereIn('nationality_id', $nationalities);
    }

    /**
     * @param  Builder<Employee>  $builder
     * @param  int[]  $statuses
     */
    private function filterStatus(Builder $builder, array $statuses): void
    {
        $builder->where('is_active', $statuses);
    }

    /**
     * @param  Builder<Employee>  $builder
     * @return Builder<Employee>
     */
    private function filterJoiningDate(Builder $builder, DateRangeData $joining): Builder
    {
        return $builder
            ->when(
                filled($joining->from ?? null),
                fn (Builder $q) => $q->whereDate('joining_date', '>=', $joining->from)
            )
            ->when(
                filled($joining->to ?? null),
                fn (Builder $q) => $q->whereDate('joining_date', '<=', $joining->to)
            );
    }

    /**
     * @param  Builder<Employee>  $builder
     * @return Builder<Employee>
     */
    private function filterResignationDate(Builder $builder, DateRangeData $resignation): Builder
    {
        return $builder
            ->when(
                filled($resignation->from ?? null),
                fn (Builder $q) => $q->whereDate('resignation_date', '>=', $resignation->from)
            )
            ->when(
                filled($resignation->to ?? null),
                fn (Builder $q) => $q->whereDate('resignation_date', '<=', $resignation->to)
            );
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
            'extentions:id,employee_id,extention',
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
            'gender_id',
            'user_id',
            'phone',
            'joining_date',
            'leaving_date',
            'image',
            'is_active',
        ];
    }
}
