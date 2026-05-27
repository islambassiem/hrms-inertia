<?php

declare(strict_types=1);

namespace App\Domain\Organization\Models;

use App\Concerns\UserStamp;
use Database\Factories\OrganizationAttributeTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'code',
    'created_by',
    'updated_by',
])]
#[Table('organization_attribute_types')]
final class AttributeType extends Model
{
    /** @use HasFactory<OrganizationAttributeTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<AttributeType> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): OrganizationAttributeTypeFactory
    {
        return OrganizationAttributeTypeFactory::new();
    }
}
