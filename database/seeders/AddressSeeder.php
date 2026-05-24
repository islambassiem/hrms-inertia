<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Address\Models\Address;
use App\Domain\Employee\Models\Employee;
use Illuminate\Database\Seeder;

final class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::factory(100)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
        ]);
    }
}
