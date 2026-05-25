<?php

declare(strict_types=1);

namespace App\Domain\Course\Data;

use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateCourseData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Max(255), Min(5), Nullable]
        public string|Optional $course_name,

        #[Exists('course_course_types', 'id'), Nullable]
        public int|Optional $course_type_id,

        #[Max(255), Min(5), Nullable]
        public string|null|Optional $issuer,

        #[Digits(4), Nullable]
        public int|Optional $awarding_year,

        #[Max(50), Min(5), Nullable]
        public string|null|Optional $course_period,

        #[Max(50), Min(5), Nullable]
        public string|null|Optional $city,

        #[Exists('shared_countries', 'id'), Nullable]
        public int|null|Optional $country_id,
    ) {
        //
    }
}
