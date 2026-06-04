<?php

declare(strict_types=1);

namespace App\Domain\Leave\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use App\Domain\Shared\Enums\ReferenceType;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\Constraints\WhereConstraint;

final class CreateLeavePolicyData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists(
            'shared_reference_values',
            'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::LEAVE_TYPE)
        )]
        public int $leave_type_id,

        public TranslatedNameData $name,

        public bool $is_default,

        #[Max(60), Min(1)]
        public int $days_per_year,

        #[Max(2), Min(1), Nullable]
        public ?int $accrual_frequency,

        #[Max(30), Min(1), Nullable]
        public ?int $max_carry_forward,

        #[Max(30), Min(1), Nullable]
        public ?int $carry_forward_expiry_months,
    ) {
        //
    }
}
