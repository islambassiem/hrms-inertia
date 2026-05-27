<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Models\ReferenceType;
use App\Domain\Shared\Models\ReferenceValue;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ReferenceValue>
 */
#[UseModel(ReferenceValue::class)]
final class ReferenceValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_ar' => fake('ar')->word(),
            'name_en' => fake()->word(),
            'code' => (string) fake()->numberBetween(),
            'reference_type_id' => ReferenceType::factory(),
        ];
    }
}
