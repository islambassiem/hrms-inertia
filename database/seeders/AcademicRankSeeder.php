<?php

namespace Database\Seeders;

use App\Models\AcademicRank;
use Illuminate\Database\Seeder;

class AcademicRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicRank::factory()->count(20)->create();
    }
}
