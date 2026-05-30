<?php

declare(strict_types=1);

namespace App\Domain\Course\Data;

use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

final class CreateCourseData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employees', 'id')]
        public int $employee_id,

        #[Max(255), Min(5)]
        public string $course_name,

        #[Exists('shared_reference_values', 'id')]
        public int $type_id,

        #[Max(255), Min(5)]
        public ?string $issuer,

        #[Digits(4)]
        public ?int $awarding_year,

        #[Max(50), Min(5)]
        public ?string $course_period,

        #[Max(50), Min(5)]
        public ?string $city,

        #[Exists('shared_countries', 'id'), Nullable]
        public ?int $country_id,
    ) {
        //
    }
}
