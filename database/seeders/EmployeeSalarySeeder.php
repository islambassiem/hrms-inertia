<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\Salary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

final class EmployeeSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();

        $date = fake()->date();

        foreach ($employees as $employee) {
            Salary::factory()->create([
                'employee_id' => $employee->id,
                'effective_from' => fake()->date(max: Date::parse($date)->subDay()),
                'effective_to' => $date,
            ]);
            Salary::factory()->create([
                'employee_id' => $employee->id,
                'effective_to' => null,
            ]);
        }
    }
}
