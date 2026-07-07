<?php

namespace App\Queries\Hr;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\Gender;
use Illuminate\Database\Eloquent\Builder;

class GenderListQuery
{
    /**
     * @return Builder<Gender>
     */
    public function build(): Builder
    {
        return Gender::query()
            ->select('id', 'name')
            ->where('reference_type_id', ReferenceType::SHARED_GENDER->value);
    }
}
