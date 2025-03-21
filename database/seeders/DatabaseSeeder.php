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
        // Use firstOrCreate to avoid duplicating the user
        User::firstOrCreate(
            ['username' => 'Astromic'], // Check if user with this username exists
            [   // If not, create a new one
                'email' => 'astromic@astromic.com',
                'password' => bcrypt('123456789'), // Ensure the password is hashed
                'user_type' => 'admin',
                'first_name' => 'Astromic',
                'last_name' => 'User',
                'address' => 'address',
                'phone_number' => '123456789',
            ]
        );

        // Seed the best sellers
        $this->call([
            UpdateBestSellersSeeder::class,
        ]);
    }
}