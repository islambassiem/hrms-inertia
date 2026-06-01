<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Workflow\Models\Step;
use App\Domain\Workflow\Models\Workflow;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

final class WorkflowStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Step::factory(10)->create([
            'workflow_id' => fn () => Workflow::query()->inRandomOrder()->value('id'),
            'role_id' => fn () => Role::query()->inRandomOrder()->value('id'),
        ]);
    }
}
