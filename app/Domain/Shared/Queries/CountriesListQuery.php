<?php

declare(strict_types=1);

namespace App\Domain\Shared\Queries;

use App\Domain\Shared\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

final class CountriesListQuery
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
            ]);
    }
}
