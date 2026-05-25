<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Achievement\Models\Achievement;
use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Seeder;

final class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::factory(10)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
        ]);
    }
}
