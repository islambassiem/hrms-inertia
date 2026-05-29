<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Organization\Models\Attribute;
use App\Domain\Organization\Models\EmployeeAttribute;
use Illuminate\Database\Seeder;

final class EmployeeAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeAttribute::factory(100)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'attribute_id' => Attribute::query()->inRandomOrder()->value('id'),
        ]);
    }
}
