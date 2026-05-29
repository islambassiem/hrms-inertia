<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Qualification\Models\EducationalSubLevel;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EducationalSubLevel>
 */
#[UseModel(EducationalSubLevel::class)]
final class QualificationEducationalSubLevelFactory extends Factory
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
            'reference_type_id' => ReferenceType::QUALIFICATION_EDUCATIONAL_SUB_LEVEL,
            'code' => fake()->unique()->numberBetween(1, 100000000),
        ];
    }
}
