<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class EmploeeFilterData extends Data
{
    /**
     * @param string $search
     * @param int[] $entities
     * @param int[] $colleges
     * @param int[] $departments
     * @param int[] $academicRanks
     * @param int[] $positions
     * @param int[] $genders
     * @param int[] $categories
     * @param int[] $sponsorships
     * @param int[] $nationalities
     * @param int[] $joiningDate
     */
    public function __construct(
        public ?string $search = '',
        public ?array $entities = [],
        public ?array $colleges = [],
        public ?array $departments = [],
        public ?array $academicRanks = [],
        public ?array $positions = [],
        public ?array $genders = [],
        public ?array $categories = [],
        public ?array $sponsorships = [],
        public ?array $nationalities = [],
        public ?array $joiningDate = [],
    ) {}
}
