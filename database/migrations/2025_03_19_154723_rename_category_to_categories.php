<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenameCategoryToCategories extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('category', 'categories');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('categories', 'category');
    }
}
