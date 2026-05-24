<?php

declare(strict_types=1);

use App\Domain\Dependent\Actions\CreateDependentAction;
use App\Domain\Dependent\Actions\UpdateDependentAction;
use App\Domain\Dependent\Data\CreateDependentData;
use App\Domain\Dependent\Data\UpdateDependentData;
use App\Domain\Dependent\Models\Dependent;
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
        'date_of_birth' => $payload['date_of_birth'],
        'relationship_id' => $payload['relationship_id'],
        'has_insurance' => $payload['has_insurance'],
        'ticket_ratio' => $payload['ticket_ratio'],
    ]);
});

it('updates a dependent with valid data', function (): void {
    $dependent = Dependent::factory()->create();
    $payload = Dependent::factory()->raw();

    $updated = resolve(UpdateDependentAction::class)->handle(
        UpdateDependentData::validateAndCreate($payload),
        $dependent
    );

    expect($updated)->toBeInstanceOf(Dependent::class);
    expect($updated->exists)->toBeTrue();
    expect($updated->id)->toBeInt();
    assertDatabaseHas('dependent_dependents', [
        'name_en' => $payload['name_en'],
        'name_ar' => $payload['name_ar'],
        'identification' => $payload['identification'],
        'gender_id' => $payload['gender_id'],
        'date_of_birth' => $payload['date_of_birth'],
        'relationship_id' => $payload['relationship_id'],
        'has_insurance' => $payload['has_insurance'],
        'ticket_ratio' => $payload['ticket_ratio'],
    ]);
});

it('fails to create a dependent if :dataset', function (array $overrides, array $fields): void {
    $payload = Dependent::factory()->raw($overrides);
    expectValidationError(fn () => resolve(CreateDependentAction::class)->handle(
        CreateDependentData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update a dependent if :dataset', function (array $overrides, array $fields): void {
    $dependent = Dependent::factory()->create();
    $payload = Dependent::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateDependentAction::class)->handle(
        UpdateDependentData::validateAndCreate($payload),
        $dependent
    ), $fields);
})
    ->with('update');

dataset('create', [
    ...name(),
    ...identification(),
    ...gender(),
    ...ticket(),
]);

dataset('update', [
    ...identification(),
    ...ticket(),
]);

function name(): array
{
    return [
        'one name exists' => [
            [
                'name_ar' => null,
                'name_en' => null,

            ],
            ['name_ar'],
        ],
        'name_en is too long' => [
            [
                'name_ar' => null,
                'name_en' => str_repeat('a', 151),

            ],
            ['name_en'],
        ],
        'name_ar is too long' => [
            [
                'name_en' => null,
                'name_ar' => str_repeat('a', 151),

            ],
            ['name_ar'],
        ],
    ];
}

function identification(): array
{
    return [
        'identification is null' => [
            ['identification' => null],
            ['identification'],
        ],

        'identification is invalid' => [
            ['identification' => 'abc'],
            ['identification'],
        ],

        'identification is short' => [
            ['identification' => '123'],
            ['identification'],
        ],

        'identification is long' => [
            ['identification' => '12345678901'],
            ['identification'],
        ],
    ];
}

function gender(): array
{
    return [
        'gender_id is invalid' => [
            function (): array {
                Gender::factory()->create();

                return [
                    ['gender_id' => 5],
                    ['gender_id'],
                ];
            },
        ],
        'gender_id is null' => [
            ['gender_id' => null],
            ['gender_id'],
        ],
    ];
}

function dateOfBirth(): array
{
    return [
        'date_of_birth is null' => [
            ['date_of_birth' => null],
            ['date_of_birth'],
        ],
    ];
}

function relationship(): array
{
    return [
        'relationship_id is null' => [
            ['relationship_id' => null],
            ['relationship_id'],
        ],
        'relationship_id is invalid' => [
            function (): array {
                Relationship::factory()->create();

                return [
                    ['relationship_id' => 2],
                    ['relationship_id'],
                ];
            },
        ],
    ];
}

function ticket(): array
{
    return [
        'ticket_ratio is negative' => [
            ['ticket_ratio' => -10],
            ['ticket_ratio'],
        ],
        'ticket_ratio is more than 100' => [
            ['ticket_ratio' => 110],
            ['ticket_ratio'],
        ],
    ];
}
