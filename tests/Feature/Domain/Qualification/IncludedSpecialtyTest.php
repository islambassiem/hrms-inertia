<?php

declare(strict_types=1);

use App\Domain\Qualification\Actions\CreateIncludedSpecialtyAction;
use App\Domain\Qualification\Actions\UpdateIncludedSpecialtyAction;
use App\Domain\Qualification\Data\CreateIncludedSpecialtyData;
use App\Domain\Qualification\Data\UpdateIncludedSpecialtyData;
use App\Domain\Qualification\Models\IncludedSpecialty;

use function Pest\Laravel\assertDatabaseHas;

it('creates an included specialty', function (): void {
    $payload = IncludedSpecialty::factory()->raw();

    $created = resolve(CreateIncludedSpecialtyAction::class)->handle(
        CreateIncludedSpecialtyData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(IncludedSpecialty::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('qualification_included_specialties', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'code' => $payload['code'],
    ]);
});

it('updates an included specialty', function (): void {
    $payload = IncludedSpecialty::factory()->raw();

    $updated = resolve(UpdateIncludedSpecialtyAction::class)->handle(
        UpdateIncludedSpecialtyData::validateAndCreate($payload),
        IncludedSpecialty::factory()->create(),
    );

    expect($updated)->toBeInstanceOf(IncludedSpecialty::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('qualification_included_specialties', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'code' => $payload['code'],
    ]);
});

it('fails to create an included specialty if :dataset', function (array $overrides, array $fields): void {
    $payload = IncludedSpecialty::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateIncludedSpecialtyAction::class)->handle(
        CreateIncludedSpecialtyData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update an included specialty if :dataset', function (array $overrides, array $fields): void {
    $payload = IncludedSpecialty::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateIncludedSpecialtyAction::class)->handle(
        UpdateIncludedSpecialtyData::validateAndCreate($payload),
        IncludedSpecialty::factory()->create(),
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('name_en')
        ->required()
        ->tooLong(100)
        ->tooShort(2)
        ->build(),

    ...invalid('name_ar')
        ->required()
        ->tooLong(100)
        ->tooShort(2)
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
        ->tooShort(2)
        ->build(),

    ...invalid('name_ar')
        ->tooLong(100)
        ->tooShort(2)
        ->build(),

    ...invalid('code')
        ->tooLong(50)
        ->tooShort(2)
        ->build(),
]);
