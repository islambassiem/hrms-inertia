<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeBank;
use App\Domain\Shared\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmployeeBank>
 */
#[UseModel(EmployeeBank::class)]
class EmployeeBankFactory extends Factory
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
            'bank_id' => Bank::factory(),
            'iban' => fake()->iban(),
        ];
    }
}
