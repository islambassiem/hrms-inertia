<?php

declare(strict_types=1);

use App\Domain\Identity\Actions\CreateIdentityAction;
use App\Domain\Identity\Actions\UpdateIdentityAction;
use App\Domain\Identity\Data\CreateIdentityData;
use App\Domain\Identity\Data\UpdateIdentityData;
use App\Domain\Identity\Models\Identity;

use function Pest\Laravel\assertDatabaseHas;

it('can create an identity', function (): void {
    $raw = Identity::factory()->make();

    $identity = (new CreateIdentityAction())
        ->handle(CreateIdentityData::validateAndCreate($raw));

    expect($identity)->toBeInstanceOf(Identity::class);
    assertDatabaseHas($identity->getTable(), [
        'employee_id' => $raw['employee_id'],
        'identity_type_id' => $raw['identity_type_id'],
        'identity_number' => $raw['identity_number'],
        'place_of_issue' => $raw['place_of_issue'],
        'issue_date' => $raw['issue_date'],
        'expiry_date' => $raw['expiry_date'],
    ]);
    foreach ($identity as $attribute) {
        expect($identity->{$attribute})->toBe($raw[$attribute]);
    }
});

it('can update an identity', function (): void {
    $identity = Identity::factory()->create();
    $raw = Identity::factory()->make();

    $identity = (new UpdateIdentityAction())
        ->handle(UpdateIdentityData::validateAndCreate($raw), $identity);

    expect($identity)->toBeInstanceOf(Identity::class);
    assertDatabaseHas($identity->getTable(), [
        'employee_id' => $raw['employee_id'],
        'identity_type_id' => $raw['identity_type_id'],
        'identity_number' => $raw['identity_number'],
        'place_of_issue' => $raw['place_of_issue'],
        'issue_date' => $raw['issue_date'],
        'expiry_date' => $raw['expiry_date'],
    ]);
    foreach ($identity as $attribute) {
        expect($identity->{$attribute})->toBe($raw[$attribute]);
    }
});

it('creation fails because :dataset', function ($overrides, array $fields): void {
    $identity = Identity::factory()->raw($overrides);

    expectValidationError(function () use ($identity): void {
        resolve(CreateIdentityAction::class)->handle(
            CreateIdentityData::from($identity)
        );
    }, $fields);
})->with('invalid identity data');

it('update fails because :dataset', function ($overrides, array $fields): void {
    $identity = Identity::factory()->raw($overrides);

    expectValidationError(function () use ($identity): void {
        resolve(CreateIdentityAction::class)->handle(
            CreateIdentityData::from($identity)
        );
    }, $fields);
})->with('invalid identity data');

$invalid = [
    'employee_id is null' => [
        ['employee_id' => null],
        ['employee_id'],
    ],

    'employee_id is string' => [
        ['employee_id' => 'a'],
        ['employee_id'],
    ],

    'identity_type_id is null' => [
        ['identity_type_id' => null],
        ['identity_type_id'],
    ],

    'identity_type_id is string' => [
        ['identity_type_id' => 'a'],
        ['identity_type_id'],
    ],

    'identity_type_id is does not exist' => [
        ['identity_type_id' => 'does-not-exist'],
        ['identity_type_id'],
    ],

    'identity_number is null' => [
        ['identity_number' => null],
        ['identity_number'],
    ],

    'identity_number is short' => [
        ['identity_number' => '1'],
        ['identity_number'],
    ],

    'identity_number is long' => [
        ['identity_number' => str_repeat('a', 11)],
        ['identity_number'],
    ],
];

dataset('invalid identity data', $invalid);
