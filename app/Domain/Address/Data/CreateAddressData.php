<?php

declare(strict_types=1);

namespace App\Domain\Address\Data;

use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class CreateAddressData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employee_employees', 'id')]
        public int $employee_id,

        #[Max(8), Regex('/^[A-Z]{4}\d{4}$/')]
        public string $short_address,

        #[Digits(4), Nullable]
        public string|null|Optional $building_number,

        #[Max(50), Nullable]
        public string|null|Optional $street,

        #[Digits(4), Nullable]
        public string|null|Optional $secondary_number,

        #[Max(50), Nullable]
        public string|null|Optional $district,

        #[Digits(4), Nullable]
        public string|null|Optional $postal_code,

        #[Max(50), Nullable]
        public string|null|Optional $city,
    ) {
        //
    }
}
