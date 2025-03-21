<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('category')->insert([
            ['category_id' => 1, 'parent_category_id' => null, 'name' => 'Shirts'],
            ['category_id' => 2, 'parent_category_id' => null, 'name' => 'Pants'],
            ['category_id' => 3, 'parent_category_id' => null, 'name' => 'Shorts'],
            ['category_id' => 4, 'parent_category_id' => null, 'name' => 'Shoes'],
            ['category_id' => 5, 'parent_category_id' => null, 'name' => 'Accessories'],
        ]);
    }
}