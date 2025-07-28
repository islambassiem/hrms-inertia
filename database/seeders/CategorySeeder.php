<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create();

        $employees = Employee::all(['id']);
        foreach ($employees as $employee) {
            $employee->categories()->attach(Category::all(['id'])->random(1)->pluck('id'));
        }
    }
}
