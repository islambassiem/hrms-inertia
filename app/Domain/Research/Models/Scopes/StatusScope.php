<?php

declare(strict_types=1);

namespace App\Domain\Research\Models\Scopes;

use App\Domain\Research\Models\Status;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * @implements Scope<Status>
 */
final class StatusScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('reference_type_id', ReferenceType::RESEARCH_STATUS);
    }
}
