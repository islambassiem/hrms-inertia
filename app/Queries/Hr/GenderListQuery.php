<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\Gender;
use Illuminate\Database\Eloquent\Builder;

final class GenderListQuery
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
