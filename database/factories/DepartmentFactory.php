<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Organization\Enums\DepartmentType;
use App\Domain\Organization\Models\Department;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Department>
 */
#[UseModel(Department::class)]
final class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = DepartmentType::cases();

        return [
            'name' => [
                'en' => fake()->company(),
                'ar' => fake('ar')->company(),
            ],
            'code' => fake()->unique()->bothify('DEPT-###'),
            'type' => $types[array_rand($types)],
            'is_active' => (bool) random_int(0, 1),
            'parent_id' => null,
            'head_id' => null,
        ];
    }
}
