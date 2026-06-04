<?php

declare(strict_types=1);

use App\Domain\Leave\Actions\CreateLeavePolicyAction;
use App\Domain\Leave\Actions\UpdateLeavePolicyAction;
use App\Domain\Leave\Data\CreateLeavePolicyData;
use App\Domain\Leave\Data\UpdateLeavePolicyData;
use App\Domain\Leave\Models\Policy;

use function Pest\Laravel\assertDatabaseHas;

it('creates a leave policy', function (): void {
    $payload = Policy::factory()->raw();

    $created = resolve(CreateLeavePolicyAction::class)->handle(
        CreateLeavePolicyData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Policy::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('leave_policies', [
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'leave_type_id' => $payload['leave_type_id'],
        'is_default' => $payload['is_default'],
        'days_per_year' => $payload['days_per_year'],
        'accrual_frequency' => $payload['accrual_frequency'],
        'max_carry_forward' => $payload['max_carry_forward'],
        'carry_forward_expiry_months' => $payload['carry_forward_expiry_months'],
    ]);
});

it('updates a leave policy', function (): void {
    $payload = Policy::factory()->raw([
        'is_default' => false,
    ]);

    $updated = resolve(UpdateLeavePolicyAction::class)->handle(
        UpdateLeavePolicyData::validateAndCreate($payload),
        Policy::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Policy::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('leave_policies', [
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'is_default' => $payload['is_default'],
    ]);
});

it('fails to create leave policy if :dataset', function (array $overrides, array $fields): void {
    $payload = Policy::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateLeavePolicyAction::class)->handle(
        CreateLeavePolicyData::validateAndCreate($payload)
    ), $fields);
})->with('create');

dataset('create', [

    ...invalid('leave_type_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('name')
        ->required()
        ->invalidName()
        ->build(),

    ...invalid('is_default')
        ->required()
        ->build(),

    ...invalid('days_per_year')
        ->required()
        ->notInteger()
        ->belowMin(1)
        ->aboveMax(60)
        ->build(),

    ...invalid('accrual_frequency')
        ->notInteger()
        ->belowMin(1)
        ->aboveMax(2)
        ->build(),

    ...invalid('max_carry_forward')
        ->notInteger()
        ->belowMin(1)
        ->aboveMax(30)
        ->build(),

    ...invalid('carry_forward_expiry_months')
        ->notInteger()
        ->belowMin(1)
        ->aboveMax(30)
        ->build(),

]);
