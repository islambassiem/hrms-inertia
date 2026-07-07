<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

final class EmployeeNationalityListQuery
{
    /**
     * @return Builder<Country>
     */
    public function build(): Builder
    {
        /** @var Builder<Country> $query */
        $query = Country::query();

        $name = app()->getLocale() === 'ar' ? 'name_ar' : 'name_en';

        return $query
            ->select([
                'id',
                DB::raw($name.' as name'),
            ])
            ->whereIn('id', $this->nationalities());
    }

    /**
     * @return array<mixed>
     */
    private function nationalities(): array
    {
        return Employee::query()
            ->select('nationality_id')
            ->distinct()
            ->pluck('nationality_id')
            ->toArray();
    }
}
