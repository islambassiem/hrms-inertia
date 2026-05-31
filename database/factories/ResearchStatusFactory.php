<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Research\Models\Status;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use function sprintf;

/**
 * @extends Factory<Status>
 */
#[UseModel(Status::class)]
final class ResearchStatusFactory extends Factory
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
            'reference_type_id' => ReferenceType::RESEARCH_STATUS->value,
            'code' => sprintf('RST-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
