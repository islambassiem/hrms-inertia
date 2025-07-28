<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\College>
 */
class CollegeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::inRandonOrder()->first()->id ?? 1,
            'code' => fake()->unique()->text(6),
            'college_en' => fake()->unique()->company(),
            'college_ar' => fake()->unique()->company(),
        ];
    }
}
