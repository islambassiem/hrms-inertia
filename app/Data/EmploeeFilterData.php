<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class EmploeeFilterData extends Data
{
    /**
     * @param  int[]  $entities
     * @param  int[]  $colleges
     * @param  int[]  $departments
     * @param  int[]  $academicRanks
     * @param  int[]  $positions
     * @param  int[]  $genders
     * @param  int[]  $statuses
     * @param  int[]  $categories
     * @param  int[]  $sponsorships
     * @param  int[]  $nationalities
     */
    public function __construct(
        public ?string $search = '',
        public ?array $entities = [],
        public ?array $colleges = [],
        public ?array $departments = [],
        public ?array $academicRanks = [],
        public ?array $positions = [],
        public ?array $genders = [],
        public ?array $statuses = [],
        public ?array $categories = [],
        public ?array $sponsorships = [],
        public ?array $nationalities = [],
        public DateRangeData $joining = new DateRangeData(),
        public DateRangeData $resignation = new DateRangeData(),
    ) {}
}
