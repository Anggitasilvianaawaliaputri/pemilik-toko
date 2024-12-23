<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('items')) {
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->string('nama_barang');
                $table->unsignedBigInteger('category_id');
                $table->integer('harga');
                $table->integer('netto')->default(0);
                $table->integer('jumlah')->default(0);
                $table->string('gambar')->nullable(); // Kolom gambar ditambahkan di sini
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
