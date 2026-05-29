<?php

declare(strict_types=1);

use App\Domain\Qualification\Actions\CreateSpecialtyCategoryAction;
use App\Domain\Qualification\Actions\UpdateSpecialtyCategoryAction;
use App\Domain\Qualification\Data\CreateSpecialtyCategoryData;
use App\Domain\Qualification\Data\UpdateSpecialtyCategoryData;
use App\Domain\Qualification\Models\SpecialtyCategory;

use function Pest\Laravel\assertDatabaseHas;

it('creates a category', function (): void {
    $payload = SpecialtyCategory::factory()->raw();

    $created = resolve(CreateSpecialtyCategoryAction::class)->handle(
        CreateSpecialtyCategoryData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(SpecialtyCategory::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('qualification_specialty_categories', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'parent_id' => $payload['parent_id'],
        'code' => $payload['code'],
    ]);
});

it('updates a category', function (): void {
    $payload = SpecialtyCategory::factory()->raw();

    $created = resolve(UpdateSpecialtyCategoryAction::class)->handle(
        UpdateSpecialtyCategoryData::validateAndCreate($payload),
        SpecialtyCategory::factory()->create()
    );

    expect($created)->toBeInstanceOf(SpecialtyCategory::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('qualification_specialty_categories', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'parent_id' => $payload['parent_id'],
        'code' => $payload['code'],
    ]);
});

it('fails to create a category if :dataset', function (array $overrides, array $fields): void {
    $payload = SpecialtyCategory::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateSpecialtyCategoryAction::class)->handle(
        CreateSpecialtyCategoryData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update a category if :dataset', function (array $overrides, array $fields): void {
    $payload = SpecialtyCategory::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateSpecialtyCategoryAction::class)->handle(
        UpdateSpecialtyCategoryData::validateAndCreate($payload),
        SpecialtyCategory::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('name_en')
        ->required()
        ->tooLong(100)
        ->tooShort()
        ->build(),

    ...invalid('name_ar')
        ->required()
        ->tooLong(100)
        ->tooShort()
        ->build(),

    ...invalid('parent_id')
        ->foreignKey('parent')
        ->build(),

    ...invalid('code')
        ->required()
        ->tooLong(100)
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

    ...invalid('parent_id')
        ->foreignKey('parent')
        ->build(),

    ...invalid('code')
        ->tooLong(100)
        ->tooShort(2)
        ->build(),
]);
