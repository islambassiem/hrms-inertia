<?php

declare(strict_types=1);

namespace App\Domain\Qualification\Actions;

use App\Domain\Qualification\Data\UpdateSpecialtyCategoryData;
use App\Domain\Qualification\Models\SpecialtyCategory;

final class UpdateSpecialtyCategoryAction
{
    public function handle(UpdateSpecialtyCategoryData $data, SpecialtyCategory $category): SpecialtyCategory
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        $category->update($attributes);

        return $category;
    }
}
