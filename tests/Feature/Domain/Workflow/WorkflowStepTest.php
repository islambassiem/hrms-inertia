<?php

declare(strict_types=1);

use App\Domain\Workflow\Actions\CreateWorkflowStepAction;
use App\Domain\Workflow\Actions\UpdateWorkflowStepAction;
use App\Domain\Workflow\Data\CreateWorkflowStepData;
use App\Domain\Workflow\Data\UpdateWorkflowStepData;
use App\Domain\Workflow\Models\Step;

use function Pest\Laravel\assertDatabaseHas;

it('creates a workflow step', function (): void {
    $payload = Step::factory()->raw();

    $created = resolve(CreateWorkflowStepAction::class)->handle(
        CreateWorkflowStepData::validateAndCreate($payload)
    );

    expect($created)->toBeInstanceOf(Step::class);
    expect($created->exists)->toBeTrue();
    assertDatabaseHas('workflow_steps', [
        'workflow_id' => $payload['workflow_id'],
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'description->en' => $payload['description']['en'],
        'description->ar' => $payload['description']['ar'],
        'step_order' => $payload['step_order'],
        'role_id' => $payload['role_id'],
    ]);
});

it('updates a workflow step', function (): void {
    $payload = Step::factory()->raw();

    $updated = resolve(UpdateWorkflowStepAction::class)->handle(
        UpdateWorkflowStepData::validateAndCreate($payload),
        Step::factory()->create()
    );

    expect($updated)->toBeInstanceOf(Step::class);
    expect($updated->exists)->toBeTrue();
    assertDatabaseHas('workflow_steps', [
        'name->en' => $payload['name']['en'],
        'name->ar' => $payload['name']['ar'],
        'description->en' => $payload['description']['en'],
        'description->ar' => $payload['description']['ar'],
        'step_order' => $payload['step_order'],
        'role_id' => $payload['role_id'],
    ]);
});

it('fails to create step if :dataset', function (array $overrides, array $fields): void {
    $payload = Step::factory()->raw($overrides);

    expectValidationError(fn () => resolve(CreateWorkflowStepAction::class)->handle(
        CreateWorkflowStepData::validateAndCreate($payload)
    ), $fields);
})
    ->with('create');

it('fails to update step if :dataset', function (array $overrides, array $fields): void {
    $payload = Step::factory()->raw($overrides);

    expectValidationError(fn () => resolve(UpdateWorkflowStepAction::class)->handle(
        UpdateWorkflowStepData::validateAndCreate($payload),
        Step::factory()->create()
    ), $fields);
})
    ->with('update');

dataset('create', [

    ...invalid('workflow_id')
        ->required()
        ->invalidForeignKey()
        ->build(),

    ...invalid('name')
        ->required()
        ->invalidName()
        ->build(),

    ...invalid('description')
        ->required()
        ->invalidName('description', min: 5, max: 255)
        ->build(),

    ...invalid('step_order')
        ->required()
        ->build(),

    ...invalid('role_id')
        ->invalidForeignKey()
        ->required()
        ->build(),

]);

dataset('update', [

    ...invalid('name')
        ->invalidName()
        ->build(),

    ...invalid('description')
        ->invalidName('description', min: 5, max: 255)
        ->build(),

    ...invalid('step_order')
        ->build(),

    ...invalid('role_id')
        ->invalidForeignKey()
        ->build(),

]);
