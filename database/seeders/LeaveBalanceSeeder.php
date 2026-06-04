<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Leave\Models\Balance;
use Illuminate\Database\Seeder;

final class LeaveBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        foreach ($employees as $employee) {
            Balance::factory()->create([
                'employee_id' => $employee->id,
            ]);
        }
    }
}
