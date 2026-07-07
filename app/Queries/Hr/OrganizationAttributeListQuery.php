<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Organization\Enums\AttributeType;
use App\Domain\Organization\Models\Attribute;
use Illuminate\Database\Eloquent\Builder;

final class OrganizationAttributeListQuery
{
    /**
     * @return Builder<Attribute>
     */
    public function build(?AttributeType $type = null): Builder
    {
        return Attribute::query()
            ->select('id', 'name')
            ->when($type, function ($query, $type): void {
                $query->where('type_id', $type->value);
            });
    }
}
