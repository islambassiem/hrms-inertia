<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
use App\Domain\Experience\Actions\CreateExperienceAction;
use App\Domain\Experience\Actions\UpdateExperienceAction;
use App\Domain\Experience\Data\CreateExperienceData;
use App\Domain\Experience\Data\UpdateExperienceData;
use App\Domain\Experience\Models\Experience;
use App\Domain\Shared\Models\Country;

use function Pest\Laravel\assertDatabaseHas;

it('creates an experience', function (): void {
    $payload = Experience::factory()->raw([
        'start_date' => '2020-01-01',
        'end_date' => '2024-12-31',
    ]);
    $created = resolve(CreateExperienceAction::class)->handle(
        CreateExperienceData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Experience::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('experience_experiences', [
        'employee_id' => $payload['employee_id'],
        'position' => $payload['position'],
        'organization' => $payload['organization'],
        'country_id' => $payload['country_id'],
    ]);

    expect($created->start_date->toDateString())->toBe($payload['start_date']);
    expect($created->end_date->toDateString())->toBe($payload['end_date']);
});

it('updates an experience', function (): void {
    $payload = Experience::factory()->raw([
        'start_date' => '2020-01-01',
        'end_date' => '2024-12-31',
    ]);
    $experience = Experience::factory()->create();
    $updated = resolve(UpdateExperienceAction::class)->handle(
        UpdateExperienceData::validateAndCreate($payload),
        $experience
    );

    expect($updated)->toBeInstanceOf(Experience::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('experience_experiences', [
        'position' => $payload['position'],
        'organization' => $payload['organization'],
        'country_id' => $payload['country_id'],
    ]);

    expect($updated->start_date->toDateString())->toBe($payload['start_date']);
    expect($updated->end_date->toDateString())->toBe($payload['end_date']);
});

it('fails to create experience if :dataset', function (array $overrides, array $fields): void {
    $payload = Experience::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateExperienceAction::class)->handle(
        CreateExperienceData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update experience if :dataset', function (array $overrides, array $fields): void {
    $payload = Experience::factory()->raw($overrides);
    $experience = Experience::factory()->create();

    expectValidationError(fn () => resolve(UpdateExperienceAction::class)->handle(
        UpdateExperienceData::validateAndCreate($payload),
        $experience
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('employee_id')->required()->foreignKey(Employee::class)->build(),
    ...invalid('position')->required()->tooShort()->tooLong()->build(),
    ...invalid('organization')->required()->tooShort()->tooLong()->build(),
    ...invalid('city')->tooShort()->tooLong()->build(),
    ...invalid('country_id')->foreignKey(Country::class)->build(),
    ...invalid('department')->tooShort()->tooLong()->build(),
    ...invalid('section')->tooShort()->tooLong()->build(),
    ...invalid('start_date')->required()->future()->build(),
    ...invalid('end_date')->required()->build(),
    ...invalid()->invalidDateOrder('start_date', 'end_date')->build(),
]);

dataset('update', [
    ...invalid('position')->tooShort()->tooLong()->build(),
    ...invalid('organization')->tooShort()->tooLong()->build(),
    ...invalid('city')->tooShort()->tooLong()->build(),
    ...invalid('country_id')->foreignKey(Country::class)->build(),
    ...invalid('department')->tooShort()->tooLong()->build(),
    ...invalid('section')->tooShort()->tooLong()->build(),
    ...invalid('start_date')->future()->build(),
    ...invalid()->invalidDateOrder('start_date', 'end_date')->build(),
]);
