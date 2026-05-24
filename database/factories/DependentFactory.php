<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Dependent\Models\Dependent;
use App\Domain\Employee\Models\Employee;
use App\Domain\Shared\Models\Gender;
use App\Domain\Shared\Models\Relationship;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Dependent>
 */
#[UseModel(Dependent::class)]
final class DependentFactory extends Factory
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
            'name_en' => fake()->name(),
            'name_ar' => fake('ar')->name(),
            'identification' => fake()->numerify('##########'),
            'gender_id' => Gender::factory(),
            'date_of_birth' => fake()->date(),
            'relationship_id' => Relationship::factory(),
            'has_insurance' => (bool) random_int(0, 1),
            'ticket_ratio' => fake()->numberBetween(0, 100),
        ];
    }
}
