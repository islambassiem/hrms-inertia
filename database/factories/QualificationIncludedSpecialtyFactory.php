<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Domain\Qualification\Models\IncludedSpecialty;
use Illuminate\Database\Eloquent\Factories\Attributes\UseModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<IncludedSpecialty>
 */
#[UseModel(IncludedSpecialty::class)]
final class QualificationIncludedSpecialtyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_en' => fake()->lexify(),
            'name_ar' => fake('ar')->lexify(),
            'code' => Str::random(),
        ];
    }
}
