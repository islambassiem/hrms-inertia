<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Actions;

use App\Domain\Workflow\Data\UpdateWorkflowStepData;
use App\Domain\Workflow\Models\Step;

final class UpdateWorkflowStepAction
{
    public function handle(UpdateWorkflowStepData $data, Step $step): Step
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $step->update($attributes);

        return $step;
    }
}
