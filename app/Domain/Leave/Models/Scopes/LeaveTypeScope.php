<?php

declare(strict_types=1);

namespace App\Domain\Leave\Models\Scopes;

use App\Domain\Leave\Models\LeaveType;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * @implements Scope<LeaveType>
 */
final class LeaveTypeScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('reference_type_id', ReferenceType::LEAVE_TYPE->value);
    }
}
