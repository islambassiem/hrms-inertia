<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Models\Scopes;

use App\Domain\Qualification\Models\ResearchType;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * @implements Scope<ResearchType>
 */
final class ResearchTypeScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('reference_type_id', ReferenceType::RESEARCH_TYPE);
    }
}
