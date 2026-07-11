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
use Illuminate\Database\Eloquent\Relations\HasMany;
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
/**
 * @property int $id
 * @property TranslatedNameData $name
 */
final class Department extends Model
{
    /** @use HasFactory<DepartmentFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Department> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    /**
     * @param  int[]  $departmentIds
     * @param  int[]  $visited
     * @return int[]
     */
    public static function allDescendantIds(array $departmentIds, array &$visited = []): array
    {
        $departmentIds = array_diff($departmentIds, $visited);

        if ($departmentIds === []) {
            return [];
        }

        /** @var int[] $visited */
        $visited = [...$visited, ...$departmentIds];

        /** @var int[] $children */
        $children = self::query()
            ->whereIn('parent_id', $departmentIds)
            ->pluck('id')
            ->all();

        self::allDescendantIds($children, $visited);

        return array_values(array_unique($visited));
    }

    public function casts(): array
    {
        return [
            'name' => TranslatedNameData::class,
            'type' => DepartmentType::class,
            'is_active' => 'boolean',
        ];
    }

    /**
     * @return HasMany<Department, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
}
