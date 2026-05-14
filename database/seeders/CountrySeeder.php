<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\Country;
use Illuminate\Database\Seeder;

final class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::factory(50)->create();
    }
}
