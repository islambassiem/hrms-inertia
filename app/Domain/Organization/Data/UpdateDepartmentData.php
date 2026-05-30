<?php

declare(strict_types=1);

namespace App\Domain\Organization\Data;

use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Shared\Data\TranslatedNameData;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateDepartmentData extends Data
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public TranslatedNameData|null|Optional $name,

        public string|null|Optional $code,

        public DepartmentType|Optional $type,

        public bool|null|Optional $is_active = true,

        #[Exists('organization_departments', 'id'), Nullable]
        public int|null|Optional $parent_id = null,

        #[Exists('employees', 'id'), Nullable]
        public int|null|Optional $head_id = null,

    ) {
        //
    }
}
