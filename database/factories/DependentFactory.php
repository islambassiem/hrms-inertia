<?php

namespace Database\Factories;

use App\Enums\FamilyRelationship;
use App\Enums\Gender;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dependent>
 */
class DependentFactory extends Factory
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
            'name' => fake()->name(),
            'identification' => fake()->regexify('[0-9]{10}'),
            'gender' => fake()->randomElement(Gender::toArray()),
            'date_of_birth' => fake()->date(),
            'relationship' => fake()->randomElement(FamilyRelationship::toArray()),
        ];
    }
}
