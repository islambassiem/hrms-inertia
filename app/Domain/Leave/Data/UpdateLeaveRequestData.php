<?php

declare(strict_types=1);

namespace App\Domain\Leave\Data;

use App\Domain\Leave\Enums\LeaveStatus;
use App\Domain\Leave\Models\LeaveType;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\AfterOrEqual;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateLeaveRequestData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists(LeaveType::class, 'id')]
        public int|Optional $leave_type_id,

        public CarbonImmutable|Optional $start_date,

        #[AfterOrEqual('start_date')]
        public CarbonImmutable|Optional $end_date,

        public LeaveStatus|Optional $status,

        #[Max(255), Min(5)]
        public string|Optional $reason,
    ) {
        //
    }
}
