<?php

declare(strict_types=1);

namespace App\Domain\Leave\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateSickLeaveRulesData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public TranslatedNameData|Optional $name,

        public int|Optional $no_of_days,

        public int|Optional $pay_rate,

        public CarbonImmutable|Optional $effective_from,
    ) {
        //
    }
}
