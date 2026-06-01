<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Workflow\Enums\WorkflowStatus;
use App\Domain\Workflow\Models\Approval;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

/**
 * @extends Factory<Approval>
 */
#[UseModel(Approval::class)]
final class WorkflowApprovalFactory extends Factory
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
            'approveable_type' => fake()->sentence(),
            'approveable_id' => fake()->numberBetween(),
            'approver_id' => fake()->numberBetween(),
            'role_id' => $role->id,
            'status' => fake()->randomElement(WorkflowStatus::cases()),
            'comment' => fake()->paragraph(),
        ];
    }
}
