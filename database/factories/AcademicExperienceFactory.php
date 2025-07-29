<?php

namespace Database\Factories;

use App\Enums\AcademicRank;
use App\Enums\AccomodationStatus;
use App\Enums\AppointmentType;
use App\Enums\EmploymentStatus;
use App\Enums\JobNature;
use App\Enums\ProfessionalRank;
use App\Models\City;
use App\Models\Employee;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\Section;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicExperience>
 */
class AcademicExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::inRandomOrder()->first('id')->id,
            'position' => fake()->jobTitle(),
            'institution_id' => Institution::inRandomOrder()->first('id')->id,
            'city_id' => City::inRandomOrder()->first('id')->id,
            'faculty_id' => Faculty::inRandomOrder()->first('id')->id,
            'section_id' => Section::inRandomOrder()->first('id')->id,
            'major_id' => Specialty::inRandomOrder()->first('id')->id,
            'minor_id' => Specialty::inRandomOrder()->first('id')->id,
            'employment_number' => fake()->unique()->numerify('######'),
            'academic_rank' => fake()->randomElement(AcademicRank::toArray()),
            'professional_rank' => fake()->randomElement(ProfessionalRank::toArray()),
            'hiring_date' => fake()->date(),
            'joining_date' => fake()->date(),
            'resignation_date' => fake()->date(),
            'appointment_type' => fake()->randomElement(AppointmentType::toArray()),
            'employment_status' => fake()->randomElement(EmploymentStatus::toArray()),
            'tasks' => fake()->text(),
            'job_nature' => fake()->randomElement(JobNature::toArray()),
            'accommodation_status' => fake()->randomElement(AccomodationStatus::toArray()),
        ];
    }
}
