<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Course\Models\Course;
use App\Domain\Course\Models\Type;
use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Country;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
#[UseModel(Course::class)]
final class CourseFactory extends Factory
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
            'course_name' => fake()->words(asText: true),
            'type_id' => Type::factory(),
            'issuer' => fake()->company(),
            'awarding_year' => fake()->year(),
            'course_period' => fake()->lexify('?????'),
            'city' => fake()->city(),
            'country_id' => Country::factory(),
        ];
    }
}
