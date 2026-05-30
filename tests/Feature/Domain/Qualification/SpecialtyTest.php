<?php

declare(strict_types=1);

use App\Domain\Qualification\Actions\CreateSpecialtyAction;
use App\Domain\Qualification\Actions\UpdateSpecialtyAction;
use App\Domain\Qualification\Data\CreateSpecialtyData;
use App\Domain\Qualification\Data\UpdateSpecialtyData;
use App\Domain\Qualification\Models\Specialty;

use function Pest\Laravel\assertDatabaseHas;

it('creates a speciality', function (): void {
    $payload = Specialty::factory()->raw();

    $created = resolve(CreateSpecialtyAction::class)->handle(
        CreateSpecialtyData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Specialty::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('qualification_specialties', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'category_id' => $payload['category_id'],
        'code' => $payload['code'],
    ]);
});

it('updates a speciality', function (): void {
    $payload = Specialty::factory()->raw();

    $updated = resolve(UpdateSpecialtyAction::class)->handle(
        UpdateSpecialtyData::validateAndCreate($payload),
        Specialty::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Specialty::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('qualification_specialties', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'category_id' => $payload['category_id'],
        'code' => $payload['code'],
    ]);
});

it('fails to create speciality if :dataset', function (array $overrides, array $fields): void {
    $payload = Specialty::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateSpecialtyAction::class)->handle(
        CreateSpecialtyData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update speciality if :dataset', function (array $overrides, array $fields): void {
    $payload = Specialty::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateSpecialtyAction::class)->handle(
        UpdateSpecialtyData::validateAndCreate($payload),
        Specialty::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('name_en')
        ->tooLong(100)
        ->tooShort()
        ->build(),

    ...invalid('name_ar')
        ->required()
        ->tooLong(100)
        ->tooShort()
        ->build(),

    ...invalid('category_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('code')
        ->required()
        ->tooLong(50)
        ->tooShort(2)
        ->build(),
]);

dataset('update', [
    ...invalid('name_en')
        ->tooLong(100)
        ->tooShort()
        ->build(),

    ...invalid('name_ar')
        ->tooLong(100)
        ->tooShort()
        ->build(),

    ...invalid('category_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('code')
        ->tooLong(50)
        ->tooShort(2)
        ->build(),
]);
