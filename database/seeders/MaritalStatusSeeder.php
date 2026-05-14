<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\MaritalStatus;
use Illuminate\Database\Seeder;

final class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaritalStatus::query()->create([
            'name' => [
                'en' => 'Single',
                'ar' => 'أعزب',
            ],
            'code' => '1',
        ]);

        MaritalStatus::query()->create([
            'name' => [
                'en' => 'Married',
                'ar' => 'متزوج',
            ],
            'code' => '2',
        ]);

        MaritalStatus::query()->create([
            'name' => [
                'en' => 'Other',
                'ar' => 'آخر',
            ],
            'code' => '9',
        ]);
    }
}
