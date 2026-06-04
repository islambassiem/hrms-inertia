<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Workflow\Models\Workflow;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

use function sprintf;

/**
 * @extends Factory<Workflow>
 */
#[UseModel(Workflow::class)]
final class WorkflowFactory extends Factory
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
                'en' => fake()->lexify(),
                'ar' => fake()->lexify(),
            ],
            'reference_type_id' => ReferenceType::WORKFLOW->value,
            'code' => sprintf('W-%s', (string) fake()->unique()->bothify('###############')),
        ];
    }
}
