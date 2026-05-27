<?php

declare(strict_types=1);

use App\Domain\Dependent\Actions\CreateDependentAction;
use App\Domain\Dependent\Actions\UpdateDependentAction;
use App\Domain\Dependent\Data\CreateDependentData;
use App\Domain\Dependent\Data\UpdateDependentData;
use App\Domain\Dependent\Models\Dependent;
use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Gender;
use App\Domain\Shared\Models\Relationship;

use function Pest\Laravel\assertDatabaseHas;

it('creates a dependent with valid data', function (): void {
    $payload = Dependent::factory()->raw();

    $created = resolve(CreateDependentAction::class)->handle(
        CreateDependentData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Dependent::class);
    expect($created->exists)->toBeTrue();
    expect($created->id)->toBeInt();

    assertDatabaseHas('dependent_dependents', [
        'employee_id' => $payload['employee_id'],
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'identification' => $payload['identification'],
        'gender_id' => $payload['gender_id'],
        'relationship_id' => $payload['relationship_id'],
        'has_insurance' => $payload['has_insurance'],
        'ticket_ratio' => $payload['ticket_ratio'],
    ]);
    expect($created->date_of_birth->toDateString())->toBe($payload['date_of_birth']);
});

it('updates a dependent with valid data', function (): void {
    $payload = Dependent::factory()->raw();

    $updated = resolve(UpdateDependentAction::class)->handle(
        UpdateDependentData::validateAndCreate($payload),
        Dependent::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Dependent::class);
    expect($updated->exists)->toBeTrue();
    expect($updated->id)->toBeInt();
    assertDatabaseHas('dependent_dependents', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'identification' => $payload['identification'],
        'gender_id' => $payload['gender_id'],
        'relationship_id' => $payload['relationship_id'],
        'has_insurance' => $payload['has_insurance'],
        'ticket_ratio' => $payload['ticket_ratio'],
    ]);
    expect($updated->date_of_birth->toDateString())->toBe($payload['date_of_birth']);
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {
    $payload = Dependent::factory()->raw($overrides);
    expectValidationError(fn () => resolve(CreateDependentAction::class)->handle(
        CreateDependentData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update a dependent if :dataset', function (array $overrides, array $fields): void {
    $payload = Dependent::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateDependentAction::class)->handle(
        UpdateDependentData::validateAndCreate($payload),
        Dependent::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...invalid('employee_id')
        ->required()
        ->foreignKey(Employee::class)
        ->build(),

    ...name(),
    ...invalid('name_ar')
        ->tooLong(150)
        ->build(),

    ...invalid('name_en')
        ->tooLong(150)
        ->build(),

    ...invalid('identification')
        ->required()
        ->digits(10)
        ->build(),

    ...invalid('gender_id')
        ->required()
        ->foreignKey(Gender::class)
        ->build(),

    ...invalid('date_of_birth')
        ->required()
        ->future()
        ->build(),

    ...invalid('relationship_id')
        ->required()
        ->foreignKey(Relationship::class)
        ->build(),

    ...invalid('ticket_ratio')
        ->build(),

]);

dataset('update', [
    ...name(),

    ...invalid('name_ar')
        ->tooLong(150)
        ->build(),

    ...invalid('name_en')
        ->tooLong(150)
        ->build(),

    ...invalid('identification')
        ->digits(10)
        ->build(),

    ...invalid('gender_id')
        ->foreignKey(Gender::class)
        ->build(),

    ...invalid('date_of_birth')
        ->future()
        ->build(),

    ...invalid('relationship_id')
        ->foreignKey(Relationship::class)
        ->build(),

    ...invalid('ticket_ratio')
        ->build(),
]);

function name(): array
{
    return [
        'one name exists' => [
            [
                'name_ar' => null,
                'name_en' => null,

            ],
            ['name_ar', 'name_en'],
        ],
    ];
}
