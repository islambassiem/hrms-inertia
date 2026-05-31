<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Research\Models\Type;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use function sprintf;

/**
 * @extends Factory<Type>
 */
#[UseModel(Type::class)]
final class ResearchTypeFactory extends Factory
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
            'reference_type_id' => ReferenceType::RESEARCH_TYPE->value,
            'code' => sprintf('RT-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
