<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeLeavePolicyAssignment;
use App\Domain\Leave\Models\Policy;
use Illuminate\Database\Seeder;

final class EmployeeLeavePolicyAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeLeavePolicyAssignment::factory(100)->create([
            'employee_id' => Employee::query()->inRandomOrder()->value('id'),
            'policy_id' => Policy::query()->inRandomOrder()->value('id'),
        ]);
    }
}
