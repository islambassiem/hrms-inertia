<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\College;
use App\Models\Department;
use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DepartmentHierarchy>
 */
class DepartmentHierarchyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => fake()->randomElement([Branch::inRandomOrder()->first()->id, null]),
            'college_id' => fake()->randomElement([College::inRandomOrder()->first()->id, null]),
            'department_id' => Department::inRandomOrder()->first()->id,
            'entity_id' => fake()->randomElement([Entity::inRandomOrder()->first()->id, null]),
        ];
    }
}
