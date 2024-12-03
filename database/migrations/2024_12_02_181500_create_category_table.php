<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id('category_id'); // Category id (primary key)  
            $table->foreignId('parent_category_id'); // Parent category id (foreign key)
            $table->timestamps(); // created_at and updated_at

            $table->foreign('parent_category_id')->references('category_id')->on('category')->onDelete('cascade'); // Foreign key from the categories table 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
