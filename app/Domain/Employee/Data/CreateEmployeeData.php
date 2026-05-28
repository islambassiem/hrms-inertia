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

final class CreateEmployeeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('users', 'id')]
        public int $user_id,

        #[Nullable, Exists('users', 'id')]
        public ?int $head_id,

        #[Regex('/^50[01]\d{3}$/'), Unique('employee_employees', 'employee_code')]
        public string $employee_code,

        #[Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public string $first_name_ar,

        #[Nullable, Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public ?string $middle_name_ar,

        #[Nullable, Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public ?string $third_name_ar,

        #[Max(30), Min(2), Regex('/^[\p{Arabic}\s]+$/u')]
        public string $last_name_ar,

        #[Max(30), Min(2), Regex('/^[A_Za-z]+$/i')]
        public string $first_name_en,

        #[Nullable, Max(30), Min(2), Regex('/^[A_Za-z]+$/i')]
        public ?string $middle_name_en,

        #[Nullable, Max(30), Min(2), Regex('/^[A_Za-z]+$/i')]
        public ?string $third_name_en,

        #[Max(30), Min(2), Regex('/^[A_Za-z]+$/i')]
        public string $last_name_en,

        #[Nullable, Exists('shared_reference_values', 'id')]
        public ?int $marital_status_id,

        #[Nullable, Exists('shared_reference_values', 'id')]
        public ?int $religion_id,

        #[Nullable, Exists('shared_reference_values', 'id')]
        public ?int $special_needs_id,

        #[Exists('shared_reference_values', 'id')]
        public int $gender_id,

        #[Nullable, Exists('employee_categories', 'id')]
        public int $category_id,

        #[Exists('organization_departments', 'id')]
        public int $department_id,

        #[Exists('shared_countries', 'id')]
        public int $nationality_id,

        #[Nullable, Exists('shared_countries', 'id')]
        public ?int $place_of_birth,

        #[Email, Unique('employee_employees', 'email')]
        public string $email,

        #[Regex('/^5\d{8}$/')]
        public string $phone,

        public CarbonImmutable $date_of_birth,
        public CarbonImmutable $joining_date,
        public ?CarbonImmutable $leaving_date,

        public ?string $home_telephone_number,
        public ?string $home_country_identity,

        #[Nullable, File]
        public ?UploadedFile $image,

        #[Nullable, In(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])]
        public ?string $blood_type = null,

        public bool $is_active = true,
    ) {
        //
    }
}
