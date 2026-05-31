<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Leave\Enums\TransactionType;
use App\Domain\Leave\Models\LeaveRequest;
use App\Domain\Leave\Models\LeaveTransaction;
use App\Domain\Leave\Models\LeaveType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LeaveTransaction>
 */
#[UseModel(LeaveTransaction::class)]
final class LeaveTransactionsFactory extends Factory
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
            'leave_type_id' => LeaveType::factory(),
            'leave_request_id' => fake()->randomElement([null, LeaveRequest::factory()]),
            'transaction_type' => fake()->randomElement(TransactionType::cases()),
            'amount' => fake()->randomFloat(2, -30, 30),
        ];
    }
}
