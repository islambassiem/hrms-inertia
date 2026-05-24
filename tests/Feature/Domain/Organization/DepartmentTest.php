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
    $raw = Department::factory()->make();
    $created = resolve(CreateDepartmentAction::class)->handle(
        CreateDepartmentData::validateAndCreate($raw->toArray())
    );

    expect($created)->toBeInstanceOf(Department::class);
    assertDataBaseHas($created->getTable(), $created->getAttributes());
    expect($created->name)->toBe($raw->name);
    expect($created->code)->toBe($raw->code);
    expect($created->type)->toBe($raw->type);
});

it('updated a department', function (): void {
    $raw = Department::factory()->make();
    $existing = Department::factory()->create();
    $updated = resolve(UpdateDepartmentAction::class)->handle(
        UpdateDepartmentData::validateAndCreate($raw->toArray()),
        $existing
    );

    expect($updated)->toBeInstanceOf(Department::class);
    assertDataBaseHas($updated->getTable(), $updated->getAttributes());
    expect($updated->name)->toBe($raw->name);
    expect($updated->code)->toBe($raw->code);
    expect($updated->type)->toBe($raw->type);
    expect($updated->head_id)->toBe($raw->head_id);
    expect($updated->parent_id)->toBe($raw->parent_id);
    expect($updated->is_active)->toBe($raw->is_active);
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {
    $raw = Department::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateDepartmentAction::class)->handle(
        CreateDepartmentData::validateAndCreate($raw)
    ), $fields);
})
    ->with('invalid department');

it('fails to update if :dataset', function (array $overrides, array $fields): void {
    $raw = Department::factory()->raw($overrides);
    $existing = Department::factory()->create();

    expectValidationError(fn () => resolve(UpdateDepartmentAction::class)->handle(
        UpdateDepartmentData::validateAndCreate($raw),
        $existing
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
