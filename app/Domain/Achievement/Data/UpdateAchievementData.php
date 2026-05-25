<?php

declare(strict_types=1);

namespace App\Domain\Achievement\Data;

use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateAchievementData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        #[Min(5), Max(255)]
        public string|Optional $achievement_title,

        #[Digits(4)]
        public int|Optional $achievement_year,
    ) {
        //
    }
}
