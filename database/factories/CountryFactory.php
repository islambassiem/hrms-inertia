<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Models\Country;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Country>
 */
#[UseModel(Country::class)]
final class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_en' => fake()->country(),
            'name_ar' => fake('ar')->country(),
            'code' => fake()->unique()->numberBetween(1, 100000000),
            'order' => fake()->numberBetween(1, 100),
            'lang' => 'en',
            'is_active' => fake()->boolean(),
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}
