<?php

declare(strict_types=1);

namespace App\Domain\Organization\Data;

use App\Domain\Organization\Enums\AttributeType;
use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Data;

final class CreateAttributeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public TranslatedNameData $name,

        public ?string $code,

        public AttributeType $type
    ) {
        //
    }
}
