<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\Gender;
use Illuminate\Database\Seeder;

final class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::query()->create([
            'name' => [
                'en' => 'Male',
                'ar' => 'ذكر',
            ],
            'code' => '1',
        ]);

        Gender::query()->create([
            'name' => [
                'en' => 'Female',
                'ar' => 'انثى',
            ],
            'code' => '2',
        ]);
    }
}
