<?php

declare(strict_types=1);

use App\Domain\Employee\Actions\CreateEmployeeAction;
use App\Domain\Employee\Data\CreateEmployeeData;
use App\Domain\Employee\Models\Employee;

it('can create an employee', function (): void {
    $employee = Employee::factory()->make([
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
    ]);

    $created = resolve(CreateEmployeeAction::class)->handle(
        CreateEmployeeData::validateAndCreate($employee)
    );

    expect($created)->toBeInstanceOf(Employee::class);
    foreach ($employee->toArray() as $attribute) {
        expect($created->{$attribute})->toBe($employee->{$attribute});
    }
});
