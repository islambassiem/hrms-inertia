<?php

namespace Database\Factories;

use App\Enums\GPAType;
use App\Enums\Qualification;
use App\Enums\Rating;
use App\Enums\StudyNature;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualification>
 */
class QualificationFactory extends Factory
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
            'qualification' => fake()->randomElement(Qualification::toArray()),
            'thesis' => fake()->randomElement([null, fake()->text(30)]),
            'major_id' => Specialty::inRandomOrder()->first('id')->id,
            'minor_id' => fake()->randomElement([null, Specialty::inRandomOrder()->first('id')->id]),
            'rating' => fake()->randomElement([null, fake()->randomElement(Rating::toArray())]),
            'gpa' => fake()->randomElement([null, fake()->randomFloat(2)]),
            'gpa_type' => fake()->randomElement([null, fake()->randomElement(GPAType::toArray())]),
            'graduation_university' => fake()->randomElement([null, fake()->company()]),
            'graduation_college' => fake()->randomElement([null, fake()->company()]),
            'graduation_date' => fake()->date(),
            'city' => fake()->randomElement([null, fake()->city()]),
            'graduation_country' => Country::inRandomOrder()->first('id')->id,
            'study_nature' => fake()->randomElement([null, fake()->randomElement(StudyNature::toArray())]),
            'is_attested' => fake()->boolean(90),
            'is_active' => fake()->boolean(70),
        ];
    }
}
