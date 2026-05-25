<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Achievement\Models\Achievement;
use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Achievement>
 */
#[UseModel(Achievement::class)]
final class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'achievement_title' => fake()->sentence(),
            'achievement_year' => fake()->year(),
        ];
    }
}
