<?php

declare(strict_types=1);

namespace App\Domain\Identity\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\After;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Data;

final class CreateIdentityData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employee_employees', 'id')]
        public int $employee_id,

        #[Exists('identity_identity_types', 'id')]
        public int $identity_type_id,

        #[Size(10)]
        public string $identity_number,

        public ?string $place_of_issue,

        public ?CarbonImmutable $issue_date,

        #[After('issue_date')]
        public CarbonImmutable $expiry_date,
    ) {
        //
    }
}
