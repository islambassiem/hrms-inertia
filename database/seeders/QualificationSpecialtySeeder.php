<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Qualification\Models\Specialty;
use App\Domain\Qualification\Models\SpecialtyCategory;
use Illuminate\Database\Seeder;

final class QualificationSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialty::factory(400)->create([
            'category_id' => SpecialtyCategory::query()->inRandomOrder()->first()?->id,
        ]);
    }
}
