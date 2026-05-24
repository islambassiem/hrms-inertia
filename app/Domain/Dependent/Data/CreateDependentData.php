<?php

declare(strict_types=1);

namespace App\Domain\Dependent\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\GreaterThanOrEqualTo;
use Spatie\LaravelData\Attributes\Validation\LessThanOrEqualTo;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\RequiredWithout;
use Spatie\LaravelData\Data;

final class CreateDependentData extends Data
{
    public function __construct(

        #[Exists('employee_employees', 'id')]
        public int $employee_id,

        #[Max(150), Nullable, RequiredWithout('name_en')]
        public ?string $name_ar,

        #[Max(150), Nullable, RequiredWithout('name_ar')]
        public ?string $name_en,

        #[Digits(10)]
        public string $identification,

        #[Exists('shared_genders', 'id')]
        public int $gender_id,

        public CarbonImmutable $date_of_birth,

        #[Exists('shared_relationships', 'id')]
        public int $relationship_id,

        public bool $has_insurance,

        #[LessThanOrEqualTo(100), GreaterThanOrEqualTo(0)]
        public int $ticket_ratio,
    ) {
        //
    }
}
