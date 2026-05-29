<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Qualification\Models\SpecialtyCategory;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<SpecialtyCategory>
 */
#[UseModel(SpecialtyCategory::class)]
final class QualificationSpecialtyCategoryFactory extends Factory
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
            'parent_id' => null,
            'code' => Str::random(5),
        ];
    }
}
