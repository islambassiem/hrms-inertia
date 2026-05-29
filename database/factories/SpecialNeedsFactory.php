<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\SpecialNeeds;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SpecialNeeds>
 */
#[UseModel(SpecialNeeds::class)]
final class SpecialNeedsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_ar' => fake('ar')->lexify(),
            'name_en' => fake()->lexify(),
            'reference_type_id' => ReferenceType::EMPLOYEE_SPECIAL_NEEDS,
            'code' => fake()->unique()->numberBetween(1, 100000000),
        ];
    }
}
