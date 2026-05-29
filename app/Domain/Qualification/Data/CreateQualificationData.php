<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

final class CreateQualificationData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employee_employees', 'id')]
        public int $employee_id,

        #[Exists('qualification_specialties', 'id')]
        public int $major_id,

        #[Exists('qualification_specialties', 'id'), Nullable]
        public ?int $minor_id,

        #[Exists('shared_reference_values', 'id')]
        public int $educational_sub_level_id,

        #[Exists('qualification_included_specialties', 'id')]
        public int $included_specialty_id,

        #[Max(50), Min(4), Nullable]
        public ?string $institution_name,

        #[Max(50), Min(4), Nullable]
        public ?string $college_name,

        #[Exists('shared_reference_values', 'id')]
        public int $scientific_degree_id,

        public CarbonImmutable $graduation_date,

        #[Exists('shared_countries', 'id')]
        public int $graduation_country_id,

        public ?bool $is_last_qualification,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public ?int $rating_id,

        #[Nullable()]
        public ?string $gpa,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public int $gpa_type_id,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public ?int $study_type_id,

        #[Max(50), Min(4), Nullable]
        public ?string $city,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public ?int $research_type_id,

        public ?bool $is_authenticated,
    ) {
        //
    }
}
