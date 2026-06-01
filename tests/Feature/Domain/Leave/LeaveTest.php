<?php

declare(strict_types=1);

use App\Domain\Leave\Actions\CreateLeaveRequestAction;
use App\Domain\Leave\Actions\UpdateLeaveRequestAction;
use App\Domain\Leave\Data\CreateLeaveRequestData;
use App\Domain\Leave\Data\UpdateLeaveRequestData;
use App\Domain\Leave\Enums\LeaveStatus;
use App\Domain\Leave\Models\LeaveRequest;
use Carbon\CarbonImmutable;

use function Pest\Laravel\assertDatabaseHas;

it('created a leave request', function (): void {
    $payload = LeaveRequest::factory()->raw();

    $created = resolve(CreateLeaveRequestAction::class)->handle(
        CreateLeaveRequestData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(LeaveRequest::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('leave_requests', [
        'employee_id' => $payload['employee_id'],
        'leave_type_id' => $payload['leave_type_id'],
        'total_days' => $created->start_date->diffInDays(CarbonImmutable::parse($payload['end_date'])) + 1,
        'reason' => $payload['reason'],
    ]);
    expect($created->start_date->format('Y-m-d'))->toBe($payload['start_date']);
    expect($created->end_date->format('Y-m-d'))->toBe($payload['end_date']);
    expect($created->status)->toBe(LeaveStatus::PENDING);
});

it('updates a leave request', function (): void {
    $payload = LeaveRequest::factory()->raw();

    $updated = resolve(UpdateLeaveRequestAction::class)->handle(
        UpdateLeaveRequestData::validateAndCreate($payload),
        LeaveRequest::factory()->create()
    );

    expect($updated)->toBeInstanceOf(LeaveRequest::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('leave_requests', [
        'leave_type_id' => $payload['leave_type_id'],
        'total_days' => $updated->start_date->diffInDays(CarbonImmutable::parse($payload['end_date'])) + 1,
        'status' => $payload['status'],
        'reason' => $payload['reason'],
    ]);
    expect($updated->start_date->format('Y-m-d'))->toBe($payload['start_date']);
    expect($updated->end_date->format('Y-m-d'))->toBe($payload['end_date']);
});

it('fails to create a leave request if :dataset', function (array $overrides, array $fields): void {
    $payload = LeaveRequest::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateLeaveRequestAction::class)->handle(
        CreateLeaveRequestData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

dataset('create', [

    ...invalid('employee_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('leave_type_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('start_date')
        ->required()
        ->build(),

    ...invalid('end_date')
        ->required()
        ->build(),

    ...invalid('reason')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid()
        ->invalidDateOrder('start_date', 'end_date')
        ->build(),
]);

it('fails to update a leave request if :dataset', function (array $overrides, array $fields): void {
    $payload = LeaveRequest::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateLeaveRequestAction::class)->handle(
        UpdateLeaveRequestData::validateAndCreate($payload),
        LeaveRequest::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('update', [

    ...invalid('leave_type_id')
        ->invalidForeignKey()
        ->build(),

    ...invalid('start_date')
        ->build(),

    ...invalid('end_date')
        ->build(),

    ...invalid('status')
        ->invalidFormat()
        ->build(),

    ...invalid('reason')
        ->tooShort()
        ->tooLong()
        ->build(),

    ...invalid()
        ->invalidDateOrder('start_date', 'end_date')
        ->build(),
]);
