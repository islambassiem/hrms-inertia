<?php

declare(strict_types=1);

use App\Domain\Address\Actions\CreateAddressAction;
use App\Domain\Address\Actions\UpdateAddressAction;
use App\Domain\Address\Data\CreateAddressData;
use App\Domain\Address\Data\UpdateAddressData;
use App\Domain\Address\Models\Address;

use function Pest\Laravel\assertDatabaseHas;

it('creates an address', function (): void {
    $payload = Address::factory()->raw();
    $created = resolve(CreateAddressAction::class)->handle(
        CreateAddressData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Address::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('address_addresses', [
        'employee_id' => $payload['employee_id'],
        'short_address' => $payload['short_address'],
        'building_number' => $payload['building_number'],
        'street' => $payload['street'],
        'secondary_number' => $payload['secondary_number'],
        'district' => $payload['district'],
        'postal_code' => $payload['postal_code'],
        'city' => $payload['city'],
    ]);
});

it('updates an address', function (): void {
    $payload = Address::factory()->raw();
    $updated = resolve(UpdateAddressAction::class)->handle(
        UpdateAddressData::validateAndCreate($payload),
        Address::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Address::class);
    expect($updated->exists)->toBeTrue();

    assertDatabaseHas('address_addresses', [
        'employee_id' => $updated['employee_id'],
        'short_address' => $updated['short_address'],
        'building_number' => $updated['building_number'],
        'street' => $updated['street'],
        'secondary_number' => $updated['secondary_number'],
        'district' => $updated['district'],
        'postal_code' => $updated['postal_code'],
        'city' => $updated['city'],
    ]);
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {
    $payload = Address::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateAddressAction::class)->handle(
        CreateAddressData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update if :dataset', function (array $overrides, array $fields): void {
    $address = Address::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateAddressAction::class)->handle(
        UpdateAddressData::validateAndCreate($address),
        Address::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('short_address')
        ->required()
        ->regex('ABCD12345')
        ->build(),

    ...invalid('building_number')
        ->digits(4)
        ->build(),

    ...invalid('street')
        ->tooLong(50)
        ->build(),

    ...invalid('secondary_number')
        ->digits(4)
        ->build(),

    ...invalid('district')
        ->tooLong(50)
        ->build(),

    ...invalid('postal_code')
        ->digits(4)
        ->build(),

    ...invalid('city')
        ->tooLong(50)
        ->build(),
]);

dataset('update', [
    ...invalid('building_number')
        ->digits(4)
        ->build(),

    ...invalid('short_address')
        ->regex('ABCD12345')
        ->build(),

    ...invalid('street')
        ->tooLong(50)
        ->build(),

    ...invalid('secondary_number')
        ->digits(4)
        ->build(),

    ...invalid('district')
        ->tooLong(50)
        ->build(),

    ...invalid('postal_code')
        ->digits(4)
        ->build(),

    ...invalid('city')
        ->tooLong(50)
        ->build(),
]);
