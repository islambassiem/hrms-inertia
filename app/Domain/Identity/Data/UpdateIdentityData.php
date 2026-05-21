<?php

declare(strict_types=1);

namespace App\Domain\Identity\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\Validation\After;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateIdentityData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists('employee_employees', 'id')]
        public int|null|Optional $employee_id,

        #[Exists('identity_identity_types', 'id')]
        public int|null|Optional $identity_type_id,

        #[Size(10)]
        public string|null|Optional $identity_number,

        public string|null|Optional $place_of_issue,

        public CarbonImmutable|null|Optional $issue_date,

        #[After('issue_date')]
        public CarbonImmutable|null|Optional $expiry_date,
    ) {
        //
    }
}
