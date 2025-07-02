<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Alterar o tamanho do campo address para TEXT para suportar endereços mais longos
        // quando encriptados
        DB::statement('ALTER TABLE users MODIFY address TEXT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverter o campo address para VARCHAR(255)
        DB::statement('ALTER TABLE users MODIFY address VARCHAR(255) NULL');
    }
};
