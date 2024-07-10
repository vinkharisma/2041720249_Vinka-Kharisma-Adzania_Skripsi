<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataTerpakaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_palet_terpakai')->insert(
            [
                [
                    'tanggal' => "20/11/01",
                    'name' => "TERPAKAI",
                    'stok_awal' => "100",
                    'masuk' => "15",
                    'keluar' => "0",
                    'stok_akhir' => "115",
                    'jumlah_stok_palet_baik' => "220",
                    'jumlah_stok_palet_rusak' => "0",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'tanggal' => "20/11/02",
                    'name' => "TERPAKAI",
                    'stok_awal' => "115",
                    'masuk' => "11",
                    'keluar' => "0",
                    'stok_akhir' => "126",
                    'jumlah_stok_palet_baik' => "313",
                    'jumlah_stok_palet_rusak' => "0",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
