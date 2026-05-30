<?php

declare(strict_types=1);

namespace App\Domain\Organization\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateAttributeData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public TranslatedNameData|null|Optional $name,

        #[Max(30)]
        public string|null|Optional $code,

        #[Exists('organization_attribute_types', 'id'), Nullable]
        public int|null|Optional $type_id

    ) {
        //
    }
}
