<?php

declare(strict_types=1);

namespace App\Domain\Course\Models;

use App\Concerns\UserStamp;
use Database\Factories\CourseTypeFactory;
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
#[Table('course_course_types')]
final class CourseType extends Model
{
    /** @use HasFactory<CourseTypeFactory> */
    use HasFactory;

    use HasTranslations;

    /** @use UserStamp<CourseType> */
    use UserStamp;

    /** @var array<string> */
    public $translatable = ['name'];

    protected static function newFactory(): CourseTypeFactory
    {
        return CourseTypeFactory::new();
    }
}
