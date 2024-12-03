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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // Product id (primary key) 
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description
            $table->decimal('price', 8, 2); // Price of the products with 8 digits, 2 decimal places
            $table->string('image_url')->nullable(); // the prodcts image url
            $table->foreignId('category_id'); // Category id (foreign Key)
            $table->enum('stock_status', ['in_stock', 'out_of_stock', 'pre_order']); // Stock status of every product
            $table->boolean('discounted')->default(false); // If the product is discounted
            $table->timestamps(); // created_at and updated_at

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade'); // Foreign key from the categories table 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
