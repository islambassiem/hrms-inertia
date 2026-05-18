<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Sponsorship;
use Illuminate\Database\Seeder;

final class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            [
                'name' => [
                    'en' => 'Company A',
                    'ar' => 'الشركة أ',
                ],
                'code' => 'COMPANY_A',
            ],

            [
                'name' => [
                    'en' => 'Company B',
                    'ar' => 'الشركة ب',
                ],
                'code' => 'COMPANY_B',
            ],

            [
                'name' => [
                    'en' => 'Company C',
                    'ar' => 'الشركة ج',
                ],
                'code' => 'COMPANY_C',
            ],

        ];

        foreach ($sponsorships as $sponsorship) {
            Sponsorship::query()->create($sponsorship);
        }
    }
}
