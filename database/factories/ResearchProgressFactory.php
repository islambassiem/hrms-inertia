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
            'name_ar' => fake('ar')->lexify(),
            'name_en' => fake()->lexify(),
            'reference_type_id' => ReferenceType::RESEARCH_PROGRESS,
            'code' => sprintf('RP-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
