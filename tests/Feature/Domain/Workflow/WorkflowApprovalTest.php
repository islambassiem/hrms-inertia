<?php

declare(strict_types=1);

use App\Domain\Employee\Models\Employee;
use App\Domain\Workflow\Actions\RecordWorkflowApprovalAction;
use App\Domain\Workflow\Actions\UpdateWorkflowApprovalAction;
use App\Domain\Workflow\Data\UpdateWorkflowApprovalData;
use App\Domain\Workflow\Enums\WorkflowStatus;
use App\Domain\Workflow\Models\Approval;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

use function Pest\Laravel\assertDatabaseHas;

it('creates a workflow approval', function (): void {

    $employee = Employee::factory()->create();
    $role = Role::create(['name' => 'head']);

    resolve(RecordWorkflowApprovalAction::class)->handle(
        approveable_type: 'App\Domain\Leave\Models\LeaveRequest',
        approveable_id: 1,
        approver_id: $employee->id,
        role_id: $role->id,
    );

    assertDatabaseHas('workflow_approvals', [
        'approveable_type' => 'App\Domain\Leave\Models\LeaveRequest',
        'approveable_id' => 1,
        'approver_id' => $employee->id,
        'role_id' => $role->id,
        'status' => WorkflowStatus::PENDING->value,
        'comment' => null,
    ]);
});

it('updates a workflow approval', function (): void {
    $updated = resolve(UpdateWorkflowApprovalAction::class)->handle(
        UpdateWorkflowApprovalData::validateAndCreate([
            'status' => WorkflowStatus::APPROVED->value,
            'comment' => 'workflow is approved',
        ]),
        Approval::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Approval::class);
    expect($updated->exists)->toBeTrue();

    assertDatabaseHas('workflow_approvals', [
        'status' => WorkflowStatus::APPROVED->value,
        'comment' => 'workflow is approved',
    ]);
});

it('fails tp update a workflow approval with invalid data', function (): void {
    resolve(UpdateWorkflowApprovalAction::class)->handle(
        UpdateWorkflowApprovalData::validateAndCreate([
            'status' => 7,
        ]),
        Approval::factory()->create()
    );
})
    ->throws(ValidationException::class);
