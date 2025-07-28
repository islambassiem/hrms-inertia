<?php

namespace Database\Factories;

use App\Enums\IdentificationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Identification>
 */
class IdentificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => 1,
            'type' => fake()->randomElement(IdentificationType::toArray()),
            'id_number' => fake()->regexify('[0-9]{10}'),
            'place_of_issue' => fake()->randomElement([null, fake()->city()]),
            'date_of_issue' => fake()->randomElement([null, fake()->date()]),
            'date_of_expiry' => fake()->date(),
        ];
    }
}
