<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Dependent\Models\Relationship;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Relationship>
 */
#[UseModel(Relationship::class)]
final class RelationshipFactory extends Factory
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
            'reference_type_id' => ReferenceType::DEPENDENT_RELATIONSHIP->value,
            'code' => fake()->unique()->numberBetween(1, 100000000),
        ];
    }
}
