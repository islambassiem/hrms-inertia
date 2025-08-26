<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use App\Enums\Religion;
use App\Enums\SpecialNeeds;
use App\Enums\VacationClass;
use App\Models\Country;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id')->toArray();

        return [
            'first_name_en' => fake('en')->firstName(),
            'middle_name_en' => fake('en')->randomElement([null, fake('en')->firstName()]),
            'third_name_en' => fake('en')->randomElement([null, fake('en')->firstName()]),
            'family_name_en' => fake('en')->lastName(),
            'first_name_ar' => fake('ar')->firstName(),
            'middle_name_ar' => fake('ar')->randomElement([null, fake('ar')->firstName()]),
            'third_name_ar' => fake('ar')->randomElement([null, fake('ar')->firstName()]),
            'family_name_ar' => fake('ar')->lastName(),
            'gender' => fake()->randomElement(Gender::toArray()),
            'marital_status' => fake()->randomElement([fake()->randomElement(MaritalStatus::toArray()), null]),
            'nationality_id' => Country::inRandomOrder()->first()->id,
            'religion' => fake()->randomElement(Religion::toArray()),
            'home_country_id' => fake()->regexify('[0-9]{10}'),
            'date_of_birth' => fake()->date(),
            'place_of_birth' => Country::inRandomOrder()->first()->id,

            'user_id' => fake()->unique()->randomElement($users),
            'code' => fake()->unique()->numberBetween(500001, 501999),
            'head_id' => null,
            'is_active' => fake()->boolean(70),
            'has_salary' => fake()->boolean(70),
            'has_biometric' => fake()->boolean(70),
            'works_on_saturday' => fake()->boolean(30),
            'joining_date' => fake()->date(),
            'resignation_date' => fake()->randomElement([null, fake()->date()]),
            'sponsorship_id' => Sponsorship::inRandomOrder()->first()->id,
            'has_married_contract' => fake()->boolean(30),
            'vacation_class' => fake()->randomElement(VacationClass::toArray()),
            'special_needs' => fake()->randomElement([null, fake()->randomElement(SpecialNeeds::toArray())]),
        ];
    }
}
