<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            'admin',
            'hr',
            'head',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

        User::where('username', 'admin')->firstOrFail()->assignRole('admin');
        User::where('username', 'hr')->firstOrFail()->assignRole('hr');
        User::where('username', 'head')->firstOrFail()->assignRole('head');
    }
}
