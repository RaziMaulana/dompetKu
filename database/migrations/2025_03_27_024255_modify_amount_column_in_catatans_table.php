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
        Schema::table('catatans', function (Blueprint $table) {
            $table->decimal('amount', 15, 2)->change(); // Ubah presisi dan skala kolom amount
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catatans', function (Blueprint $table) {
            $table->decimal('amount')->change(); // Kembalikan ke tipe data sebelumnya
        });
    }
};
