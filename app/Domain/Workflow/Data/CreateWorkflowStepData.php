<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use App\Domain\Shared\Data\TranslatedTextData;
use App\Domain\Shared\Enums\ReferenceType;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\Constraints\WhereConstraint;

final class CreateWorkflowStepData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        #[Exists(
            'shared_reference_values',
            'id',
            where: new WhereConstraint('reference_type_id', ReferenceType::WORKFLOW)
        )]
        public int $workflow_id,

        public TranslatedNameData $name,

        public TranslatedTextData $description,

        public int $step_order,

        #[Exists('spatie_roles', 'id')]
        public int $role_id,

    ) {
        //
    }
}
