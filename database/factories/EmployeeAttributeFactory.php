<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Organization\Models\Attribute;
use App\Domain\Organization\Models\EmployeeAttribute;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmployeeAttribute>
 */
#[UseModel(EmployeeAttribute::class)]
final class EmployeeAttributeFactory extends Factory
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
            'attribute_id' => Attribute::factory(),
            'start_date' => $start_date = fake()->dateTime(),
            'end_date' => fake()->optional()->dateTimeBetween($start_date, '+ 3 years'),
        ];
    }
}
