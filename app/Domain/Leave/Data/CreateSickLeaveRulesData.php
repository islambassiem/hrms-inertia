<?php

declare(strict_types=1);

namespace App\Domain\Leave\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

final class CreateSickLeaveRulesData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public TranslatedNameData $name,

        public int $no_of_days,

        public int $pay_rate,

        public CarbonImmutable $effective_from,
    ) {
        //
    }
}
