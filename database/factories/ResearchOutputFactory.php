<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Research\Models\Output;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use function sprintf;

/**
 * @extends Factory<Output>
 */
#[UseModel(Output::class)]
final class ResearchOutputFactory extends Factory
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
            'reference_type_id' => ReferenceType::RESEARCH_OUTPUT,
            'code' => sprintf('RO-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
