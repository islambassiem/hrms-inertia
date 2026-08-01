<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeBank;
use App\Domain\Shared\Models\Bank;
use Illuminate\Database\Seeder;

class EmployeeBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeeIds = Employee::query()->pluck('id')->toArray();

        foreach ($employeeIds as $employeeId) {
            EmployeeBank::factory()->create([
                'employee_id' => $employeeId,
                'bank_id' => fn () => Bank::query()->inRandomOrder()->value('id'),
            ]);
        }
    }
}
