<?php

declare(strict_types=1);

namespace App\Domain\Employee\Data;

use App\Domain\Employee\Models\AllowanceType;
use App\Domain\Employee\Models\Employee;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Data;

final class AllowanceData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public Employee $employee,

        #[IntegerType()]
        public int $amount,

        public AllowanceType $type,

        #[Date()]
        public Carbon $effective_from,

        #[Date()]
        public ?Carbon $effective_to = null,
    ) {
        //
    }
}
