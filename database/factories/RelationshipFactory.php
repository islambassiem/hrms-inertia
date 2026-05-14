<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Models\Relationship;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Relationship>
 */
#[UseModel(Relationship::class)]
final class RelationshipFactory extends Factory
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
            'code' => fake()->unique()->numberBetween(1, 100000000),
        ];
    }
}
