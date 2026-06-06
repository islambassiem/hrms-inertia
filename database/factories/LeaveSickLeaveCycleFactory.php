<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Leave\Models\SickLeaveCycle;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends Factory<SickLeaveCycle>
 */
#[UseModel(SickLeaveCycle::class)]
final class LeaveSickLeaveCycleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Date::parse(fake()->date());

        return [
            'employee_id' => Employee::factory(),
            'start_date' => $startDate->toDateString(),
            'end_date' => $startDate->copy()->addYears(1)->subDay()->toDateString(),
            'used_days' => fake()->numberBetween(0, 30),
        ];
    }
}
