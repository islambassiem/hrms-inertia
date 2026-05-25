<?php

declare(strict_types=1);

use App\Domain\Achievement\Actions\CreateAchievementAction;
use App\Domain\Achievement\Actions\UpdateAchievementAction;
use App\Domain\Achievement\Data\CreateAchievementData;
use App\Domain\Achievement\Data\UpdateAchievementData;
use App\Domain\Achievement\Models\Achievement;
use App\Domain\Employee\Models\Employee;

use function Pest\Laravel\assertDatabaseHas;

it('creates an achievement', function (): void {
    $payload = Achievement::factory()->raw();

    $created = app()->make(CreateAchievementAction::class)->handle(
        CreateAchievementData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Achievement::class);
    expect($created->exists)->toBeTrue();

    assertDatabaseHas('achievement_achievements', [
        'employee_id' => $payload['employee_id'],
        'achievement_title' => $payload['achievement_title'],
        'achievement_year' => $payload['achievement_year'],
    ]);
});

it('updates an achievement', function (): void {
    $payload = Achievement::factory()->raw();

    $updated = resolve(UpdateAchievementAction::class)->handle(
        UpdateAchievementData::validateAndCreate($payload),
        Achievement::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Achievement::class);
    expect($updated->exists)->toBeTrue();

    assertDatabaseHas('achievement_achievements', [
        'achievement_title' => $payload['achievement_title'],
        'achievement_year' => $payload['achievement_year'],
    ]);
});

it('fails to create an achievement if :dataset', function (array $overrides, array $fields): void {
    $payload = Achievement::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateAchievementAction::class)->handle(
        CreateAchievementData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update an achievement if :dataset', function (array $overrides, array $fields): void {
    $payload = Achievement::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateAchievementAction::class)->handle(
        UpdateAchievementData::validateAndCreate($payload),
        Achievement::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('employee_id')->required()->foreignKey(Employee::class)->build(),
    ...invalid('achievement_title')->required()->tooShort(5)->tooLong(255)->build(),
    ...invalid('achievement_year')->required()->digits(4)->build(),
]);

dataset('update', [
    ...invalid('achievement_title')->tooShort(5)->tooLong(255)->build(),
    ...invalid('achievement_year')->digits(4)->build(),
]);
