<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateQualificationData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employees', 'id')]
        public int|Optional $employee_id,

        #[Exists('qualification_specialties', 'id')]
        public int|Optional $major_id,

        #[Exists('qualification_specialties', 'id'), Nullable]
        public int|Optional $minor_id,

        #[Exists('shared_reference_values', 'id')]
        public int|Optional $educational_sub_level_id,

        #[Exists('qualification_included_specialties', 'id')]
        public int|Optional $included_specialty_id,

        #[Max(50), Min(4), Nullable]
        public string|Optional $institution_name,

        #[Max(50), Min(4), Nullable]
        public string|Optional $college_name,

        #[Exists('shared_reference_values', 'id')]
        public int|Optional $scientific_degree_id,

        #[Nullable()]
        public CarbonImmutable|Optional $graduation_date,

        #[Exists('shared_countries', 'id')]
        public int|Optional $graduation_country_id,

        public bool|Optional $is_last_qualification,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public int|Optional $rating_id,

        #[Nullable()]
        public string|Optional $gpa,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public int|Optional $gpa_type_id,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public int|Optional $study_type_id,

        #[Max(50), Min(4), Nullable]
        public string|Optional $city,

        #[Exists('shared_reference_values', 'id'), Nullable]
        public int|Optional $research_type_id,

        public bool|Optional $is_authenticated,
    ) {
        //
    }
}
