<?php

declare(strict_types=1);

namespace App\Domain\Achievement\Data;

use Spatie\LaravelData\Attributes\Validation\Digits;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class CreateAchievementData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employees', 'id')]
        public int $employee_id,

        #[Min(5), Max(255)]
        public string $achievement_title,

        #[Digits(4)]
        public int $achievement_year,
    ) {
        //
    }
}
