<?php

namespace Database\Factories;

use App\Enums\PositionType;
use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->randomNumber(3),
            'position_en' => fake()->unique()->jobTitle(),
            'position_ar' => fake()->unique()->jobTitle(),
            'entity_id' => fake()->randomElement([Entity::inRandomOrder()->first()->id, null]),
            'type' => fake()->randomElement([fake()->randomElement(PositionType::toArray()), null]),
        ];
    }
}
