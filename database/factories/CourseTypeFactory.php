<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Course\Models\CourseType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CourseType>
 */
#[UseModel(CourseType::class)]
final class CourseTypeFactory extends Factory
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
            'code' => fake()->unique()->bothify('CT###'),
        ];
    }
}
