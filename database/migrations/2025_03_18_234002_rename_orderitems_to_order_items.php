<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::rename('orderitems', 'order_items');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::rename('order_items', 'orderitems');
    }
    
};
