<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Research\Models\Progress;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use function sprintf;

/**
 * @extends Factory<Progress>
 */
#[UseModel(Progress::class)]
final class ResearchProgressFactory extends Factory
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
            'reference_type_id' => ReferenceType::RESEARCH_PROGRESS->value,
            'code' => sprintf('RP-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
