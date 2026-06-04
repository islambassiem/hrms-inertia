<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Actions;

use App\Domain\Workflow\Data\CreateWorkflowStepData;
use App\Domain\Workflow\Models\Step;

final class CreateWorkflowStepAction
{
    public function handle(CreateWorkflowStepData $data): Step
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Step::query()->create($attributes);
    }
}
