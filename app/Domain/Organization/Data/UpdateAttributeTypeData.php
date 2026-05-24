<?php

declare(strict_types=1);

namespace App\Domain\Organization\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateAttributeTypeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public TranslatedNameData|null|Optional $name,

        public int|string|null|Optional $code
    ) {
        //
    }
}
