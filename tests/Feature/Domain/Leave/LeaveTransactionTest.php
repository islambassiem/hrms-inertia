<?php

declare(strict_types=1);
use App\Domain\Leave\Actions\RecordTransactionAction;
use App\Domain\Leave\Models\LeaveTransaction;

use function Pest\Laravel\assertDatabaseHas;

it('records a leave transaction', function (): void {

    $payload = LeaveTransaction::factory()->raw();

    resolve(RecordTransactionAction::class)->handle(
        employee_id: $payload['employee_id'],
        leave_type_id: $payload['leave_type_id'],
        leave_request_id: $payload['leave_request_id'],
        transaction_type: $payload['transaction_type'],
        amount: $payload['amount'],
    );

    assertDatabaseHas('leave_transactions', [
        'employee_id' => $payload['employee_id'],
        'leave_type_id' => $payload['leave_type_id'],
        'leave_request_id' => $payload['leave_request_id'],
        'transaction_type' => $payload['transaction_type'],
        'amount' => $payload['amount'],
    ]);

});
