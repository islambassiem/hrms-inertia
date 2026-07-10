<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Allowance;
use App\Domain\Employee\Models\AllowanceType;
use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Seeder;

final class EmployeeAllowanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        $types = AllowanceType::query();

        foreach ($employees as $employee) {
            $allowances = $types->limit(fake()->numberBetween(1, 3))->get();
            foreach ($allowances as $allowance) {
                Allowance::factory()->create([
                    'employee_id' => $employee->id,
                    'allowance_type_id' => $allowance->id,
                ]);
            }
        }
    }
}
