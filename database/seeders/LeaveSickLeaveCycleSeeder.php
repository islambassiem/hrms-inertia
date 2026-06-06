<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Leave\Models\SickLeaveCycle;
use Illuminate\Database\Seeder;

final class LeaveSickLeaveCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SickLeaveCycle::factory(100)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
        ]);
    }
}
