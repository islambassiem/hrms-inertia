<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domain\Employee\Models\Employee;
use App\Domain\Research\Models\Domain;
use App\Domain\Research\Models\Language;
use App\Domain\Research\Models\Nature;
use App\Domain\Research\Models\Research;
use App\Domain\Research\Models\Status;
use App\Domain\Research\Models\Type;
use Illuminate\Database\Seeder;

final class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Research::factory(100)->create([
            'employee_id' => fn () => Employee::query()->inRandomOrder()->value('id'),
            'status_id' => fn () => Status::query()->inRandomOrder()->value('id'),
            'type_id' => fn () => Type::query()->inRandomOrder()->value('id'),
            'nature_id' => fn () => Nature::query()->inRandomOrder()->value('id'),
            'domain_id' => fn () => Domain::query()->inRandomOrder()->value('id'),
            'language_id' => fn () => Language::query()->inRandomOrder()->value('id'),
        ]);
    }
}
