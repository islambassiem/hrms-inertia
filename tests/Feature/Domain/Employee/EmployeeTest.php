<?php

declare(strict_types=1);

use App\Domain\Employee\Actions\CreateEmployeeAction;
use App\Domain\Employee\Actions\UpdateEmployeeAction;
use App\Domain\Employee\Data\CreateEmployeeData;
use App\Domain\Employee\Data\UpdateEmployeeData;
use App\Domain\Employee\Models\Employee;

it('can create an employee', function (): void {
    $employee = Employee::factory()->make([
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
    ]);

    $created = app(CreateEmployeeAction::class)->handle(
        CreateEmployeeData::validateAndCreate($employee)
    );

    expect($created)->toBeInstanceOf(Employee::class);
    foreach ($employee->toArray() as $attribute) {
        expect($created->{$attribute})->toBe($employee->{$attribute});
    }
});

it('can update an employee', function (): void {
    $employee = Employee::factory()->create();
    $newEmployee = Employee::factory()->raw([
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
    ]);

    $updated = app(UpdateEmployeeAction::class)->handle(
        UpdateEmployeeData::validateAndCreate($newEmployee),
        $employee
    );

    expect($updated)->toBeInstanceOf(Employee::class);
    foreach ($employee->toArray() as $attribute) {
        expect($updated->{$attribute})->toBe($employee->{$attribute});
    }

});

it('fails to create employee if :dataset', function (array $overrides, array $fields): void {
    $employee = Employee::factory()->raw($overrides);

    expectValidationError(function () use ($employee) {
        app(CreateEmployeeAction::class)
            ->handle(CreateEmployeeData::from($employee));
    }, $fields);
})
    ->with('invalid-employee-data')
    ->with('non-updatable-fields');

it('fails to update employee if :dataset', function (array $overrides, array $fields): void {
    $existing = Employee::factory()->create([
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
    ]);
    $employee = Employee::factory()->raw($overrides);

    expectValidationError(function () use ($employee, $existing) {
        app(UpdateEmployeeAction::class)->handle(
            UpdateEmployeeData::from($employee),
            $existing
        );
    }, $fields);
})
    ->with('invalid-employee-data');

dataset('non-updatable-fields', [
    'user_id is null' => [
        ['user_id' => null],
        ['user_id'],
    ],

    'employee_code is null' => [
        ['employee_code' => null],
        ['employee_code'],
    ],

    'first_name_ar is null' => [
        ['first_name_ar' => null],
        ['first_name_ar'],
    ],

    'first_name_en is null' => [
        ['first_name_en' => null],
        ['first_name_en'],
    ],

    'first_name_en is invalid' => [
        ['first_name_en' => 'namÉ'],
        ['first_name_en'],
    ],

    'last_name_ar is null' => [
        ['last_name_ar' => null],
        ['last_name_ar'],
    ],

    'last_name_en is invalid' => [
        ['last_name_en' => 'namÉ'],
        ['last_name_en'],
    ],

    'gender_id is null' => [
        ['gender_id' => null],
        ['gender_id'],
    ],

    'sponsorship_id is null' => [
        ['sponsorship_id' => null],
        ['sponsorship_id'],
    ],

    'department_id is null' => [
        ['department_id' => null],
        ['department_id'],
    ],

    'last_name_en is null' => [
        ['last_name_en' => null],
        ['last_name_en'],
    ],

    'category_id is null' => [
        ['category_id' => null],
        ['category_id'],
    ],

    'nationality_id is null' => [
        ['nationality_id' => null],
        ['nationality_id'],
    ],

]);

dataset('invalid-employee-data', [

    'first_name_ar is short' => [
        ['first_name_ar' => 'a'],
        ['first_name_ar'],
    ],

    'first_name_ar is long' => [
        ['first_name_ar' => str_repeat('a', 31)],
        ['first_name_ar'],
    ],

    'first_name_ar is invalid' => [
        ['first_name_ar' => 'name not in arabic'],
        ['first_name_ar'],
    ],

    'first_name_en is short' => [
        ['first_name_en' => 'a'],
        ['first_name_en'],
    ],

    'first_name_en is long' => [
        ['first_name_en' => str_repeat('a', 31)],
        ['first_name_en'],
    ],

    'last_name_ar is short' => [
        ['last_name_ar' => 'a'],
        ['last_name_ar'],
    ],

    'last_name_ar is long' => [
        ['last_name_ar' => str_repeat('a', 31)],
        ['last_name_ar'],
    ],

    'last_name_ar is invalid' => [
        ['last_name_ar' => 'name not in arabic'],
        ['last_name_ar'],
    ],

    'last_name_en is short' => [
        ['last_name_en' => 'a'],
        ['last_name_en'],
    ],

    'last_name_en is long' => [
        ['last_name_en' => str_repeat('a', 31)],
        ['last_name_en'],
    ],

    'gender_id is string' => [
        ['gender_id' => 'm'],
        ['gender_id'],
    ],

    'department_id is string' => [
        ['department_id' => 'cls'],
        ['department_id'],
    ],

    'department_id is invalid' => [
        ['department_id' => 999999],
        ['department_id'],
    ],

    'sponsorship_id is string' => [
        ['sponsorship_id' => 'csm'],
        ['sponsorship_id'],
    ],

    'category_id is string' => [
        ['category_id' => 'category'],
        ['category_id'],
    ],

    'category_id is invalid' => [
        ['category_id' => 9999999],
        ['category_id'],
    ],

    'nationality_id is string' => [
        ['nationality_id' => 'sau'],
        ['nationality_id'],
    ],
]);
