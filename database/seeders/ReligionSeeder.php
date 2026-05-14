<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\Religion;
use Illuminate\Database\Seeder;

final class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Religion::query()->create([
            'name' => [
                'en' => 'Islam',
                'ar' => 'الإسلام',
            ],
            'code' => '1',
        ]);

        Religion::query()->create([
            'name' => [
                'en' => 'Christianity',
                'ar' => 'المسيحية',
            ],
            'code' => '2',
        ]);

        Religion::query()->create([
            'name' => [
                'en' => 'Hinduism',
                'ar' => 'الهندوسية',
            ],
            'code' => '3',
        ]);

        Religion::query()->create([
            'name' => [
                'en' => 'Buddhism',
                'ar' => 'البوذية',
            ],
            'code' => '4',
        ]);

        Religion::query()->create([
            'name' => [
                'en' => 'Judaism',
                'ar' => 'اليهودية',
            ],
            'code' => '5',
        ]);

        Religion::query()->create([
            'name' => [
                'en' => 'Sikhism',
                'ar' => 'السيخية',
            ],
            'code' => '6',
        ]);

        Religion::query()->create([
            'name' => [
                'en' => 'Other',
                'ar' => 'أخرى',
            ],
            'code' => '7',
        ]);
    }
}
