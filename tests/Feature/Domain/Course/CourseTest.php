<?php

declare(strict_types=1);

use App\Domain\Course\Actions\CreateCourseAction;
use App\Domain\Course\Actions\UpdateCourseAction;
use App\Domain\Course\Data\CreateCourseData;
use App\Domain\Course\Data\UpdateCourseData;
use App\Domain\Course\Models\Course;
use App\Domain\Course\Models\CourseType;
use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Country;

use function Pest\Laravel\assertDatabaseHas;

it('created a course', function (): void {
    $payload = Course::factory()->raw();

    $created = resolve(CreateCourseAction::class)->handle(
        CreateCourseData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Course::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('course_courses', [
        'employee_id' => $payload['employee_id'],
        'course_name' => $payload['course_name'],
        'course_type_id' => $payload['course_type_id'],
        'issuer' => $payload['issuer'],
        'awarding_year' => $payload['awarding_year'],
        'course_period' => $payload['course_period'],
        'city' => $payload['city'],
        'country_id' => $payload['country_id'],
    ]);
});

it('updated a course', function (): void {
    $payload = Course::factory()->raw();

    $updated = resolve(UpdateCourseAction::class)->handle(
        UpdateCourseData::validateAndCreate($payload),
        Course::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Course::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('course_courses', [
        'course_name' => $payload['course_name'],
        'course_type_id' => $payload['course_type_id'],
        'issuer' => $payload['issuer'],
        'awarding_year' => $payload['awarding_year'],
        'course_period' => $payload['course_period'],
        'city' => $payload['city'],
        'country_id' => $payload['country_id'],
    ]);
});

it('fails to crate a course if :dataset', function (array $overrides, array $fields): void {
    $payload = Course::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateCourseAction::class)->handle(
        CreateCourseData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update a course if :dataset', function (array $overrides, array $fields): void {
    $payload = Course::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateCourseAction::class)->handle(
        UpdateCourseData::validateAndCreate($payload),
        Course::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('employee_id')
        ->required()
        ->foreignKey(Employee::class)
        ->build(),

    ...invalid('course_name')
        ->required()
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('course_type_id')
        ->required()
        ->foreignKey(CourseType::class)
        ->build(),

    ...invalid('issuer')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('awarding_year')
        ->digits(4)
        ->build(),

    ...invalid('course_period')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('city')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('country_id')
        ->foreignKey(Country::class)
        ->build(),
]);

dataset('update', [
    ...invalid('course_name')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('course_type_id')
        ->foreignKey(CourseType::class)
        ->build(),

    ...invalid('issuer')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('awarding_year')
        ->digits(4)
        ->build(),

    ...invalid('course_period')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('city')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid('country_id')
        ->foreignKey(Country::class)
        ->build(),
]);
