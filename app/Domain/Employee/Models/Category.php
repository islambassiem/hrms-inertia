<?php

declare(strict_types=1);

namespace App\Domain\Employee\Models;

use App\Concerns\UserStamp;
use Database\Factories\EmployeeCategoryFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

#[Fillable([
    'name',
    'code',
    'parent_id',
    'created_by',
    'updated_by',
])]
#[Table('employee_categories')]
final class Category extends Model
{
    /** @use HasFactory<EmployeeCategoryFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Category> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    /**
     * @return BelongsTo<Category, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    protected static function newFactory(): EmployeeCategoryFactory
    {
        return EmployeeCategoryFactory::new();
    }
}
