<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Organization\Models\EmployeeAttribute;
use Illuminate\Database\Seeder;

final class EmployeeAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeAttribute::factory(100)->create();
    }
}
