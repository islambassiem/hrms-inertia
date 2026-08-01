<?php

namespace App\Domain\Employee\Actions;

use App\Domain\Employee\Data\BankData;
use App\Domain\Employee\Models\EmployeeBank;

class UpdateEmployeeBankAction
{
    public function handle(BankData $data, EmployeeBank $employeeBank): EmployeeBank
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $employeeBank->update($attributes);

        return $employeeBank;
    }
}
