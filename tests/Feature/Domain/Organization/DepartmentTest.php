<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
use App\Domain\Organization\Actions\CreateDepartmentAction;
use App\Domain\Organization\Actions\UpdateDepartmentAction;
use App\Domain\Organization\Data\CreateDepartmentData;
use App\Domain\Organization\Data\UpdateDepartmentData;
use App\Domain\Organization\Models\Department;

use function Pest\Laravel\assertDatabaseHas;

it('creates a department', function (): void {
    $payload = Department::factory()->raw();
    $created = resolve(CreateDepartmentAction::class)->handle(
        CreateDepartmentData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Department::class);
    expect($created->exists)->toBeTrue();

    assertDataBaseHas('organization_departments', [
        'name' => json_encode($payload['name']),
        'code' => $payload['code'],
        'type' => $payload['type'],
    ]);
});

it('updates a department', function (): void {
    $payload = Department::factory()->raw();
    $department = Department::factory()->create();
    $updated = resolve(UpdateDepartmentAction::class)->handle(
        UpdateDepartmentData::validateAndCreate($payload),
        $department
    );

    expect($updated)->toBeInstanceOf(Department::class);
    assertDataBaseHas('organization_departments', [
        'code' => $payload['code'],
        'type' => $payload['type'],
        'is_active' => $payload['is_active'],
        'parent_id' => $payload['parent_id'],
        'head_id' => $payload['head_id'],
    ]);
    expect($updated->name)->toBe($payload['name'][app()->getLocale()]);
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {
    $payload = Department::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateDepartmentAction::class)->handle(
        CreateDepartmentData::validateAndCreate($payload)
    ), $fields);
})
    ->with('invalid department');

it('fails to update if :dataset', function (array $overrides, array $fields): void {
    $payload = Department::factory()->raw($overrides);
    $department = Department::factory()->create();

    expectValidationError(fn () => resolve(UpdateDepartmentAction::class)->handle(
        UpdateDepartmentData::validateAndCreate($payload),
        $department
    ), $fields);
})
    ->with('invalid department');

dataset('invalid department', [
    ...invalidName(),
    ...invalidType(),
    ...invalidHead(),
    ...invalidParent(),
]);

function invalidType(): array
{
    return [
        'type is string' => [
            ['type' => 'type'],
            ['type'],
        ],
        'type is null' => [
            ['type' => null],
            ['type'],
        ],
    ];
}

function invalidHead(): array
{
    return [
        'invalid head' => [
            function (): array {
                Employee::factory()->create();

                return [
                    ['head_id' => 2],
                    ['head_id'],
                ];
            },
        ],
    ];
}

function invalidParent(): array
{
    return [
        'invalid parent' => [
            function (): array {
                Department::factory()->create();

                return [
                    ['parent_id' => 3],
                    ['parent_id'],
                ];
            },

        ],
    ];
}
