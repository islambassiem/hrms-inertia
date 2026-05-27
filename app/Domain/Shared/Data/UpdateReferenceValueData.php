<?php

declare(strict_types=1);

namespace App\Domain\Shared\Data;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateReferenceValueData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        #[Max(50), Min(2), Nullable]
        public string|null|Optional $name_en,

        #[Max(50), Min(2), Nullable]
        public string|null|Optional $name_ar,

        #[Max(50), Min(1), Nullable]
        public string|null|Optional $code,

        #[Exists('shared_reference_types', 'id'), Nullable]
        public int|null|Optional $reference_type_id,

        #[Nullable]
        public int|null|Optional $sort_order = 0,
    ) {
        //
    }
}
