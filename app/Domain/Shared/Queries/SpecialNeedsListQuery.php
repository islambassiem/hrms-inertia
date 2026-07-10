<?php

declare(strict_types=1);

namespace App\Domain\Shared\Queries;

use App\Domain\Shared\Models\SpecialNeeds;
use Illuminate\Database\Eloquent\Builder;

final class SpecialNeedsListQuery
{
    /**
     * @return Builder<SpecialNeeds>
     */
    public function build(): Builder
    {
        return SpecialNeeds::query()
            ->select(['id', 'name']);
    }
}
