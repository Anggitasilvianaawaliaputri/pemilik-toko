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
        // Menambahkan kolom telepon jika belum ada
        Schema::table('agents', function (Blueprint $table) {
            if (!Schema::hasColumn('agents', 'telepon')) {
                $table->string('telepon')->after('email'); // Tambahkan kolom telepon
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            if (Schema::hasColumn('agents', 'telepon')) {
                $table->dropColumn('telepon'); // Hapus kolom telepon jika rollback
            }
        });
    }
};
