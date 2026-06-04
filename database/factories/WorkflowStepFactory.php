<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Workflow\Models\Step;
use App\Domain\Workflow\Models\Workflow;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

/**
 * @extends Factory<Step>
 */
#[UseModel(Step::class)]
final class WorkflowStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = Role::create(['name' => fake()->lexify('??????????'), 'guard_name' => 'web']);

        return [
            'workflow_id' => Workflow::factory(),
            'name' => [
                'en' => fake()->lexify('?????'),
                'ar' => fake()->lexify('?????'),
            ],
            'description' => [
                'en' => fake()->sentence(),
                'ar' => fake()->sentence(),
            ],
            'step_order' => fake()->randomDigit(),
            'role_id' => $role->id,
        ];
    }
}
