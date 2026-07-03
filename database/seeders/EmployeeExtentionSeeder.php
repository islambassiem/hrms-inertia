<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Employee\Models\EmployeeExtention;
use Illuminate\Database\Seeder;

final class EmployeeExtentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeExtention::factory(150)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'extention' => fn (): int => fake()->randomNumber(3, true),
        ]);
    }
}
