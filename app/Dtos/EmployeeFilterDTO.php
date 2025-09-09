<?php

namespace App\Dtos;

final class EmployeeFilterDTO
{
    /**
     * Create a new class instance.
     *
     * @param  array<string, mixed>  $departments
     * @param  array<string, mixed>  $categories
     * @param  array<string, mixed>  $is_active
     * @param  array<string, mixed>  $gender
     * @param  array<string, mixed>  $countries
     * @param  array<string, mixed>  $sponsorships
     * @param  array<string, mixed>  $qualifications
     */
    public function __construct(
        public readonly ?array $gender = [],
        public readonly ?array $is_active = [],
        public readonly ?string $identification = null,
        public readonly ?string $passport = null,
        public readonly ?array $departments = [],
        public readonly ?array $categories = [],
        public readonly ?array $countries = [],
        public readonly ?array $sponsorships = [],
        public readonly ?array $qualifications = [],
        public readonly ?string $active_from = null,
        public readonly ?string $active_to = null,
        public readonly ?string $joining_date_from = null,
        public readonly ?string $joining_date_to = null,
        public readonly ?string $resignation_date_from = null,
        public readonly ?string $resignation_date_to = null,
    ) {
        //
    }
}
