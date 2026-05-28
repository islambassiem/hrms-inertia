<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\Gender;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gender>
 */
#[UseModel(Gender::class)]
final class GenderFactory extends Factory
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
            'reference_type_id' => ReferenceType::GENDER,
            'code' => fake()->unique()->numberBetween(1, 100000000),
        ];
    }
}
