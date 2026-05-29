<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Qualification\Models\IncludedSpecialty;
use Illuminate\Database\Seeder;

final class QualificationIncludedSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IncludedSpecialty::factory(100)->create();
    }
}
