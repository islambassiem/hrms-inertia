<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\AllowanceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AllowanceType>
 */
#[UseModel(AllowanceType::class)]
final class EmployeeAllowanceTypeFactory extends Factory
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
                'ar' => fake('ar')->word(),
                'en' => fake()->word(),
            ],
            'code' => fake()->word(),
        ];
    }
}
