<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Support\Facades\Date;
use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Salary>
 */
#[UseModel(Salary::class)]
final class EmployeeSalaryFactory extends Factory
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
            'basic' => fake()->numberBetween(2000, 20000),
            'effective_from' => $effective = fake()->date(),
            'effective_to' => fake()->optional()->date(max: Date::parse($effective)->subDay()),
        ];
    }
}
