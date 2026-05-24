<?php

declare(strict_types=1);

namespace App\Domain\Organization\Data;

use App\Domain\Organization\Enums\AttributeType;
use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateAttributeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public TranslatedNameData|null|Optional $name,

        public string|null|Optional $code,

        public AttributeType|null|Optional $type

    ) {
        //
    }
}
