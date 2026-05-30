<?php

declare(strict_types=1);

namespace Database\Seeders;

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
use Illuminate\Database\Seeder;

final class QualificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Qualification::factory(100)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'major_id' => fn () => Specialty::query()->inRandomOrder()->value('id'),
            'minor_id' => fn () => Specialty::query()->inRandomOrder()->value('id'),
            'educational_sub_level_id' => fn () => EducationalSubLevel::query()->inRandomOrder()->value('id'),
            'included_specialty_id' => fn () => IncludedSpecialty::query()->inRandomOrder()->value('id'),
            'scientific_degree_id' => fn () => ScientificDegree::query()->inRandomOrder()->value('id'),
            'graduation_country_id' => fn () => Country::query()->inRandomOrder()->value('id'),
            'rating_id' => fn () => Rating::query()->inRandomOrder()->value('id'),
            'gpa_type_id' => fn () => GpaType::query()->inRandomOrder()->value('id'),
            'study_type_id' => fn () => StudyType::query()->inRandomOrder()->value('id'),
            'research_type_id' => fn () => ResearchType::query()->inRandomOrder()->value('id'),
        ]);
    }
}
