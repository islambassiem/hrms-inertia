<?php

declare(strict_types=1);

use App\Domain\Shared\Actions\CreateReferenceValueAction;
use App\Domain\Shared\Actions\UpdateReferenceValueAction;
use App\Domain\Shared\Data\CreateReferenceValueData;
use App\Domain\Shared\Data\UpdateReferenceValueData;
use App\Domain\Shared\Models\ReferenceValue;

use function Pest\Laravel\assertDatabaseHas;

it('creates a reference value', function (): void {
    $payload = ReferenceValue::factory()->raw();

    $created = resolve(CreateReferenceValueAction::class)->handle(
        CreateReferenceValueData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(ReferenceValue::class);
    expect($created->exists)->toBeTrue();

    assertDatabaseHas('shared_reference_values', [
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'code' => $payload['code'],
        'reference_type_id' => $payload['reference_type_id'],
    ]);
});

it('updates a reference value', function (): void {
    $payload = ReferenceValue::factory()->raw();

    $updated = resolve(UpdateReferenceValueAction::class)->handle(
        UpdateReferenceValueData::validateAndCreate($payload),
        ReferenceValue::factory()->create()
    );

    expect($updated)->toBeInstanceOf(ReferenceValue::class);
    expect($updated->exists)->toBeTrue();

    assertDatabaseHas('shared_reference_values', [
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'code' => $payload['code'],
        'reference_type_id' => $payload['reference_type_id'],
    ]);
});

it('fails to create reference value if :dataset', function (array $overrides, array $fields): void {
    $payload = ReferenceValue::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateReferenceValueAction::class)->handle(
        CreateReferenceValueData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update reference value if :dataset', function (array $overrides, array $fields): void {
    $payload = ReferenceValue::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateReferenceValueAction::class)->handle(
        UpdateReferenceValueData::validateAndCreate($payload),
        ReferenceValue::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('name')
        ->required()
        ->invalidName()
        ->build(),

    ...invalid('code')
        ->required()
        ->tooLong(50)
        ->tooShort(1)
        ->build(),

    ...invalid('reference_type_id')
        ->required()
        ->invalidForeignKey()
        ->build(),
]);

dataset('update', [
    ...invalid('name')
        ->invalidName()
        ->build(),

    ...invalid('code')
        ->tooLong(50)
        ->build(),

    ...invalid('reference_type_id')->invalidForeignKey()
        ->build(),
]);
