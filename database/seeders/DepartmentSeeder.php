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

        foreach ($departments as $index => $department) {
            if ($index === 0) {
                $department->update([
                    'parent_id' => null,
                ]);
                continue;
            }

            $parent = $departments
                ->take($index)
                ->random();

            $department->update([
                'parent_id' => $parent->id,
            ]);
        }
    }
}
