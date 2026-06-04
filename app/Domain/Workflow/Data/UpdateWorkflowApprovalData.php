<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Data;

use App\Domain\Workflow\Enums\WorkflowStatus;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

final class UpdateWorkflowApprovalData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public WorkflowStatus $status,

        #[Max(255), Min(2)]
        public string $comment,
    ) {
        //
    }
}
