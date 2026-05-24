<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Organization\Models\AttributeType;
use Illuminate\Database\Seeder;

final class OrganizationAttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttributeType::factory(4)->create();
    }
}
