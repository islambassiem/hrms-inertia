<?php

declare(strict_types=1);

use App\Domain\Leave\Actions\CreateSickLeaveRulesAction;
use App\Domain\Leave\Actions\UpdateSickLeaveRulesAction;
use App\Domain\Leave\Data\CreateSickLeaveRulesData;
use App\Domain\Leave\Data\UpdateSickLeaveRulesData;
use App\Domain\Leave\Models\SickLeaveRule;

use function Pest\Laravel\assertDatabaseHas;

it('can create sick leave rules', function (): void {
    $payload = SickLeaveRule::factory()->raw();

    $created = resolve(CreateSickLeaveRulesAction::class)->handle(
        CreateSickLeaveRulesData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(SickLeaveRule::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('leave_sick_leave_rules', [
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'pay_rate' => $payload['pay_rate'],
    ]);
    expect($created->effective_from->toDateString())->toBe($payload['effective_from']);
});

it('can update sick leave rules', function (): void {
    $payload = SickLeaveRule::factory()->raw();

    $updated = resolve(UpdateSickLeaveRulesAction::class)->handle(
        UpdateSickLeaveRulesData::validateAndCreate($payload),
        SickLeaveRule::factory()->create()
    );

    expect($updated)->toBeInstanceOf(SickLeaveRule::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('leave_sick_leave_rules', [
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'pay_rate' => $payload['pay_rate'],
    ]);
    expect($updated->effective_from->toDateString())->toBe($payload['effective_from']);
});

it('fail to create sick leave rules if :dataset', function (array $overrides, array $fields): void {
    $payload = SickLeaveRule::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateSickLeaveRulesAction::class)->handle(
        CreateSickLeaveRulesData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fail to update sick leave rules if :dataset', function (array $overrides, array $fields): void {
    $payload = SickLeaveRule::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateSickLeaveRulesAction::class)->handle(
        UpdateSickLeaveRulesData::validateAndCreate($payload),
        SickLeaveRule::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [

    ...invalid('name')
        ->required()
        ->invalidName()
        ->build(),

    ...invalid('no_of_days')
        ->required()
        ->build(),

    ...invalid('pay_rate')
        ->required()
        ->build(),

    ...invalid('effective_from')
        ->required()
        ->build(),
]);

dataset('update', [

    ...invalid('name')
        ->invalidName()
        ->build(),
]);
