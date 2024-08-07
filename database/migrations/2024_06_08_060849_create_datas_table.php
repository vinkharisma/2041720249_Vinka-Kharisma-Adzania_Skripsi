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
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('name');
            $table->string('stok_awal');
            $table->string('masuk');
            $table->string('keluar');
            $table->string('stok_akhir');
            $table->string('jumlah_stok_palet_baik');
            $table->string('jumlah_stok_palet_rusak');
            $table->timestamps();

            // Menambahkan unique constraint pada kombinasi tanggal dan name
            $table->unique(['tanggal', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datas');
    }
};
