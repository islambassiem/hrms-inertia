<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class CreateIncludedSpecialtyData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Max(100), Min(2)]
        public string $name_en,

        #[Max(100), Min(2)]
        public string $name_ar,

        #[Max(50), Min(2)]
        public string $code,
    ) {
        //
    }
}
