<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Leave\Models\LeaveType;
use App\Domain\Leave\Models\Policy;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Policy>
 */
#[UseModel(Policy::class)]
final class LeavePolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leave_type_id' => LeaveType::factory(),
            'name' => [
                'en' => fake()->lexify('Leave Policy ?'),
                'ar' => fake('ar')->lexify('Leave Policy ?'),
            ],
            'is_default' => fake()->boolean(),
            'days_per_year' => fake()->randomElement([21, 30]),
            'accrual_frequency' => fake()->optional()->randomElement([1, 2]),
            'max_carry_forward' => fake()->optional()->numberBetween(1, 10),
            'carry_forward_expiry_months' => fake()->optional()->numberBetween(1, 12),
        ];
    }
}
