<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Qualification\Models\Rating;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Rating>
 */
#[UseModel(Rating::class)]
final class QualificationRatingFactory extends Factory
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
            'reference_type_id' => ReferenceType::QUALIFICATION_RATING,
            'code' => (string) fake()->unique()->numberBetween(10, 100000000),
        ];
    }
}
