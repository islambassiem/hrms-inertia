<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\CreateSpecialtyCategoryData;
use App\Domain\Qualification\Models\SpecialtyCategory;

final class CreateSpecialtyCategoryAction
{
    public function handle(CreateSpecialtyCategoryData $data): SpecialtyCategory
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return SpecialtyCategory::query()->create($attributes);
    }
}
