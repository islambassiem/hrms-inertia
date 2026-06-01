<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Workflow\Models\Approval;
use Illuminate\Database\Seeder;

final class WorkflowApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Approval::factory(500)->create();
    }
}
