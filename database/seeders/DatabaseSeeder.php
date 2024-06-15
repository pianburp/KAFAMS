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
            'name' => 'User',
            'email' => 'test@example.com',
            'password'=> bcrypt('test'),
        ]);
        
        Programs::factory()->create([
            'program_name' => 'Having Wudhu',
            'program_description' => 'A detailed session on having wudhu for Standard 1 students.',
            'program_status' => false,  
            'program_date' => now()->toDateString()
        ]);
    }
}