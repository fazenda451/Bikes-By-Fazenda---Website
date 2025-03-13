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
        // Verifica se a coluna já existe
        $columnExists = Schema::hasColumn('users', 'birth_date');
        
        if (!$columnExists) {
            Schema::table('users', function (Blueprint $table) {
                $table->date('birth_date')->nullable()->after('name');
            });
        } else {
            // Se a coluna existe mas está com tipo errado, corrige o tipo
            DB::statement('ALTER TABLE users MODIFY birth_date DATE NULL');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birth_date');
        });
    }
};
