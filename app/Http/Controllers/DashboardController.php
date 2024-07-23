<?php

namespace App\Http\Controllers;

use App\Charts\StokChart;
use App\Models\Data;
use App\Models\DataPaletKosong;
use App\Models\DataPaletTerpakai;
use App\Models\Prediction;
use Doctrine\Common\Cache\Cache;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(StokChart $chart)
    {
        // Mengambil data pertama untuk stok_awal dan data terakhir untuk stok_akhir, jumlah_stok_palet_baik, dan jumlah_stok_palet_rusak
        // $data_first = Data::first();
        $data_first = Data::orderBy('id', 'desc')->first();
        $data_last = Data::orderBy('id', 'desc')->first();

        $data_first_kosong = DataPaletKosong::first();
        $data_last_kosong = DataPaletKosong::orderBy('id', 'desc')->first();

        $data_first_terpakai = DataPaletTerpakai::first();
        $data_last_terpakai = DataPaletTerpakai::orderBy('id', 'desc')->first();

        // Mengambil stok_awal dari data pertama dan stok_akhir, jumlah_stok_palet_baik, jumlah_stok_palet_rusak dari data terakhir
        $stok_awal = $data_first->stok_awal;
        $stok_akhir = $data_last->stok_akhir;
        $jumlah_stok_palet_baik = $data_last->jumlah_stok_palet_baik;
        $jumlah_stok_palet_rusak = $data_last->jumlah_stok_palet_rusak;

        $stok_awal_kosong = $data_first_kosong->stok_awal;
        $stok_akhir_kosong = $data_last_kosong->stok_akhir;
        $jumlah_stok_palet_baik_kosong = $data_last_kosong->jumlah_stok_palet_baik;
        $jumlah_stok_palet_rusak_kosong = $data_last_kosong->jumlah_stok_palet_rusak;

        $stok_awal_terpakai = $data_first_terpakai->stok_awal;
        $stok_akhir_terpakai = $data_last_terpakai->stok_akhir;
        $jumlah_stok_palet_baik_terpakai = $data_last_terpakai->jumlah_stok_palet_baik;
        $jumlah_stok_palet_rusak_terpakai = $data_last_terpakai->jumlah_stok_palet_rusak;

        // Bangun chart untuk stok akhir
        $chartStokAkhir = $chart->buildStokAkhirChart();

        // Bangun chart untuk palet kosong
        $chartPaletKosong = $chart->buildPaletKosongChart();

        // Bangun chart untuk palet terpakai
        $chartPaletTerpakai = $chart->buildPaletTerpakaiChart();

        // Bangun grafik untuk prediksi jika perlu
        $prediksiFilePath = storage_path('app/public/prediksi_kebutuhan_palet_df.csv');
        $prediksiData = [];
        if (file_exists($prediksiFilePath)) {
            $file = fopen($prediksiFilePath, 'r');
            fgetcsv($file); // Mengabaikan header
            while (($row = fgetcsv($file)) !== false) {
                $prediksiData[] = [
                    'Tanggal' => $row[0],
                    'Prediksi Kebutuhan Palet' => $row[1],
                    // 'Lower CI' => $row[2],
                    // 'Upper CI' => $row[3],
                ];
            }
            fclose($file);
        }

        $chartPrediksi = $chart->buildPrediksiChart($prediksiData);

        // Mengirimkan stok_awal, stok_akhir, jumlah_stok_palet_baik, dan jumlah_stok_palet_rusak ke view dashboard
        return view('dashboard', [
            // 'chart' => $chart->build(),
            'chartStokAkhir' => $chartStokAkhir,
            'chartPaletKosong' => $chartPaletKosong,
            'chartPaletTerpakai' => $chartPaletTerpakai,
            'chartPrediksi' => $chartPrediksi,

            'stok_awal' => $stok_awal,
            'stok_akhir' => $stok_akhir,
            'jumlah_stok_palet_baik' => $jumlah_stok_palet_baik,
            'jumlah_stok_palet_rusak' => $jumlah_stok_palet_rusak,

            'stok_awal_kosong' => $stok_awal_kosong,
            'stok_akhir_kosong' => $stok_akhir_kosong,
            'jumlah_stok_palet_baik_kosong' => $jumlah_stok_palet_baik_kosong,
            'jumlah_stok_palet_rusak_kosong' => $jumlah_stok_palet_rusak_kosong,

            'stok_awal_terpakai' => $stok_awal_terpakai,
            'stok_akhir_terpakai' => $stok_akhir_terpakai,
            'jumlah_stok_palet_baik_terpakai' => $jumlah_stok_palet_baik_terpakai,
            'jumlah_stok_palet_rusak_terpakai' => $jumlah_stok_palet_rusak_terpakai,
        ]);
    }
}
