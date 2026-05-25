<?php

declare(strict_types=1);

namespace App\Domain\Course\Actions;

use App\Domain\Course\Data\CreateCourseData;
use App\Domain\Course\Models\Course;

final class CreateCourseAction
{
    public function handle(CreateCourseData $data): Course
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Course::query()->create($attributes);
    }
}
