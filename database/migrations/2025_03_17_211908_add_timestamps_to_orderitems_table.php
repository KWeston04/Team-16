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
        Schema::table('orderitems', function (Blueprint $table) {
            $table->timestamps(); // Adding the "created_at" and "updated_at" columns as the admin panel expects them
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orderitems', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
