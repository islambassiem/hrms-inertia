<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Data;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class CreateSpecialtyData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Max(100), Min(5)]
        public string $name_en,

        #[Max(100), Min(5)]
        public string $name_ar,

        #[Exists('qualification_specialty_categories', 'id')]
        public int $category_id,

        #[Max(50), Min(2)]
        public string $code,
    ) {
        //
    }
}
