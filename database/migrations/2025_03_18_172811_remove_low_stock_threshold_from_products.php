<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('low_stock_threshold');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('low_stock_threshold')->nullable(); // Re-add column if rolling back
        });
    }
};
