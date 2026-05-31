<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\MaritalStatus;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MaritalStatus>
 */
#[UseModel(MaritalStatus::class)]
final class MaritalStatusFactory extends Factory
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
                'ar' => fake('ar')->lexify(),
                'en' => fake()->lexify(),
            ],
            'reference_type_id' => ReferenceType::SHARED_MARITAL_STATUS->value,
            'code' => fake()->unique()->numberBetween(1, 100000000),
        ];
    }
}
