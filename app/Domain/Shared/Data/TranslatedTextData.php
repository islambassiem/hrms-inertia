<?php

declare(strict_types=1);

namespace App\Domain\Shared\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class TranslatedTextData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        #[Max(255), Min(5)]
        public string $ar,

        #[Max(255), Min(5)]
        public string $en,
    ) {
        //
    }
}
