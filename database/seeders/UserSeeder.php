<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@admin.com',
            ],
            [
                'username' => 'hr',
                'email' => 'hr@hr.com',
            ],
            [
                'username' => 'head',
                'email' => 'head@head.com',
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
