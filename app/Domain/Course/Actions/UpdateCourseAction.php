<?php

declare(strict_types=1);

namespace App\Domain\Course\Actions;

use App\Domain\Course\Data\UpdateCourseData;
use App\Domain\Course\Models\Course;

final class UpdateCourseAction
{
    public function handle(UpdateCourseData $data, Course $course): Course
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $course->update($attributes);

        return $course;
    }
}
