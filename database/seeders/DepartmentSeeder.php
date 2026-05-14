<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Organization\Models\Department;
use Illuminate\Database\Seeder;

final class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory(15)->create();
        Department::factory()->create([
            'type' => DepartmentType::DEPARTMENT,
        ]);
        $departments = Department::all();

        foreach ($departments as $department) {
            $parent = $departments->random();
            $department->parent_id = $parent->id;
            $department->save();
        }
    }
}
