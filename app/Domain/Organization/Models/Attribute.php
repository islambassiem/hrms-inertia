<?php

declare(strict_types=1);

namespace App\Domain\Organization\Models;

use App\Concerns\UserStamp;
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
    public array $translatable = ['name'];

    public function casts(): array
    {
        return [
            'name' => TranslatedNameData::class,
        ];
    }

    protected static function newFactory(): OrganizationAttributeFactory
    {
        return OrganizationAttributeFactory::new();
    }
}
