<?php

declare(strict_types=1);

use App\Domain\Address\Actions\CreateAddressAction;
use App\Domain\Address\Actions\UpdateAddressAction;
use App\Domain\Address\Data\CreateAddressData;
use App\Domain\Address\Data\UpdateAddressData;
use App\Domain\Address\Models\Address;

use function Pest\Laravel\assertDatabaseHas;

it('creates an address', function (): void {
    $raw = Address::factory()->make();
    $created = resolve(CreateAddressAction::class)->handle(
        CreateAddressData::validateAndCreate($raw)
    );

    expect($created)->toBeInstanceOf(Address::class);
    assertDatabaseHas($created->getTable(), $created->getAttributes());
    foreach ($created->toArray() as $attribute) {
        expect($created->{$attribute})->toBe($raw->{$attribute});
    }
});

it('updates an address', function (): void {
    $address = Address::factory()->create();
    $raw = Address::factory()->make();
    $updated = resolve(UpdateAddressAction::class)->handle(
        UpdateAddressData::validateAndCreate($raw), $address
    );

    expect($updated)->toBeInstanceOf(Address::class);
    assertDatabaseHas($updated->getTable(), $updated->getAttributes());
    foreach ($updated->toArray() as $attribute) {
        expect($updated->{$attribute})->toBe($raw->{$attribute});
    }
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {
    $address = Address::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateAddressAction::class)->handle(
        CreateAddressData::validateAndCreate($address)
    ), $fields);
})
    ->with('create');

it('fails to update if :dataset', function (array $overrides, array $fields): void {
    $address = Address::factory()->raw($overrides);
    $existing = Address::factory()->create();

    expectValidationError(fn () => resolve(UpdateAddressAction::class)->handle(
        UpdateAddressData::validateAndCreate($address),
        $existing
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalidEmployee(),
    ...invalidShortAddress(),
]);

dataset('update', [
    ...invalidAddress(),
]);

function invalidEmployee(): array
{
    return [
        'employee_id is null' => [
            ['employee_id' => null],
            ['employee_id'],
        ],

        'employee_id is invalid' => [
            ['employee_id' => 99999],
            ['employee_id'],
        ],
    ];
}

function invalidShortAddress(): array
{
    return [
        'short_address is null' => [
            ['short_address' => null],
            ['short_address'],
        ],

        'short_address is invalid' => [
            ['short_address' => 'invalid'],
            ['short_address'],
        ],
    ];
}

function invalidAddress(): array
{
    return [

        'building_number is invalid' => [
            ['building_number' => 12345],
            ['building_number'],
        ],

        'street is too long' => [
            ['street' => str_repeat('a', 51)],
            ['street'],
        ],

        'secondary_number is invalid' => [
            ['secondary_number' => 'invalid'],
            ['secondary_number'],
        ],

        'district is too long' => [
            ['district' => str_repeat('a', 51)],
            ['district'],
        ],

        'postal_code is invalid' => [
            ['postal_code' => 12345],
            ['postal_code'],
        ],

        'city is too long' => [
            ['city' => str_repeat('a', 51)],
            ['city'],
        ],
    ];
}
