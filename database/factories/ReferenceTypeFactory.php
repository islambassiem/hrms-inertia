<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Models\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ReferenceType>
 */
#[UseModel(ReferenceType::class)]
final class ReferenceTypeFactory extends Factory
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
            'filename' => fake()->word(),
        ];
    }
}
