<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Models\Balance;

final class UpsertEmployeeBalanceAction
{
    public function handle(
        int $employee_id,
        float $balance,
    ): void {
        Balance::query()->updateOrCreate(['employee_id' => $employee_id], ['balance' => $balance]);
    }
}
