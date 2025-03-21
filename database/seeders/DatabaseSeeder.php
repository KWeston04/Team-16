<?php

namespace Database\Seeders;

use App\Models\User;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'Astromic',
            'email' => 'astromic@astromic.com',
            'password' => '123456789',
            'user_type' => 'admin',
            'first_name' => 'Astromic',
            'last_name' => 'User',
            'address' => 'address',
            'phone_number' => '123456789',
        ]);
    }
}
