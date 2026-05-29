<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Qualification\Models\Specialty;
use App\Domain\Qualification\Models\SpecialtyCategory;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Specialty>
 */
#[UseModel(Specialty::class)]
final class QualificationSpecialtyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_en' => fake()->lexify('?????'),
            'name_ar' => fake('ar')->lexify('?????'),
            'category_id' => SpecialtyCategory::factory(),
            'code' => Str::random(5),
        ];
    }
}
