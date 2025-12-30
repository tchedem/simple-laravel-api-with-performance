<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = [
            'id' => "dc3aaee9-f66d-410c-984a-796467907157",
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            // 'is_admin' => true,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ];

        $checkAdminUser = \App\Models\User::where('email', $admin['email'])->first();

        if (!$checkAdminUser) {
            // Create the admin User
            \App\Models\User::create($admin);
        }

        \App\Models\User::factory(10)->create();

    }
}
