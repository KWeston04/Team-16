<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Vortex Runner',
                'description' => 'High-performance running shoes.',
                'price' => 120.00,
                'image_url' => 'images/shoes-Vortex_Runner_main.webp',
                'category_id' => 4, // Shoes category
                'stock_status' => 'in_stock',
                'discounted' => false,
                'quantity' => 10
            ],
            [
                'name' => 'Sweat Hoodie Mens',
                'description' => 'Comfortable hoodie for everyday wear.',
                'price' => 29.99,
                'image_url' => 'images/shirts-Hoodie(main).webp',
                'category_id' => 1, // Shirts category
                'stock_status' => 'in_stock',
                'discounted' => false,
                'quantity' => 15
            ],
            [
                'name' => 'Away Football Shirt',
                'description' => 'Official away football team shirt.',
                'price' => 39.99,
                'image_url' => 'images/shirt-Awayfoortball(main).webp',
                'category_id' => 1, // Shirts category
                'stock_status' => 'in_stock',
                'discounted' => false,
                'quantity' => 8
            ],
            [
                'name' => 'Away Football Shorts',
                'description' => 'Matching shorts for the away football kit.',
                'price' => 19.99,
                'image_url' => 'images/shorts-awayfootball(main).webp',
                'category_id' => 3, // Shorts category
                'stock_status' => 'in_stock',
                'discounted' => false,
                'quantity' => 12
            ],
        ]);
    }
}