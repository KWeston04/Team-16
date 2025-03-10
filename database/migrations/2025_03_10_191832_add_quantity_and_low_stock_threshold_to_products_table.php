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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('quantity')->default(0)->after('stock_status'); // Add quantity field with default value 0
            $table->integer('low_stock_threshold')->default(10)->after('quantity'); // Add low stock threshold with default value 10
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('quantity'); // Remove quantity field
            $table->dropColumn('low_stock_threshold'); // Remove low stock threshold field
        });
    }
};

