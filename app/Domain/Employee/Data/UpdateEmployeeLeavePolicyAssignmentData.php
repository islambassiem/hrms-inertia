<?php

declare(strict_types=1);

namespace App\Domain\Employee\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\After;
use Spatie\LaravelData\Data;

final class UpdateEmployeeLeavePolicyAssignmentData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public CarbonImmutable $start_date,

        #[After('start_date')]
        public CarbonImmutable $end_date,
    ) {
        //
    }

}
