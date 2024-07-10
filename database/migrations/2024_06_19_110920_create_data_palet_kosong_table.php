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
        Schema::create('data_palet_kosong', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->unique();
            $table->string('name');
            $table->string('stok_awal');
            $table->string('masuk');
            $table->string('keluar');
            $table->string('stok_akhir');
            $table->string('jumlah_stok_palet_baik');
            $table->string('jumlah_stok_palet_rusak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_palet_kosong');
    }
};
