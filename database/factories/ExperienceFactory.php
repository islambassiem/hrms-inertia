<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Experience\Models\Experience;
use App\Domain\Shared\Models\Country;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Experience>
 */
#[UseModel(Experience::class)]
final class ExperienceFactory extends Factory
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
            'position' => fake()->jobTitle(),
            'organization' => fake()->company(),
            'city' => fake()->city(),
            'country_id' => Country::factory(),
            'department' => fake()->lexify('?????'),
            'section' => fake()->lexify('?????'),
            'start_date' => $start_date = fake()->date(),
            'end_date' => fake()->randomElement([null, fake()->dateTimeBetween($start_date, '+5 years')]),
            'tasks' => fake()->realText(400),
        ];
    }
}
