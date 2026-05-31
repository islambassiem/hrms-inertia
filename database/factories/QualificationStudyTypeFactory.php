<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Qualification\Models\StudyType;
use App\Domain\Shared\Enums\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudyType>
 */
#[UseModel(StudyType::class)]
final class QualificationStudyTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'ar' => fake('ar')->lexify(),
                'en' => fake()->lexify(),
            ],
            'reference_type_id' => ReferenceType::QUALIFICATION_STUDY_TYPE->value,
            'code' => (string) fake()->unique()->numberBetween(10, 100000000),
        ];
    }
}
