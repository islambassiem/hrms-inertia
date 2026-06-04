<?php

declare(strict_types=1);

namespace App\Domain\Leave\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateLeavePolicyData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public TranslatedNameData|Optional $name,

        public bool|Optional $is_default,
    ) {
        //
    }
}
