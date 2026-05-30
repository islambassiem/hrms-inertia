<?php

declare(strict_types=1);

namespace App\Domain\Dependent\Data;

use App\Domain\Shared\Enums\ReferenceType;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\Before;
use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\GreaterThanOrEqualTo;
use Spatie\LaravelData\Attributes\Validation\LessThanOrEqualTo;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\RequiredWithout;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\Constraints\WhereConstraint;

final class CreateDependentData extends Data
{
    public function __construct(

        #[Exists('employees', 'id')]
        public int $employee_id,

        #[Max(150), Nullable, RequiredWithout('name_en')]
        public ?string $name_ar,

        #[Max(150), Nullable, RequiredWithout('name_ar')]
        public ?string $name_en,

        #[Digits(10)]
        public string $identification,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::SHARED_GENDER)
        )]
        public int $gender_id,

        #[Before('today')]
        public CarbonImmutable $date_of_birth,

        #[Exists(
            table: 'shared_reference_values',
            column: 'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::DEPENDENT_RELATIONSHIP)
        )]
        public int $relationship_id,

        public bool $has_insurance,

        #[LessThanOrEqualTo(100), GreaterThanOrEqualTo(0)]
        public int $ticket_ratio,
    ) {
        //
    }
}
