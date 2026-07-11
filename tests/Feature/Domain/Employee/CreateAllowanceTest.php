<?php

declare(strict_types=1);

use App\Domain\Employee\Actions\CreateAllowanceAction;
use App\Domain\Employee\Data\AllowanceData;
use App\Domain\Employee\Models\Allowance;
use App\Domain\Employee\Models\AllowanceType;
use App\Domain\Employee\Models\Employee;
use Illuminate\Support\Facades\Date;

use function Pest\Laravel\assertDatabaseHas;

it('creates an employee allowance', function (): void {
    $employee = Employee::factory()->create();
    $type = AllowanceType::factory()->create();

    $data = new AllowanceData(
        employee: $employee,
        amount: 5000,
        type: $type,
        effective_from: Date::parse('2026-01-01'),
    );

    $allowance = resolve(CreateAllowanceAction::class)->handle($data);

    expect($allowance)
        ->toBeInstanceOf(Allowance::class);

    assertDatabaseHas('employee_allowances', [
        'employee_id' => $employee->id,
        'amount' => $data->amount,
        'allowance_type_id' => $type->id,
        'effective_from' => '2026-01-01',
        'effective_to' => null,
    ]);
});

it('closes the current salary when creating a new salary', function (): void {
    $employee = Employee::factory()->create();
    $type = AllowanceType::factory()->create();

    Allowance::factory()->create([
        'employee_id' => $employee->id,
        'allowance_type_id' => $type->id,
        'amount' => 5000,
        'effective_from' => '2025-01-01',
        'effective_to' => null,
    ]);

    $data = new AllowanceData(
        employee: $employee,
        amount: 6000,
        type: $type,
        effective_from: Date::parse('2026-01-01'),
    );

    resolve(CreateAllowanceAction::class)->handle($data);

    assertDatabaseHas('employee_allowances', [
        'employee_id' => $employee->id,
        'amount' => 5000,
        'allowance_type_id' => $type->id,
        'effective_from' => '2025-01-01',
        'effective_to' => '2025-12-31',
    ]);

    assertDatabaseHas('employee_allowances', [
        'employee_id' => $employee->id,
        'amount' => 5000,
        'allowance_type_id' => $type->id,
        'effective_from' => '2025-01-01',
        'effective_to' => '2025-12-31',
    ]);

    assertDatabaseHas('employee_allowances', [
        'employee_id' => $employee->id,
        'amount' => 6000,
        'allowance_type_id' => $type->id,
        'effective_from' => '2026-01-01',
        'effective_to' => null,
    ]);

    expect($employee->allowances()->count())
        ->toBe(2);
});

it('fails to create employee if :dataset', function (array $overrides, array $fields): void {

    $payload = Allowance::factory()->raw($overrides);

    expectValidationError(function () use ($payload): void {
        resolve(CreateAllowanceAction::class)->handle(
            AllowanceData::from($payload)
        );
    }, $fields);
})
    ->with('invalid');

dataset('invalid', [
    ...invalid('employee')
        ->required()
        ->build(),

    ...invalid('amount')
        ->required()
        ->notInteger()
        ->build(),

    ...invalid('type')
        ->required()
        ->build(),
]);
