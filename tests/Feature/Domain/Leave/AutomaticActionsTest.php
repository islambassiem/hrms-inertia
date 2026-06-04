<?php

declare(strict_types=1);
use App\Domain\Employee\Models\Employee;
use App\Domain\Leave\Actions\RecordCompensationEntryAction;
use App\Domain\Leave\Actions\RecordTransactionAction;
use App\Domain\Leave\Actions\UpsertEmployeeBalanceAction;
use App\Domain\Leave\Models\Balance;
use App\Domain\Leave\Models\CompensationEntry;
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

it('records a leave compensation entry', function (): void {

    $payload = CompensationEntry::factory()->raw();

    resolve(RecordCompensationEntryAction::class)->handle(
        leave_request_id: $payload['leave_request_id'],
        days: $payload['days'],
        compensation_rate: $payload['compensation_rate'],
    );

    assertDatabaseHas('leave_compensation_entries', [
        'leave_request_id' => $payload['leave_request_id'],
        'days' => $payload['days'],
        'compensation_rate' => $payload['compensation_rate'],
    ]);

});

it('inserts an employee leave balance', function (): void {

    $payload = Balance::factory()->raw();

    resolve(UpsertEmployeeBalanceAction::class)->handle(
        employee_id: $payload['employee_id'],
        balance: $payload['balance'],
    );

    assertDatabaseHas('leave_balances', [
        'employee_id' => $payload['employee_id'],
        'balance' => $payload['balance'],
    ]);
});

it('updates an employee leave balance', function (): void {

    $employee = Employee::factory()->create();

    resolve(UpsertEmployeeBalanceAction::class)->handle(
        employee_id: $employee->id,
        balance: 10.5,
    );

    assertDatabaseHas('leave_balances', [
        'employee_id' => $employee->id,
        'balance' => 10.5,
    ]);
});
