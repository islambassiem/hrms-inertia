<?php

declare(strict_types=1);

namespace App\Domain\Organization\Models;

use App\Concerns\UserStamp;
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
#[Table('organizations_department')]
final class Department extends Model
{
    /** @use HasFactory<DepartmentFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Department> */
    use UserStamp;

    /** @var array<string> */
    public $translatable = ['name'];

    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
}
