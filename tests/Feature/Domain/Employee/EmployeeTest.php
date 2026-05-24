<?php

declare(strict_types=1);

use App\Domain\Employee\Actions\CreateEmployeeAction;
use App\Domain\Employee\Actions\UpdateEmployeeAction;
use App\Domain\Employee\Data\CreateEmployeeData;
use App\Domain\Employee\Data\UpdateEmployeeData;
use App\Domain\Employee\Models\Category;
use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\Sponsorship;
use App\Domain\Organization\Models\Department;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\assertDatabaseHas;

it('can create an employee', function (): void {
    $payload = Employee::factory()->raw([
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
    ]);

    $created = resolve(CreateEmployeeAction::class)->handle(
        CreateEmployeeData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Employee::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('employee_employees', [
        'user_id' => $payload['user_id'],
        'head_id' => $payload['head_id'],
        'employee_code' => $payload['employee_code'],
        'first_name_ar' => $payload['first_name_ar'],
        'middle_name_ar' => $payload['middle_name_ar'],
        'third_name_ar' => $payload['third_name_ar'],
        'last_name_ar' => $payload['last_name_ar'],
        'first_name_en' => $payload['first_name_en'],
        'middle_name_en' => $payload['middle_name_en'],
        'third_name_en' => $payload['third_name_en'],
        'last_name_en' => $payload['last_name_en'],
        'marital_status_id' => $payload['marital_status_id'],
        'religion_id' => $payload['religion_id'],
        'special_needs_id' => $payload['special_needs_id'],
        'gender_id' => $payload['gender_id'],
        'sponsorship_id' => $payload['sponsorship_id'],
        'category_id' => $payload['category_id'],
        'department_id' => $payload['department_id'],
        'nationality_id' => $payload['nationality_id'],
        'place_of_birth' => $payload['place_of_birth'],
        'email' => $payload['email'],
        'phone' => $payload['phone'],
        'image' => $payload['image'],
        'home_telephone_number' => $payload['home_telephone_number'],
        'home_country_identity' => $payload['home_country_identity'],
        'blood_type' => $payload['blood_type'],
        'is_active' => $payload['is_active'],
    ]);

    expect($created->date_of_birth->toDateString())->toBe($payload['date_of_birth']);
    expect($created->joining_date->toDateString())->toBe($payload['joining_date']);
    expect($created->leaving_date->toDateString())->toBe($payload['leaving_date']);
});

it('can update an employee', function (): void {
    $employee = Employee::factory()->create();
    $payload = Employee::factory()->raw([
        'head_id' => 1,
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
        'sponsorship_id' => Sponsorship::factory(),
        'category_id' => Category::factory(),
        'department_id' => Department::factory(),
        'image' => UploadedFile::fake()->image('avatar.jpg'),
        'leaving_date' => fake()->date(),
        'is_active' => false,
    ]);

    $updated = resolve(UpdateEmployeeAction::class)->handle(
        UpdateEmployeeData::validateAndCreate($payload),
        $employee
    );

    expect($updated)->toBeInstanceOf(Employee::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('employee_employees', [
        'head_id' => $payload['head_id'],
        'sponsorship_id' => $payload['sponsorship_id'],
        'category_id' => $payload['category_id'],
        'department_id' => $payload['department_id'],
        'image' => $payload['image'],
        'is_active' => $payload['is_active'],
    ]);
    expect($updated->leaving_date->toDateString())->toBe($payload['leaving_date']);

});

it('fails to create employee if :dataset', function (array $overrides, array $fields): void {
    $employee = Employee::factory()->raw($overrides);

    expectValidationError(function () use ($employee): void {
        resolve(CreateEmployeeAction::class)
            ->handle(CreateEmployeeData::from($employee));
    }, $fields);
})
    ->with('invalid employee data');

it('fails to update employee if :dataset', function (array $overrides, array $fields): void {
    $existing = Employee::factory()->create([
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
    ]);
    $employee = Employee::factory()->raw($overrides);

    expectValidationError(function () use ($employee, $existing): void {
        resolve(UpdateEmployeeAction::class)->handle(
            UpdateEmployeeData::from($employee),
            $existing
        );
    }, $fields);
})
    ->with('invalid employee data for update');

dataset('non updatable fields', nonUpdatablefields());
dataset('invalid employee data for update', invalidEmployeeDataForUpdate());
dataset('invalid employee data', [
    ...nonUpdatablefields(),
    ...invalidEmployeeDataForUpdate(),
]);
function nonUpdatablefields(): array
{
    return [
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
    ];
}

function invalidEmployeeDataForUpdate(): array
{
    return [

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
    ];
}
