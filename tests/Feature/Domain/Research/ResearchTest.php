<?php

declare(strict_types=1);

use App\Domain\Research\Actions\CreateResearchAction;
use App\Domain\Research\Actions\UpdateResearchAction;
use App\Domain\Research\Data\CreateResearchData;
use App\Domain\Research\Data\UpdateResearchData;
use App\Domain\Research\Models\Research;

use function Pest\Laravel\assertDatabaseHas;

it('creates a research', function (): void {
    $payload = Research::factory()->raw();

    $created = resolve(CreateResearchAction::class)->handle(
        CreateResearchData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Research::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('research', [
        'employee_id' => $payload['employee_id'],
        'status_id' => $payload['status_id'],
        'type_id' => $payload['type_id'],
        'nature_id' => $payload['nature_id'],
        'domain_id' => $payload['domain_id'],
        'title' => $payload['title'],
        'publisher' => $payload['publisher'],
        'isbn' => $payload['isbn'],
        'magazine' => $payload['magazine'],
        'edition' => $payload['edition'],
        'page_count' => $payload['page_count'],
        'publication_location' => $payload['publication_location'],
        'summary' => $payload['summary'],
        'language_id' => $payload['language_id'],
        'publishing_url' => $payload['publishing_url'],
        'keywords' => $payload['keywords'],
    ]);
    expect($created->publishing_date->toDateString())->toBe($payload['publishing_date']);
});

it('updates a research', function (): void {
    $payload = Research::factory()->raw();

    $updated = resolve(UpdateResearchAction::class)->handle(
        UpdateResearchData::validateAndCreate($payload),
        Research::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Research::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('research', [
        'status_id' => $payload['status_id'],
        'type_id' => $payload['type_id'],
        'nature_id' => $payload['nature_id'],
        'domain_id' => $payload['domain_id'],
        'title' => $payload['title'],
        'publisher' => $payload['publisher'],
        'isbn' => $payload['isbn'],
        'magazine' => $payload['magazine'],
        'edition' => $payload['edition'],
        'page_count' => $payload['page_count'],
        'publication_location' => $payload['publication_location'],
        'summary' => $payload['summary'],
        'language_id' => $payload['language_id'],
        'publishing_url' => $payload['publishing_url'],
        'keywords' => $payload['keywords'],
    ]);
    expect($updated->publishing_date->toDateString())->toBe($payload['publishing_date']);
});

it('fails to create a research if :dataset', function (array $overrides, array $fields): void {
    $payload = Research::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateResearchAction::class)->handle(
        CreateResearchData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update a research if :dataset', function (array $overrides, array $fields): void {
    $payload = Research::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateResearchAction::class)->handle(
        CreateResearchData::validateAndCreate($payload)
    ), $fields);
})
    ->with('update');

dataset('create', [

    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('status_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('nature_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('domain_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('title')
        ->required()
        ->notstring()
        ->tooLong(255)
        ->tooShort()
        ->build(),

    ...invalid('publishing_date')
        ->required()
        ->build(),

    ...invalid('publisher')
        ->notstring()
        ->tooLong()
        ->tooShort()
        ->build(),

    ...invalid('isbn')
        ->notstring()
        ->tooLong(20)
        ->tooShort(10)
        ->build(),

    ...invalid('magazine')
        ->notstring()
        ->tooLong()
        ->tooShort()
        ->build(),

    ...invalid('edition')
        ->belowMin(1)
        ->aboveMax(100)
        ->build(),

    ...invalid('page_count')
        ->belowMin(10)
        ->aboveMax(1000)
        ->build(),

    ...invalid('publication_location')
        ->notstring()
        ->tooLong()
        ->tooShort()
        ->build(),

    ...invalid('summary')
        ->notstring()
        ->tooLong(1000)
        ->tooShort()
        ->build(),

    ...invalid('language_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('publishing_url')
        ->tooLong()
        ->tooShort(2)
        ->build(),

    ...invalid('keywords')
        ->tooLong()
        ->tooShort(2)
        ->build(),
]);

dataset('update', [

    ...invalid('status_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('nature_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('domain_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('title')
        ->tooLong(255)
        ->tooShort()
        ->build(),

    ...invalid('publishing_date')
        ->build(),

    ...invalid('publisher')
        ->tooLong()
        ->tooShort()
        ->build(),

    ...invalid('isbn')
        ->tooLong(20)
        ->tooShort(10)
        ->build(),

    ...invalid('magazine')
        ->tooLong()
        ->tooShort()
        ->build(),

    ...invalid('edition')
        ->belowMin(1)
        ->aboveMax(100)
        ->build(),

    ...invalid('page_count')
        ->belowMin(10)
        ->aboveMax(1000)
        ->build(),

    ...invalid('publication_location')
        ->tooLong()
        ->tooShort()
        ->build(),

    ...invalid('summary')
        ->tooLong(1000)
        ->tooShort()
        ->build(),

    ...invalid('language_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('publishing_url')
        ->tooLong()
        ->tooShort(2)
        ->build(),

    ...invalid('keywords')
        ->tooLong()
        ->tooShort(2)
        ->build(),
]);
