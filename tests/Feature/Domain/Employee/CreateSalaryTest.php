<?php

declare(strict_types=1);

use App\Domain\Employee\Actions\CreateSalaryAction;
use App\Domain\Employee\Data\SalaryData;
use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\Salary;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\ValidationException;

use function Pest\Laravel\assertDatabaseHas;

it('creates an employee salary', function (): void {
    $employee = Employee::factory()->create();

    $data = new SalaryData(
        employee: $employee,
        basic: 5000,
        effective_from: Date::parse('2026-01-01'),
    );

    $salary = resolve(CreateSalaryAction::class)->handle($data);

    expect($salary)
        ->toBeInstanceOf(Salary::class);

    assertDatabaseHas('employee_salaries', [
        'employee_id' => $employee->id,
        'basic' => $data->basic,
        'effective_from' => '2026-01-01',
        'effective_to' => null,
    ]);
});

it('closes the current salary when creating a new salary', function (): void {
    $employee = Employee::factory()->create();

    Salary::factory()->create([
        'employee_id' => $employee->id,
        'basic' => 5000,
        'effective_from' => '2025-01-01',
        'effective_to' => null,
    ]);

    $data = new SalaryData(
        employee: $employee,
        basic: 6000,
        effective_from: Date::parse('2026-01-01'),
    );

    resolve(CreateSalaryAction::class)->handle($data);

    assertDatabaseHas('employee_salaries', [
        'employee_id' => $employee->id,
        'basic' => 5000,
        'effective_from' => '2025-01-01',
        'effective_to' => '2025-12-31',
    ]);

    assertDatabaseHas('employee_salaries', [
        'employee_id' => $employee->id,
        'basic' => 6000,
        'effective_from' => '2026-01-01',
        'effective_to' => null,
    ]);

    expect($employee->salaries()->count())
        ->toBe(2);
});

it('ensures no overlapping salaties', function (): void {
    $employee = Employee::factory()->create();

    Salary::factory()->create([
        'employee_id' => $employee->id,
        'basic' => 5000,
        'effective_from' => '2025-01-01',
        'effective_to' => '2025-12-31',
    ]);

    Salary::factory()->create([
        'employee_id' => $employee->id,
        'basic' => 5000,
        'effective_from' => '2026-01-01',
        'effective_to' => null,
    ]);

    $data = new SalaryData(
        employee: $employee,
        basic: 6000,
        effective_from: Date::parse('2025-07-01'),
    );

    resolve(CreateSalaryAction::class)->handle($data);

})->throws(ValidationException::class);

it('fails to create employee if :dataset', function (array $overrides, array $fields): void {

    $payload = Salary::factory()->raw($overrides);

    expectValidationError(function () use ($payload): void {
        resolve(CreateSalaryAction::class)->handle(
            SalaryData::from($payload)
        );
    }, $fields);
})
    ->with('invalid');

dataset('invalid', [
    ...invalid('employee')
        ->required()
        ->build(),

    ...invalid('basic')
        ->required()
        ->notInteger()
        ->build(),
]);
