<?php

namespace Database\Seeders;

use App\Models\AcademicExperience;
use Illuminate\Database\Seeder;

class AcademicExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicExperience::factory()->count(20)->create();
    }
}
