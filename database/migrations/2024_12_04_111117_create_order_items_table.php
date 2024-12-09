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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id'); // Order item ID (primary key) 
            $table->foreignId('order_id')->constrained('orders','order_id')->onDelete('cascade');  // this depends on the foreign key order_id from orders,
            // if that is deleted this goes too (there will be potentially many order items to one order_id)
            $table->foreignId('product_id')->constrained('products','product_id'); // product_id is constrained on product_id from products, but will not be deleted without it
            // as otherwise orders would dissapear as soon as a product has sunsetted.
            $table->integer('quantity'); // how much will be ordered
            $table->decimal('price_at_purchase',8,2); // how much it was at the time
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
