<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Leave\Models\SickLeaveRule;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SickLeaveRule>
 */
#[UseModel(SickLeaveRule::class)]
final class LeaveSickLeaveRuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => fake()->lexify(),
                'ar' => fake('ar')->lexify(),
            ],
            'no_of_days' => fake()->numberBetween(1, 30),
            'pay_rate' => fake()->randomElement([0, 25, 50, 75, 100]),
            'effective_from' => fake()->date(),
        ];
    }
}
