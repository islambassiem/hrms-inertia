<?php

namespace Database\Factories;

use App\Enums\AcademicRank;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicRank>
 */
class AcademicRankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::inRandomOrder()->first('id')->id,
            'academic_rank' => fake()->randomElement(AcademicRank::toArray()),
            'effective_date' => fake()->date(),
            'end_date' => fake()->randomElement([null, fake()->date()]),
        ];
    }
}
