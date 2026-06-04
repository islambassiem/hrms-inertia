<?php

declare(strict_types=1);

namespace App\Domain\Workflow\Data;

use App\Domain\Shared\Data\TranslatedNameData;
use App\Domain\Shared\Data\TranslatedTextData;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateWorkflowStepData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(

        public TranslatedNameData|Optional $name,

        public TranslatedTextData|Optional $description,

        public int|Optional $step_order,

        #[Exists('spatie_roles', 'id')]
        public int|Optional $role_id,
    ) {
        //
    }
}
