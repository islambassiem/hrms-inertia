<?php

declare(strict_types=1);

namespace App\Domain\Shared\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class TranslatedNameData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        #[Max(30), Min(2)]
        public string $ar,

        #[Max(30), Min(2)]
        public string $en,
    ) {
        //
    }
}
