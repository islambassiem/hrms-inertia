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
    $payload = Identity::factory()->make();

    $updated = (new UpdateIdentityAction())
        ->handle(UpdateIdentityData::validateAndCreate($payload),
            Identity::factory()->create());

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
            CreateIdentityData::validateAndCreate($payload)
        );
    }, $fields);
})->with('create');

it('update fails because :dataset', function ($overrides, array $fields): void {
    $payload = Identity::factory()->raw($overrides);

    expectValidationError(function () use ($payload): void {
        resolve(CreateIdentityAction::class)->handle(
            CreateIdentityData::validateAndCreate($payload)
        );
    }, $fields);
})->with('update');

dataset('create', [
    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('identity_type_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('identity_number')
        ->required()
        ->tooShort(10)
        ->tooLong(10)
        ->build(),
]);

dataset('update', [
    ...invalid('employee_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('identity_type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('identity_number')
        ->tooShort(10)
        ->tooLong(10)
        ->build(),
]);
