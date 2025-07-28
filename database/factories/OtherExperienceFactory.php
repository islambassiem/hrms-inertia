<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OtherExperience>
 */
class OtherExperienceFactory extends Factory
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
            'profession' => fake()->randomElement([null, fake()->jobTitle()]),
            'organization_name' => fake()->randomElement([null, fake()->company()]),
            'city' => fake()->randomElement([null, fake()->city()]),
            'country_id' => fake()->randomElement([null, Country::inRandomOrder()->first('id')->id]),
            'department' => fake()->randomElement([null, fake()->text(10)]),
            'section' => fake()->randomElement([null, fake()->text(10)]),
            'start_date' => fake()->randomElement([null, fake()->date()]),
            'end_date' => fake()->randomElement([null, fake()->date()]),
            'functional_tasks' => fake()->randomElement([null, fake()->text(100)]),
        ];
    }
}
