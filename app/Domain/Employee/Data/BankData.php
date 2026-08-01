<?php

declare(strict_types=1);

namespace App\Domain\Employee\Data;

use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Bank;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Data;

class BankData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists(Employee::class, 'id')]
        public int $employee_id,

        #[Exists(Bank::class, 'id')]
        public int $bank_id,

        #[Regex('/^SA\d{22}$/')]
        public string $iban,
    )
    {
        //
    }
}
