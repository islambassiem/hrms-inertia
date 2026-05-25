<?php

declare(strict_types=1);

use App\Domain\Organization\Actions\CreateAttributeTypeAction;
use App\Domain\Organization\Actions\UpdateAttributeTypeAction;
use App\Domain\Organization\Data\CreateAttributeTypeData;
use App\Domain\Organization\Data\UpdateAttributeTypeData;
use App\Domain\Organization\Models\AttributeType;

use function Pest\Laravel\assertDatabaseHas;

it('creates an attribute type', function (): void {
    $payload = AttributeType::factory()->raw();
    $created = resolve(CreateAttributeTypeAction::class)->handle(
        CreateAttributeTypeData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(AttributeType::class);
    expect($created->exists)->toBeTrue();

    assertDatabaseHas('organization_attribute_types', [
        'name' => json_encode($payload['name']),
        'code' => $payload['code'],
    ]);
});

it('updates an attribute type', function (): void {
    $payload = AttributeType::factory()->raw();
    $updated = resolve(UpdateAttributeTypeAction::class)->handle(
        UpdateAttributeTypeData::validateAndCreate($payload),
        AttributeType::factory()->create()
    );

    expect($updated)->toBeInstanceOf(AttributeType::class);
    expect($updated->exists)->toBeTrue();

    assertDatabaseHas('organization_attribute_types', [
        'name' => json_encode($payload['name']),
        'code' => $payload['code'],
    ]);
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {
    $payload = AttributeType::factory()->raw($overrides);
    expectValidationError(fn () => resolve(CreateAttributeTypeAction::class)->handle(
        CreateAttributeTypeData::validateAndCreate($payload)
    ), $fields);
})
    ->with('invalid type');

it('fails to update if :dataset', function (array $overrides, array $fields): void {
    $payload = AttributeType::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateAttributeTypeAction::class)->handle(
        UpdateAttributeTypeData::validateAndCreate($payload),
        AttributeType::factory()->create()
    ), $fields);
})
    ->with('invalid type');

dataset('invalid type', [
    ...invalid()->invalidName()->build(),
    ...invalid('code')->tooLong(30)->build(),
]);
