<?php

declare(strict_types=1);

namespace App\Domain\Employee\Data;

use Carbon\CarbonImmutable;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\File;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateEmployeeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Nullable, Exists('users', 'id')]
        public int|null|Optional $head_id,

        #[Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public string|null|Optional $first_name_ar,

        #[Nullable, Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public string|null|Optional $middle_name_ar,

        #[Nullable, Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public string|null|Optional $third_name_ar,

        #[Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public string|null|Optional $last_name_ar,

        #[Max(30), Min(2), Regex('/^[\p{Latin}\s]+$/u')]
        public string|null|Optional $first_name_en,

        #[Nullable, Max(30), Min(2), Regex('/^[\p{Latin}\s]+$/u')]
        public string|null|Optional $middle_name_en,

        #[Nullable, Max(30), Min(2), Regex('/^[\p{Latin}\s]+$/u')]
        public string|null|Optional $third_name_en,

        #[Max(30), Min(2), Regex('/^[\p{Latin}\s]+$/u')]
        public string|null|Optional $last_name_en,

        #[Nullable, Exists('shared_marital_statuses', 'id')]
        public int|null|Optional $marital_status_id,

        #[Nullable, Exists('shared_religions', 'id')]
        public int|null|Optional $religion_id,

        #[Nullable, Exists('shared_special_needs', 'id')]
        public int|null|Optional $special_need_id,

        #[Exists('shared_genders', 'id')]
        public int|null|Optional $gender_id,

        #[Exists('employee_sponsorships', 'id')]
        public int|null|Optional $sponsorship_id,

        #[Nullable, Exists('employee_categories', 'id')]
        public int|null|Optional $category_id,

        #[Exists('organization_departments', 'id')]
        public int|null|Optional $department_id,

        #[Exists('shared_countries', 'id')]
        public int|null|Optional $nationality_id,

        #[Nullable, Exists('shared_countries', 'id')]
        public int|null|Optional $place_of_birth,

        #[Email, Unique('employee_employees', 'email')]
        public string|null|Optional $email,

        #[Regex('/^5\d{8}$/')]
        public string|null|Optional $phone,

        public CarbonImmutable|null|Optional $date_of_birth,
        public CarbonImmutable|null|Optional $leaving_date,

        public string|null|Optional $home_telephone_number,
        public string|null|Optional $home_country_identity,

        #[Nullable, File]
        public ?UploadedFile $image,

        public bool|null|Optional $is_active,

        #[Nullable, In(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])]
        public string|null|Optional $blood_type = null,
    ) {
        //
    }
}
