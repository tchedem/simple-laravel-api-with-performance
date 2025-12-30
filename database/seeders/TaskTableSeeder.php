<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {

            for ($i = 0; $i < 10; $i++) {
                \App\Models\Task::create([
                    'id' => \Illuminate\Support\Str::uuid()->toString(),
                    'title' => fake()->sentence(),
                    'description' => fake()->sentence(),
                    'assigned_to' => $user->id,
                    'user_id' => $user->id,
                ]);
            }

        }
    }
}
