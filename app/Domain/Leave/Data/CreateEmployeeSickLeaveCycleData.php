<?php

declare(strict_types=1);

namespace App\Domain\Leave\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\BeforeOrEqual;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;

final class CreateEmployeeSickLeaveCycleData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employees', 'id')]
        public int $employee_id,

        #[BeforeOrEqual('today')]
        public CarbonImmutable $start_date,
    ) {
        //
    }
}
