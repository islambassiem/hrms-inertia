<?php

declare(strict_types=1);

namespace App\Domain\Organization\Data;

use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

final class CreateDepartmentData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public TranslatedNameData $name,

        public ?string $code,

        public DepartmentType $type,

        public ?bool $is_active = true,

        #[Exists('organization_departments', 'id'), Nullable]
        public ?int $parent_id = null,

        #[Exists('employee_employees', 'id'), Nullable]
        public ?int $head_id = null,
    ) {
        //
    }
}
