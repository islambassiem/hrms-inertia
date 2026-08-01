<?php

declare(strict_types=1);

namespace App\Domain\Shared\Models\Scopes;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\Bank;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * @implements Scope<Bank>
 */
class BankScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('reference_type_id', ReferenceType::BANK->value);
    }
}
