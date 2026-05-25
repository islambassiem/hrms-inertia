<?php

declare(strict_types=1);

namespace App\Domain\Dependent\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\Before;
use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\GreaterThanOrEqualTo;
use Spatie\LaravelData\Attributes\Validation\LessThanOrEqualTo;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\RequiredWithoutAll;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateDependentData extends Data
{
    public function __construct(

        #[Max(150), Nullable, RequiredWithoutAll('name_en')]
        public string|null|Optional $name_ar,

        #[Max(150), Nullable, RequiredWithoutAll('name_ar')]
        public string|null|Optional $name_en,

        #[Digits(10)]
        public string|Optional $identification,

        #[Exists('shared_genders', 'id'), Nullable]
        public int|Optional $gender_id,

        #[Before('today')]
        public CarbonImmutable|Optional $date_of_birth,

        #[Exists('shared_relationships', 'id')]
        public int|null|Optional $relationship_id,

        public bool|Optional $has_insurance,

        #[LessThanOrEqualTo(100), GreaterThanOrEqualTo(0)]
        public int|Optional $ticket_ratio,
    ) {
        //
    }
}
