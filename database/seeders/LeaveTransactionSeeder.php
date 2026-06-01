<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Leave\Models\LeaveRequest;
use App\Domain\Leave\Models\LeaveTransaction;
use App\Domain\Leave\Models\LeaveType;
use Illuminate\Database\Seeder;

final class LeaveTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LeaveTransaction::factory(5000)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'leave_type_id' => fn () => LeaveType::query()->inRandomOrder()->value('id'),
            'leave_request_id' => fake()->randomElement([null, fn () => LeaveRequest::query()->inRandomOrder()->value('id')]),
        ]);
    }
}
