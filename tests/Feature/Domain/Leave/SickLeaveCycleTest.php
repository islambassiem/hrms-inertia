<?php

declare(strict_types=1);

use App\Domain\Leave\Actions\CreateEmployeeSickLeaveCycleAction;
use App\Domain\Leave\Actions\UpdateEmployeeSickLeaveCycleAction;
use App\Domain\Leave\Data\CreateEmployeeSickLeaveCycleData;
use App\Domain\Leave\Models\SickLeaveCycle;

use function Pest\Laravel\assertDatabaseHas;

it('creates a sick leave cycle', function (): void {
    $payload = SickLeaveCycle::factory()->raw([
        'start_date' => '2026-06-06',
    ]);

    $created = resolve(CreateEmployeeSickLeaveCycleAction::class)->handle(
        CreateEmployeeSickLeaveCycleData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(SickLeaveCycle::class);
    expect($created->exists)->toBeTrue();

    assertDatabaseHas('leave_employee_sick_leave_cycles', [
        'employee_id' => $payload['employee_id'],
    ]);
    expect($created->start_date->toDateString())->toBe($payload['start_date']);
    expect($created->end_date->toDateString())->toBe('2027-06-05');
});

it('updates a sick leave cycle', function (): void {

    $cycle = SickLeaveCycle::factory()->create([
        'used_days' => 20,
    ]);
    $used_days = 10;
    $updated = resolve(UpdateEmployeeSickLeaveCycleAction::class)->handle($used_days, $cycle);

    expect($updated)->toBeInstanceOf(SickLeaveCycle::class);
    expect($updated->exists)->toBeTrue();
    expect($updated->used_days)->toBe(30);
});

it('fails to create if :dataset', function (array $overrides, array $fields): void {
    $payload = SickLeaveCycle::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateEmployeeSickLeaveCycleAction::class)->handle(
        CreateEmployeeSickLeaveCycleData::validateAndCreate($payload)
    ), $fields);

})->with('create');

dataset('create', [
    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('start_date')
        ->required()
        ->future()
        ->build(),
]);
