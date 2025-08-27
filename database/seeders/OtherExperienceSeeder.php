<?php

namespace Database\Seeders;

use App\Models\OtherExperience;
use Illuminate\Database\Seeder;

class OtherExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OtherExperience::factory(20)->create();
    }
}
