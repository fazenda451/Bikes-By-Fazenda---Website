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
        Schema::table('carts', function (Blueprint $table) {
            $table->boolean('is_motorcycle')->default(false);
            $table->unsignedBigInteger('motorcycle_id')->nullable();
            $table->foreign('motorcycle_id')->references('id')->on('motorcycles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['motorcycle_id']);
            $table->dropColumn('motorcycle_id');
            $table->dropColumn('is_motorcycle');
        });
    }
};
