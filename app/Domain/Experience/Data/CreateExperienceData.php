<?php

declare(strict_types=1);

namespace App\Domain\Experience\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\After;
use Spatie\LaravelData\Attributes\Validation\Before;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

final class CreateExperienceData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employee_employees', 'id')]
        public int $employee_id,

        #[Max(255), Min(5)]
        public string $position,

        #[Max(255), Min(5)]
        public string $organization,

        #[Max(255), Min(5), Nullable]
        public ?string $city,

        #[Exists('shared_countries', 'id')]
        public int $country_id,

        #[Max(255), Min(5), Nullable]
        public ?string $department,

        #[Max(255), Min(5), Nullable]
        public ?string $section,

        #[Before('today')]
        public CarbonImmutable $start_date,

        #[After('start_date')]
        public CarbonImmutable $end_date,

        public ?string $tasks,

    ) {
        //
    }
}
