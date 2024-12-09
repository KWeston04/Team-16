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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('inventory_id'); // Inventory id (primary key) 
            $table->foreignId('product_id'); //Product id (foreign key)
            $table->string('variant')->nullable(); // Variant of the product 
            $table->integer('quantity_in_stock'); // Quantity available in stock
            $table->integer('low_stock_threshold')->default(0); // Low stock warning threshold
            $table->timestamps(); // created_at and updated_at

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade'); // Foreign key from the products table 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
