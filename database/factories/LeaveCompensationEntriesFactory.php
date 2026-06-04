<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Leave\Models\CompensationEntry;
use App\Domain\Leave\Models\LeaveRequest;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CompensationEntry>
 */
#[UseModel(CompensationEntry::class)]
final class LeaveCompensationEntriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leave_request_id' => LeaveRequest::factory(),
            'days' => fake()->numberBetween(1, 30),
            'compensation_rate' => fake()->randomElement([0, 25, 50, 75, 100]),
        ];
    }
}
