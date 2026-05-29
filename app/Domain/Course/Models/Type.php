<?php

declare(strict_types=1);

namespace App\Domain\Course\Models;

use App\Concerns\UserStamp;
use App\Domain\Course\Models\Scopes\TypeScope;
use Database\Factories\CourseTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
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
#[Table('shared_reference_values')]
#[ScopedBy(TypeScope::class)]
final class Type extends Model
{
    /** @use HasFactory<CourseTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<Type> */
    use UserStamp;

    /** @var array<string> */
    public array $translatable = ['name'];

    protected static function newFactory(): CourseTypeFactory
    {
        return CourseTypeFactory::new();
    }
}
