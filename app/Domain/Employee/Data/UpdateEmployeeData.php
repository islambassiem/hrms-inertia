<?php

namespace App\Domain\Employee\Data;

use Carbon\CarbonImmutable;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\File;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Optional;

class UpdateEmployeeData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        #[Exists('users', 'id')]
        public int|Optional $user_id,

        #[Nullable]
        #[Exists('users', 'id')]
        public int|Optional $head_id,

        #[Regex('/^50[01][0-9]{3}$/')]
        #[Unique('employees', 'employee_code', ignore: 'id')]
        public string|Optional $employee_code,

        #[Max(30)]
        #[Regex('/^[\p{Arabic}\s]+$/u')]
        public string|Optional $first_name_ar,

        #[Nullable]
        #[Max(30)]
        #[Regex('/^[\p{Arabic}\s]+$/u')]
        public ?string $middle_name_ar,

        #[Nullable]
        #[Max(30)]
        #[Regex('/^[\p{Arabic}\s]+$/u')]
        public ?string $third_name_ar,

        #[Max(30)]
        #[Regex('/^[\p{Arabic}\s]+$/u')]
        public string|Optional $last_name_ar,

        #[Max(30)]
        #[Regex('/^[\p{Latin}\s]+$/u')]
        public string|Optional $first_name_en,

        #[Nullable]
        #[Max(30)]
        #[Regex('/^[\p{Latin}\s]+$/u')]
        public ?string $middle_name_en,

        #[Nullable]
        #[Max(30)]
        #[Regex('/^[\p{Latin}\s]+$/u')]
        public ?string $third_name_en,

        #[Max(30)]
        #[Regex('/^[\p{Latin}\s]+$/u')]
        public string|Optional $last_name_en,

        #[Nullable]
        #[Exists('shared_marital_statuses', 'id')]
        public int|Optional $marital_status_id,

        #[Nullable]
        #[Exists('shared_religions', 'id')]
        public int|Optional $religion_id,

        #[Nullable]
        #[Exists('shared_special_needs', 'id')]
        public int|Optional $special_need_id,

        #[Exists('shared_genders', 'id')]
        public int $gender_id,

        #[Exists('employee_sponsorships', 'id')]
        public int $sponsorship_id,

        #[Exists('organization_departments', 'id')]
        public int $department_id,

        #[Exists('shared_countries', 'id')]
        public int $nationality_id,

        #[Nullable]
        #[Exists('shared_countries', 'id')]
        public int|Optional $place_of_birth,

        #[Email]
        #[Unique('employees', 'email', ignore: 'id')]
        public string|Optional $email,

        #[Regex('/^5\d{8}$/')]
        public string|Optional $phone,

        #[Nullable]
        #[File]
        public UploadedFile|Optional $image,

        public CarbonImmutable $date_of_birth,
        public CarbonImmutable $joining_date,

        #[Nullable]
        public CarbonImmutable|Optional $leaving_date,

        public ?string $home_telephone_number,
        public ?string $home_country_identity,

        #[In(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])]
        public ?string $blood_type,

        public bool|Optional $is_active,
    )
    {
        //
    }
}
