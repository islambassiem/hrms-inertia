<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Research\Models\Domain;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use function sprintf;

/**
 * @extends Factory<Domain>
 */
#[UseModel(Domain::class)]
final class ResearchDomainFactory extends Factory
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
            'reference_type_id' => ReferenceType::RESEARCH_DOMAIN->value,
            'code' => sprintf('RD-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
