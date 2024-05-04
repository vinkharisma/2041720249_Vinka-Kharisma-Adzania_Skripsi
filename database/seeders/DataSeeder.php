<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('datas')->insert([
            'tanggal' => "",
            'keterangan' => "",
            'stok_awal' => "",
            'masuk' => "",
            'keluar' => "",
            'stok_akhir' => "",
            'jumlah_stok_palet_baik' => "",
            'jumlah_stok_palet_rusak' => "",
        ]);

        // Data::factory()->count(10)->create();

    }
}
