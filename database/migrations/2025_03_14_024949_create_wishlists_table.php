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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('motorcycle_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('is_motorcycle')->default(false);
            $table->timestamps();
            
            // Garantir que não haja duplicatas
            $table->unique(['user_id', 'product_id', 'motorcycle_id', 'is_motorcycle']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
