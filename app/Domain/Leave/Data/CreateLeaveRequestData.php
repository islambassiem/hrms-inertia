<?php

declare(strict_types=1);

namespace App\Domain\Leave\Data;

use App\Domain\Leave\Models\LeaveType;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\AfterOrEqual;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

final class CreateLeaveRequestData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employees', 'id')]
        public int $employee_id,

        #[Exists(LeaveType::class, 'id')]
        public int $leave_type_id,

        public CarbonImmutable $start_date,

        #[AfterOrEqual('start_date')]
        public CarbonImmutable $end_date,

        #[Max(255), Min(5), Nullable]
        public ?string $reason,
    ) {
        //
    }
}
