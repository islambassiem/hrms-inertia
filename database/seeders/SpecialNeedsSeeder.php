<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Shared\Models\SpecialNeeds;
use Illuminate\Database\Seeder;

final class SpecialNeedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialNeeds = [
            [
                'name' => [
                    'en' => 'Wheelchair',
                    'ar' => 'كرسي متحرك',
                ],
                'code' => 'wheelchair',
            ],
            [
                'name' => [
                    'en' => 'Visual Impairment',
                    'ar' => 'ضعف بصري',
                ],
                'code' => 'visual_impairment',
            ],
            [
                'name' => [
                    'en' => 'Hearing Impairment',
                    'ar' => 'ضعف سمعي',
                ],
                'code' => 'hearing_impairment',
            ],
            [
                'name' => [
                    'en' => 'Speech Impairment',
                    'ar' => 'ضعف صوتي',
                ],
                'code' => 'speech_impairment',
            ],
            [
                'name' => [
                    'en' => 'Cognitive Impairment',
                    'ar' => 'ضعف إدراكي',
                ],
                'code' => 'cognitive_impairment',
            ],
            [
                'name' => [
                    'en' => 'Autism Spectrum Disorder',
                    'ar' => 'اضطراب طيف التوحد',
                ],
                'code' => 'autism_spectrum_disorder',
            ],
            [
                'name' => [
                    'en' => 'Other',
                    'ar' => 'أخرى',
                ],
                'code' => 'other',
            ],
        ];

        foreach ($specialNeeds as $need) {
            SpecialNeeds::query()->create($need);
        }
    }
}
