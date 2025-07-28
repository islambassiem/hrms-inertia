<?php

namespace Database\Factories;

use App\Enums\ResearchCitation;
use App\Enums\ResearchDomain;
use App\Enums\ResearchLanguage;
use App\Enums\ResearchNature;
use App\Enums\ResearchProgress;
use App\Enums\ResearchStatus;
use App\Enums\ResearchType;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Research>
 */
class ResearchFactory extends Factory
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
            'type' => fake()->randomElement([null, fake()->randomElement(ResearchType::toArray())]),
            'status' => fake()->randomElement([null, fake()->randomElement(ResearchStatus::toArray())]),
            'progress' => fake()->randomElement([null, fake()->randomElement(ResearchProgress::toArray())]),
            'nature' => fake()->randomElement([null, fake()->randomElement(ResearchNature::toArray())]),
            'domain' => fake()->randomElement([null, fake()->randomElement(ResearchDomain::toArray())]),
            'citation' => fake()->randomElement([null, fake()->randomElement(ResearchCitation::toArray())]),
            'language' => fake()->randomElement([null, fake()->randomElement(ResearchLanguage::toArray())]),
            'title' => fake()->randomElement([null, fake()->sentence()]),
            'publication_location' => fake()->randomElement([null, fake()->city()]),
            'publication_date' => fake()->randomElement([null, fake()->date()]),
            'publisher' => fake()->randomElement([null, fake()->company()]),
            'edition' => fake()->randomElement([null, fake()->randomNumber(2)]),
            'isbn' => fake()->randomElement([null, fake()->isbn13()]),
            'magazine' => fake()->randomElement([null, fake()->company()]),
            'publishing_url' => fake()->randomElement([null, fake()->url()]),
            'summary' => fake()->randomElement([null, fake()->sentence()]),
            'key_words' => fake()->randomElement([null, fake()->sentence()]),
            'pages_number' => fake()->randomElement([null, fake()->randomNumber(2)]),
        ];
    }
}
