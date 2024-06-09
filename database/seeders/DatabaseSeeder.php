<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Programs;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=> bcrypt('masammanis1234'),
        ]);
        Programs::factory()->create([
            'program_name' => 'Having Wundhu',
            'program_description' => 'A detailed session on having wudhu.',
            'program_status' => true,  // Set to true for active
            'program_date' => now()->toDateString()
        ]);

        Programs::factory()->count(10)->create();
    }
}
