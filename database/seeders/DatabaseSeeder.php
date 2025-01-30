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

        User::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '123456789',
            'user_type' => 'admin',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'address' => 'address',
            'phone_number' => '123456789',
        ]);
    }
}
