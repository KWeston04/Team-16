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
        Schema::create('cartitems', function (Blueprint $table) {
            $table->id('cart_item_id'); // The cart item ID.
            $table->foreignId('cart_id')->constrained('carts','cart_id'); // the cart id that it points to.
            $table->foreignId('product_id')->constrained('products','product_id'); // the product that has been selected.
            $table->integer('quantity'); // quantity of the item in the cart.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartitems');
    }
};
