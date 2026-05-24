<?php

declare(strict_types=1);

namespace App\Domain\Organization\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

final class CreateAttributeTypeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public TranslatedNameData $name,

        #[Max(30), Nullable]
        public ?string $code
    ) {
        //
    }
}
