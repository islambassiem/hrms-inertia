<?php

declare(strict_types=1);

namespace App\Domain\Shared\Data;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class CreateReferenceValueData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public TranslatedNameData $name,

        #[Max(50), Min(1)]
        public string $code,

        #[Exists('shared_reference_types', 'id')]
        public int $reference_type_id,

        public ?int $sort_order = 0,
    ) {
        //
    }
}
