<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class DateRangeData extends Data
{
    public function __construct(
        public ?string $from = null,
        public ?string $to = null,
    ) {}
}
