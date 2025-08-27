<?php

namespace Database\Seeders;

use App\Models\DepartmentHierarchy;
use Illuminate\Database\Seeder;

class DepartmentHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentHierarchy::factory()
            ->count(20)
            ->create();
    }
}
