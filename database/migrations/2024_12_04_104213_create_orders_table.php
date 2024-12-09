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
        Schema::create('orders', function (Blueprint $table) {
            
            $table->id('order_id'); // Order ID (primary key) 
            $table->foreignId('user_id')->constrained('users','user_id')->onDelete('cascade'); 
            //User id (foreign key), if user no longer exists the order never did too. (keeping consistency)
            $table->date('order_date');  // The date the order was made
            $table->enum('status', ['ordered', 'dispatched','delivered'])->default('ordered'); // The delivery progress
            $table->string('delivery_address'); // Where it must be delivered to
            $table->timestamps(); // Tracking when new records were created and updated
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
