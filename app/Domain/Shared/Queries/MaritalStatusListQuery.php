<?php

declare(strict_types=1);

namespace App\Domain\Shared\Queries;

use App\Domain\Shared\Models\MaritalStatus;
use Illuminate\Database\Eloquent\Builder;

final class MaritalStatusListQuery
{
    /**
     * @return Builder<MaritalStatus>
     */
    public function build(): Builder
    {
        return MaritalStatus::query()
            ->select(['id', 'name']);
    }
}
