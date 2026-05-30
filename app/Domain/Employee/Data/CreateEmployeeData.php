<?php

declare(strict_types=1);

namespace App\Domain\Employee\Data;

use App\Domain\Shared\Enums\ReferenceType;
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
use Spatie\LaravelData\Support\Validation\Constraints\WhereConstraint;

final class CreateEmployeeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('users', 'id')]
        public int $user_id,

        #[Nullable, Exists('employees', 'id')]
        public ?int $head_id,

        #[Regex('/^50[01]\d{3}$/'), Unique('employees', 'employee_code')]
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

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::SHARED_MARITAL_STATUS)
        ), Nullable]
        public ?int $marital_status_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::SHARED_RELIGION)
        ), Nullable]
        public ?int $religion_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::EMPLOYEE_SPECIAL_NEEDS)
        ), Nullable]
        public ?int $special_needs_id,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::SHARED_GENDER)
        )]
        public int $gender_id,

        #[Nullable, Exists('employee_categories', 'id')]
        public int $category_id,

        #[Exists('organization_departments', 'id')]
        public int $department_id,

        #[Exists('shared_countries', 'id')]
        public int $nationality_id,

        #[Nullable, Exists('shared_countries', 'id')]
        public ?int $place_of_birth,

        #[Email, Unique('employees', 'email')]
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
