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
            // Adicionar a coluna category_id como chave estrangeira
            $table->unsignedBigInteger('category_id')->nullable()->after('price');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            
            // Remover a coluna Category antiga
            $table->dropColumn('Category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Remover a chave estrangeira e a coluna category_id
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            
            // Adicionar novamente a coluna Category
            $table->string('Category')->nullable();
        });
    }
};
