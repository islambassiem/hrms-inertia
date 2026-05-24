<?php

declare(strict_types=1);

namespace App\Domain\Organization\Models;

use App\Concerns\UserStamp;
use App\Domain\Organization\Enums\AttributeType;
use App\Domain\Shared\Data\TranslatedNameData;
use Database\Factories\OrganizationAttributeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'code',
    'type',
    'created_by',
    'updated_by',
])]
#[Table('organization_attributes')]
final class Attribute extends Model
{
    /** @use HasFactory<OrganizationAttributeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Attribute> */
    use UserStamp;

    /** @var array<string> */
    public $translatable = ['name'];

    public function casts()
    {
        return [
            'name' => TranslatedNameData::class,
            'type' => AttributeType::class,
        ];
    }

    protected static function newFactory(): OrganizationAttributeFactory
    {
        return OrganizationAttributeFactory::new();
    }
}
