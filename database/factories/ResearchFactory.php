<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Employee\Models\Employee;
use App\Domain\Research\Models\Domain;
use App\Domain\Research\Models\Language;
use App\Domain\Research\Models\Nature;
use App\Domain\Research\Models\Research;
use App\Domain\Research\Models\Status;
use App\Domain\Research\Models\Type;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Research>
 */
#[UseModel(Research::class)]
final class ResearchFactory extends Factory
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
            'status_id' => Status::factory(),
            'type_id' => Type::factory(),
            'nature_id' => Nature::factory(),
            'domain_id' => Domain::factory(),
            'title' => fake()->text(),
            'publishing_date' => fake()->date(),
            'publisher' => fake()->company(),
            'isbn' => fake()->isbn13(),
            'magazine' => fake()->company(),
            'edition' => fake()->numberBetween(1, 10),
            'page_count' => fake()->numberBetween(200, 900),
            'publication_location' => fake()->country(),
            'summary' => fake()->sentences(5, true),
            'language_id' => Language::factory(),
            'publishing_url' => fake()->url(),
            'keywords' => fake()->words(5, true),
        ];
    }
}
