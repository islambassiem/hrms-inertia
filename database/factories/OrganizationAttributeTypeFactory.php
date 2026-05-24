<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Organization\Models\AttributeType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AttributeType>
 */
#[UseModel(AttributeType::class)]
final class OrganizationAttributeTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'ar' => fake('ar')->word(),
                'en' => fake()->word(),
            ],
            'code' => (string) fake()->unique()->numberBetween(10, 100000000),
        ];
    }
}
