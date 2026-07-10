<?php

declare(strict_types=1);

namespace App\Domain\Shared\Queries;

use App\Domain\Shared\Models\Religion;
use Illuminate\Database\Eloquent\Builder;

final class ReligionListQuery
{
    /**
     * @return Builder<Religion>
     */
    public function build(): Builder
    {
        return Religion::query()
            ->select(['id', 'name']);
    }
}
