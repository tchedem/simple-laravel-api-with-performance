<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {

            for ($i = 0; $i < 100; $i++) {
                \App\Models\Post::create([
                    'user_id' => $user->id,
                    'title' => fake()->sentence(),
                    'body' => fake()->paragraph(),
                ]);
            }

        }

    }
}
