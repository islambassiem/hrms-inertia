<?php

declare(strict_types=1);

use App\Domain\Identity\Actions\CreateIdentityAction;
use App\Domain\Identity\Actions\UpdateIdentityAction;
use App\Domain\Identity\Data\CreateIdentityData;
use App\Domain\Identity\Data\UpdateIdentityData;
use App\Domain\Identity\Models\Identity;

use function Pest\Laravel\assertDatabaseHas;

it('can create an identity', function (): void {
    $payload = Identity::factory()->raw();

    $created = (new CreateIdentityAction())
        ->handle(CreateIdentityData::validateAndCreate($payload));

    expect($created)->toBeInstanceOf(Identity::class);
    expect($created->exists)->toBeTrue();

    assertDatabaseHas('identity_identities', [
        'employee_id' => $payload['employee_id'],
        'identity_type_id' => $payload['identity_type_id'],
        'identity_number' => $payload['identity_number'],
        'place_of_issue' => $payload['place_of_issue'],
    ]);
    expect($created->issue_date->toDateString())->toBe($payload['issue_date']);
    expect($created->expiry_date->toDateString())->toBe($payload['expiry_date']);
});

it('can update an identity', function (): void {
    $identity = Identity::factory()->create();
    $payload = Identity::factory()->make();

    $updated = (new UpdateIdentityAction())
        ->handle(UpdateIdentityData::validateAndCreate($payload), $identity);

    expect($updated)->toBeInstanceOf(Identity::class);
    expect($updated->exists)->tobeTrue();

    assertDatabaseHas($updated->getTable(), [
        'employee_id' => $payload['employee_id'],
        'identity_type_id' => $payload['identity_type_id'],
        'identity_number' => $payload['identity_number'],
        'place_of_issue' => $payload['place_of_issue'],
        'issue_date' => $payload['issue_date'],
        'expiry_date' => $payload['expiry_date'],
    ]);
});

it('creation fails because :dataset', function ($overrides, array $fields): void {
    $payload = Identity::factory()->raw($overrides);

    expectValidationError(function () use ($payload): void {
        resolve(CreateIdentityAction::class)->handle(
            CreateIdentityData::from($payload)
        );
    }, $fields);
})->with('invalid identity data');

it('update fails because :dataset', function ($overrides, array $fields): void {
    $payload = Identity::factory()->raw($overrides);

    expectValidationError(function () use ($payload): void {
        resolve(CreateIdentityAction::class)->handle(
            CreateIdentityData::from($payload)
        );
    }, $fields);
})->with('invalid identity data');

dataset('invalid identity data', [
    ...invalid(),
]);

function invalid(): array
{
    return [
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
}
