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
        // Mengambil semua data dari model Data
        $dataStok = Data::select('stok_akhir', 'tanggal')->get();
        $dataPaletKosong = Data::where('name', 'kosong')->select('stok_akhir', 'tanggal')->get();
        $dataPaletTerpakai = Data::where('name', 'terpakai')->select('stok_akhir', 'tanggal')->get();
        $dataPrediksi = Prediction::select('tanggal', 'hasil')->get();

        // Memeriksa apakah data ada
        // dd($dataStok, $dataPaletKosong, $dataPaletTerpakai, $dataPrediksi);

        // Mengambil data pertama untuk stok_awal dan data terakhir untuk stok_akhir, jumlah_stok_palet_baik, dan jumlah_stok_palet_rusak
        // $data_first = Data::first();
        $data_first = Data::orderBy('id', 'desc')->first();
        $data_last = Data::orderBy('id', 'desc')->first();

        // Mengambil stok_awal dari data pertama dan stok_akhir, jumlah_stok_palet_baik, jumlah_stok_palet_rusak dari data terakhir
        $stok_awal = $data_first->stok_awal;
        $stok_akhir = $data_last->stok_akhir;
        $jumlah_stok_palet_baik = $data_last->jumlah_stok_palet_baik;
        $jumlah_stok_palet_rusak = $data_last->jumlah_stok_palet_rusak;

        // Bangun chart
        $chartStokAkhir = $chart->buildStokAkhirChart($dataStok);
        $chartPaletKosong = $chart->buildPaletKosongChart($dataPaletKosong);
        $chartPaletTerpakai = $chart->buildPaletTerpakaiChart($dataPaletTerpakai);
        $chartPrediksi = $chart->buildPrediksiChart($dataPrediksi);

        // // Bangun grafik untuk prediksi jika perlu
        // $prediksiFilePath = storage_path('app/public/prediksi_kebutuhan_palet_df.csv');
        // $prediksiData = [];
        // if (file_exists($prediksiFilePath)) {
        //     $file = fopen($prediksiFilePath, 'r');
        //     fgetcsv($file); // Mengabaikan header
        //     while (($row = fgetcsv($file)) !== false) {
        //         $prediksiData[] = [
        //             'Tanggal' => $row[0],
        //             'Prediksi Kebutuhan Palet' => $row[1],
        //             // 'Lower CI' => $row[2],
        //             // 'Upper CI' => $row[3],
        //         ];
        //     }
        //     fclose($file);
        // }

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
        ]);
    }
}
