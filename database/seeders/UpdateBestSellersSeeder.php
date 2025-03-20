<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateBestSellersSeeder extends Seeder
{
    public function run()
    {
        // Example product IDs (replace with actual IDs you want to mark as best sellers)
        $productIds = [10, 20, 30, 40]; // Replace with actual product IDs

        // Update the products table to set 'is_best_seller' to 1 for these products
        DB::table('products')->whereIn('product_id', $productIds)->update([
            'is_best_seller' => 1,
            'updated_at' => now(),
        ]);
    }
}

