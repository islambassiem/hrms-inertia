<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeLeavePolicyAssignment;
use App\Domain\Leave\Models\Policy;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmployeeLeavePolicyAssignment>
 */
#[UseModel(EmployeeLeavePolicyAssignment::class)]
final class EmployeeLeavePolicyAssignmentFactory extends Factory
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
            'policy_id' => Policy::factory(),
            'start_date' => $startDate = fake()->date(),
            'end_date' => fake()->dateTimeBetween($startDate, '+2 years')->format('Y-m-d'),
        ];
    }
}
