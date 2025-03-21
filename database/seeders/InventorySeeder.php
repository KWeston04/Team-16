<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    public function run()
    {
        DB::table('inventory')->insert([
            ['product_id' => 10, 'variant' => 'Default', 'quantity_in_stock' => 10, 'low_stock_threshold' => 2],
            ['product_id' => 20, 'variant' => 'Default', 'quantity_in_stock' => 15, 'low_stock_threshold' => 3],
            ['product_id' => 30, 'variant' => 'Default', 'quantity_in_stock' => 8, 'low_stock_threshold' => 2],
            ['product_id' => 40, 'variant' => 'Default', 'quantity_in_stock' => 12, 'low_stock_threshold' => 2],
        ]);
    }
}