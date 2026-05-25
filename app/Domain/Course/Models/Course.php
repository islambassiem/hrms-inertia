<?php

declare(strict_types=1);

namespace App\Domain\Course\Models;

use App\Concerns\UserStamp;
use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'employee_id',
    'course_name',
    'course_type_id',
    'issuer',
    'awarding_year',
    'course_period',
    'city',
    'country_id',
    'created_by',
    'updated_by',
])]
#[Table('course_courses')]
final class Course extends Model
{
    /** @use HasFactory<CourseFactory> */
    use HasFactory;

    /** @use UserStamp<Course> */
    use UserStamp;

    protected static function newFactory(): CourseFactory
    {
        return CourseFactory::new();
    }
}
