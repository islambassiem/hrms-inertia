<?php

namespace Database\Factories;

use App\Enums\CourseType;
use App\Models\Country;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'name' => fake()->text(50),
            'status' => fake()->randomElement(CourseType::toArray()),
            'issuer' => fake()->text(50),
            'date_of_issue' => fake()->date(),
            'period' => fake()->text(10),
            'city' => fake()->randomElement([null, fake()->city()]),
            'country_id' => Country::inRandomOrder()->first('id')->id,
        ];
    }
}
