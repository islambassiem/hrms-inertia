<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Models\Scopes;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Workflow\Models\Workflow;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * @implements Scope<Workflow>
 */
final class WorkflowScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('reference_type_id', ReferenceType::WORKFLOW->value);
    }
}
