<?php

declare(strict_types=1);

namespace App\Domain\Leave\Actions;

use App\Domain\Leave\Enums\TransactionType;
use App\Domain\Leave\Models\LeaveTransaction;

final class RecordTransactionAction
{
    /**
     * Summary of handle
     */
    public function handle(
        int $employee_id,
        int $leave_type_id,
        ?int $leave_request_id,
        TransactionType $transaction_type,
        float $amount,
    ): void {
        LeaveTransaction::query()->create([
            'employee_id' => $employee_id,
            'leave_type_id' => $leave_type_id,
            'leave_request_id' => $leave_request_id ?? null,
            'transaction_type' => $transaction_type,
            'amount' => $amount,
        ]);
    }
}
