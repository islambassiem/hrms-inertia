<?php

declare(strict_types=1);

use App\Domain\Employee\Actions\CreateEmployeeLeavePolicyAssignmentAction;
use App\Domain\Employee\Actions\UpdateEmployeeLeavePolicyAssignmentAction;
use App\Domain\Employee\Data\CreateEmployeeLeavePolicyAssignmentData;
use App\Domain\Employee\Data\UpdateEmployeeLeavePolicyAssignmentData;
use App\Domain\Employee\Models\EmployeeLeavePolicyAssignment;
use Illuminate\Validation\ValidationException;

use function Pest\Laravel\assertDatabaseHas;

it('creates a leave policy to an employee', function (): void {
    $payload = EmployeeLeavePolicyAssignment::factory()->raw();

    $created = resolve(CreateEmployeeLeavePolicyAssignmentAction::class)->handle(
        CreateEmployeeLeavePolicyAssignmentData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(EmployeeLeavePolicyAssignment::class);
    expect($created->exists())->toBeTrue();
    assertDatabaseHas('employee_leave_policy_assignments', [
        'employee_id' => $payload['employee_id'],
        'policy_id' => $payload['policy_id'],
    ]);
    expect($created->start_date->toDateString())->toBe($payload['start_date']);
    expect($created->end_date)->toBeNull();
});

it('updates a leave policy to an employee', function (): void {
    $assignment = EmployeeLeavePolicyAssignment::factory()->create([
        'start_date' => '2025-07-10',
    ]);
    $endDate = '2026-06-06';

    $updated = resolve(UpdateEmployeeLeavePolicyAssignmentAction::class)->handle(
        UpdateEmployeeLeavePolicyAssignmentData::validateAndCreate([
            'start_date' => $assignment->start_date->toDateString(),
            'end_date' => $endDate,
        ]),
        $assignment
    );

    expect($updated)->toBeInstanceOf(EmployeeLeavePolicyAssignment::class);
    expect($updated->exists())->toBeTrue();
    expect($updated->end_date->toDateString())->toBe($endDate);
});

it('fails to create a leave policy if :dataset', function (array $overrides, array $fields): void {
    $payload = EmployeeLeavePolicyAssignment::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateEmployeeLeavePolicyAssignmentAction::class)->handle(
        CreateEmployeeLeavePolicyAssignmentData::validateAndCreate($payload)
    ), $fields);

})
    ->with('create');

it('fails to store end date before start date', function (): void {
    $assignment = EmployeeLeavePolicyAssignment::factory()->create([
        'start_date' => '2027-07-10',
    ]);
    $endDate = '2026-06-06';

    $updated = resolve(UpdateEmployeeLeavePolicyAssignmentAction::class)->handle(
        UpdateEmployeeLeavePolicyAssignmentData::validateAndCreate([
            'start_date' => $assignment->start_date->toDateString(),
            'end_date' => $endDate,
        ]),
        $assignment
    );
})
    ->throws(ValidationException::class);

dataset('create', [

    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('policy_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('start_date')
        ->required()
        ->build(),

]);
