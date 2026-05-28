<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Category;
use App\Domain\Employee\Models\Employee;
use App\Domain\Organization\Models\Department;
use App\Domain\Shared\Enums\ReferenceType;
use App\Domain\Shared\Models\Country;
use App\Domain\Shared\Models\ReferenceValue;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends Factory<Employee>
 */
#[UseModel(Employee::class)]
final class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'head_id' => null,
            'employee_code' => fake()->unique()->regexify('50[01][0-9]{3}'),

            'first_name_ar' => fake('ar')->firstName(),
            'middle_name_ar' => fake()->randomElement([null, fake('ar')->firstName()]),
            'third_name_ar' => fake()->randomElement([null, fake('ar')->firstName()]),
            'last_name_ar' => fake('ar')->lastName(),

            'first_name_en' => fake()->firstName(),
            'middle_name_en' => fake()->randomElement([null, fake()->firstName()]),
            'third_name_en' => fake()->randomElement([null, fake()->firstName()]),
            'last_name_en' => fake()->lastName(),

            'marital_status_id' => ReferenceValue::factory()->state(['reference_type_id' => ReferenceType::MARITAL_STATUS]),
            'religion_id' => ReferenceValue::factory()->state(['reference_type_id' => ReferenceType::RELIGION]),
            'special_needs_id' => ReferenceValue::factory()->state(['reference_type_id' => ReferenceType::SPECIAL_NEEDS]),

            'gender_id' => ReferenceValue::factory()->state(['reference_type_id' => ReferenceType::GENDER]),
            'category_id' => Category::factory(),
            'department_id' => Department::factory(),
            'nationality_id' => Country::factory(),
            'place_of_birth' => Country::query()->inRandomOrder()->value('id') ?? Country::factory(),

            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->numerify('5########'),
            'image' => $this->faker->optional(0.5)->passthrough(
                UploadedFile::fake()->image('avatar.jpg')
            ),

            'date_of_birth' => fake()->date(),
            'joining_date' => fake()->date(),
            'leaving_date' => fake()->date(),

            'home_telephone_number' => fake()->randomElement([null, fake()->phoneNumber()]),
            'home_country_identity' => fake()->randomElement([null, fake()->numerify('##########')]),
            'blood_type' => fake()->bloodGroup(),

            'is_active' => fake()->boolean(70),
        ];
    }
}
