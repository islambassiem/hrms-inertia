<?php

declare(strict_types=1);

use App\Domain\Employee\Actions\CreateEmployeeAction;
use App\Domain\Employee\Actions\UpdateEmployeeAction;
use App\Domain\Employee\Data\CreateEmployeeData;
use App\Domain\Employee\Data\UpdateEmployeeData;
use App\Domain\Employee\Models\Category;
use App\Domain\Employee\Models\Employee;
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
    assertDatabaseHas('employees', [
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
    $payload = Employee::factory()->raw([
        'head_id' => 1,
        'first_name_ar' => 'اسلام',
        'middle_name_ar' => 'بسيم',
        'third_name_ar' => 'عبد الفتاح',
        'last_name_ar' => 'عبدالله',
        'category_id' => Category::factory(),
        'department_id' => Department::factory(),
        'image' => UploadedFile::fake()->image('avatar.jpg'),
        'leaving_date' => fake()->date(),
        'is_active' => false,
    ]);

    $updated = resolve(UpdateEmployeeAction::class)->handle(
        UpdateEmployeeData::validateAndCreate($payload),
        Employee::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Employee::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('employees', [
        'head_id' => $payload['head_id'],
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
    ->with('create');

it('fails to update employee if :dataset', function (array $overrides, array $fields): void {
    $payload = Employee::factory()->raw($overrides);

    expectValidationError(function () use ($payload): void {
        resolve(UpdateEmployeeAction::class)->handle(
            UpdateEmployeeData::from($payload),
            Employee::factory()->create([
                'first_name_ar' => 'اسلام',
                'middle_name_ar' => 'بسيم',
                'third_name_ar' => 'عبد الفتاح',
                'last_name_ar' => 'عبدالله',
            ])
        );
    }, $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('user_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('employee_code')
        ->required()
        ->regex('500322a')
        ->build(),

    ...invalid('first_name_ar')
        ->required()
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('first_name_en')
        ->required()
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('last_name_ar')
        ->required()
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('last_name_en')
        ->required()
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('gender_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('department_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('category_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('nationality_id')
        ->required()
        ->invalidForeignKey()
        ->build(),
]);

dataset('update', [
    ...invalid('first_name_ar')
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('first_name_en')
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('last_name_ar')
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('last_name_en')
        ->tooShort(2)
        ->tooLong()
        ->build(),

    ...invalid('gender_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('department_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('category_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('nationality_id')
        ->invalidForeignKey()
        ->build(),
]);
