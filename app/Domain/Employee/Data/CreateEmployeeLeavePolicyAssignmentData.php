<?php

declare(strict_types=1);

namespace App\Domain\Employee\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;

final class CreateEmployeeLeavePolicyAssignmentData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employees', 'id')]
        public int $employee_id,

        #[Exists('leave_policies', 'id')]
        public int $policy_id,

        public CarbonImmutable $start_date,
    ) {
        //
    }
}
