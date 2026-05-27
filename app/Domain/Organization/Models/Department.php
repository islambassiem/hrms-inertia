<?php

declare(strict_types=1);

namespace App\Domain\Organization\Models;

use App\Concerns\UserStamp;
use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Shared\Data\TranslatedNameData;
use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'code',
    'type',
    'is_active',
    'parent_id',
    'head_id',
    'created_by',
    'updated_by',
])]
#[Table('organization_departments')]
final class Department extends Model
{
    /** @use HasFactory<DepartmentFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Department> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    public function casts(): array
    {
        return [
            'name' => TranslatedNameData::class,
            'type' => DepartmentType::class,
            'is_active' => 'boolean',
        ];
    }

    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
}
