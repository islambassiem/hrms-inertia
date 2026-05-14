<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
            ],
            [
                'name' => 'hr',
                'email' => 'hr@hr.com',
            ],
            [
                'name' => 'head',
                'email' => 'head@head.com',
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
