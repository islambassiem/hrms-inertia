<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Course\Models\Type;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Type>
 */
#[UseModel(Type::class)]
final class CourseTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_ar' => fake('ar')->lexify(),
            'name_en' => fake()->lexify(),
            'reference_type_id' => ReferenceType::COURSE_TYPE,
            'code' => fake()->unique()->bothify('CT###'),
        ];
    }
}
