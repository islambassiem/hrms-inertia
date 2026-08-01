<?php

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\BankData;
use App\Domain\Employee\Models\EmployeeBank;

class CreateEmployeeBankAction
{
    public function handle(BankData $data): EmployeeBank
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return EmployeeBank::query()->create($attributes);
    }
}
