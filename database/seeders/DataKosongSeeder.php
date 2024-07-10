<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataKosongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_palet_kosong')->insert(
            [
                [
                    'tanggal' => "20/11/01",
                    'name' => "KOSONG",
                    'stok_awal' => "125",
                    'masuk' => "0",
                    'keluar' => "20",
                    'stok_akhir' => "105",
                    'jumlah_stok_palet_baik' => "220",
                    'jumlah_stok_palet_rusak' => "0",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'tanggal' => "20/11/02",
                    'name' => "KOSONG",
                    'stok_awal' => "105",
                    'masuk' => "82",
                    'keluar' => "0",
                    'stok_akhir' => "187",
                    'jumlah_stok_palet_baik' => "313",
                    'jumlah_stok_palet_rusak' => "0",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
