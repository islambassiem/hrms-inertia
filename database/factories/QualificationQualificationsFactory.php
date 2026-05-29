<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Qualification\Models\EducationalSubLevel;
use App\Domain\Qualification\Models\GpaType;
use App\Domain\Qualification\Models\IncludedSpecialty;
use App\Domain\Qualification\Models\Qualification;
use App\Domain\Qualification\Models\Rating;
use App\Domain\Qualification\Models\ResearchType;
use App\Domain\Qualification\Models\ScientificDegree;
use App\Domain\Qualification\Models\Specialty;
use App\Domain\Qualification\Models\StudyType;
use App\Domain\Shared\Models\Country;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Qualification>
 */
#[UseModel(Qualification::class)]
final class QualificationQualificationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'major_id' => Specialty::factory(),
            'minor_id' => Specialty::factory(),
            'educational_sub_level_id' => EducationalSubLevel::factory(),
            'included_specialty_id' => IncludedSpecialty::factory(),
            'institution_name' => fake()->company(),
            'college_name' => fake()->lexify(),
            'scientific_degree_id' => ScientificDegree::factory(),
            'graduation_date' => fake()->date(),
            'graduation_country_id' => Country::factory(),
            'is_last_qualification' => fake()->boolean(),
            'rating_id' => Rating::factory(),
            'gpa' => (string) fake()->randomFloat(2, 0, 5),
            'gpa_type_id' => GpaType::factory(),
            'study_type_id' => StudyType::factory(),
            'city' => fake()->city(),
            'research_type_id' => ResearchType::factory(),
            'is_authenticated' => fake()->boolean(),
        ];
    }
}
