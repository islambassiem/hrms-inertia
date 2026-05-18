<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Sponsorship;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sponsorship>
 */
#[UseModel(Sponsorship::class)]
final class SponsorshipFactory extends Factory
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
                'ar' => fake('ar')->lexify(),
                'en' => fake()->lexify(),
            ],
            'code' => fake()->unique()->numberBetween(1, 100000000),
        ];
    }
}
