<?php

use App\Domain\Employee\Actions\CreateEmployeeBankAction;
use App\Domain\Employee\Actions\UpdateEmployeeBankAction;
use App\Domain\Employee\Data\BankData;
use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeBank;
use App\Domain\Shared\Models\Bank;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;


it('creates a bank account for an employee', function (): void {
    $employee = Employee::factory()->create();
    $bank = Bank::factory()->create();

    $data = new BankData(
        employee_id: $employee->id,
        bank_id: $bank->id,
        iban: 'SA1234567890123456789012',
    );

    resolve(CreateEmployeeBankAction::class)->handle($data);

    assertDatabaseHas('employee_banks', [
        'employee_id' => $employee->id,
        'bank_id' => $bank->id,
        'iban' => 'SA1234567890123456789012',
    ]);
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {

    $payload = EmployeeBank::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateEmployeeBankAction::class)->handle(
        BankData::validateAndCreate($payload)
    ), $fields);

})->with('invalid');

it('updates the employee bank account', function (): void{
    $bank = EmployeeBank::factory()->create([
        'employee_id' => Employee::factory()->create()->id,
        'bank_id' => Bank::factory()->create()->id,
        'iban' => 'SA1234567890123456789012',
    ]);

    resolve(UpdateEmployeeBankAction::class)->handle(
        new BankData(
            employee_id: $bank->employee_id,
            bank_id: $bank->bank_id,
            iban: 'SA9876543210987654321098',
        ),
        $bank
    );

    assertDatabaseMissing('employee_banks', [
        'employee_id' => $bank->employee_id,
        'bank_id' => $bank->bank_id,
        'iban' => 'SA1234567890123456789012',
    ]);

    assertDatabaseHas('employee_banks', [
        'employee_id' => $bank->employee_id,
        'bank_id' => $bank->bank_id,
        'iban' => 'SA9876543210987654321098',
    ]);
});

it('fails to update if :dataset', function (array $overrides, array $fields): void {
    $bank = EmployeeBank::factory()->create([
        'employee_id' => Employee::factory()->create()->id,
        'bank_id' => Bank::factory()->create()->id,
        'iban' => 'SA1234567890123456789012',
    ]);

    $payload = EmployeeBank::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateEmployeeBankAction::class)->handle(
        BankData::validateAndCreate($payload),
        $bank
    ), $fields);
})->with('invalid');


dataset('invalid', [
    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('bank_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('iban')
        ->required()
        ->tooShort(24)
        ->tooLong(24)
        ->invalidRegex(pattern: '/^SA\d{22}$/', value: 'SA1234567890123456789012 ')
        ->invalidRegex(pattern: '/^SA\d{22}$/', value: 'SA12345678901234567890121')
        ->invalidRegex(pattern: '/^SA\d{22}$/', value: 'sa12345678901234567890121')
        ->invalidRegex(pattern: '/^SA\d{22}$/', value: 'EG12345678901234567890121')
        ->build(),
]);

