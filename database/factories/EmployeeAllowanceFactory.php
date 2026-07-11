<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Allowance;
use App\Domain\Employee\Models\AllowanceType;
use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends Factory<Allowance>
 */
#[UseModel(Allowance::class)]
final class EmployeeAllowanceFactory extends Factory
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
            'allowance_type_id' => AllowanceType::factory(),
            'amount' => fake()->numberBetween(200, 2000),
            'effective_from' => $effective = fake()->date(),
            'effective_to' => fake()->optional()->date(max: Date::parse($effective)->subDay()),
        ];
    }
}
