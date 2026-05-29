<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Qualification\Models\SpecialtyCategory;
use Illuminate\Database\Seeder;

final class QualificationSpecialtyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpecialtyCategory::factory(10)->create();

        $specialties = SpecialtyCategory::query()->limit(6)->get();

        foreach ($specialties as $specialty) {
            /** @var SpecialtyCategory $parent */
            $parent = $specialties->random();
            $specialty->update([
                'parent_id' => $parent->id,
            ]);
        }
    }
}
