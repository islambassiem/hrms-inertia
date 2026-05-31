<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Leave\Enums\LeaveStatus;
use App\Domain\Leave\Models\LeaveRequest;
use App\Domain\Leave\Models\LeaveType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LeaveRequest>
 */
#[UseModel(LeaveRequest::class)]
final class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = now()->subYear()->addDays(random_int(0, 365))->startOfDay();
        $endDate = $startDate->copy()->addDays(random_int(1, 30))->startOfDay();

        return [
            'employee_id' => Employee::factory(),
            'leave_type_id' => LeaveType::factory(),
            'start_date' => $startDate->toDateString(),
            'end_date' => $endDate->toDateString(),
            'total_days' => (int) $startDate->diffInDays($endDate) + 1,
            'status' => fake()->randomElement(LeaveStatus::cases()),
            'reason' => fake()->sentence(),
        ];
    }
}
