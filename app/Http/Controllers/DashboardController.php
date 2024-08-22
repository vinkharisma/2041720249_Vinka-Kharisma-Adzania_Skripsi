<?php

namespace App\Http\Controllers;

use App\Charts\StokChart;
use App\Models\Data;
use App\Models\DataPaletKosong;
use App\Models\DataPaletTerpakai;
use App\Models\Prediction;
use Doctrine\Common\Cache\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(StokChart $chart, Request $request)
    {
        // Ambil tahun dari query string, default ke tahun saat ini
        $year = $request->input('year', date('Y'));

        // Mengambil data dengan filter tahun
        $dataStok = Data::whereYear('tanggal', $year)->select('stok_akhir', 'tanggal')->get();
        $dataPaletKosong = Data::where('name', 'empty')->whereYear('tanggal', $year)->select('stok_akhir', 'tanggal')->get();
        $dataPaletTerpakai = Data::where('name', 'used')->whereYear('tanggal', $year)->select('stok_akhir', 'tanggal')->get();
        $dataPrediksi = Prediction::whereYear('tanggal', $year)->select('tanggal', 'hasil')->get();

        // Mengambil data pertama dan terakhir untuk stok
        $data_first = Data::whereYear('tanggal', $year)->orderBy('id', 'desc')->first();
        $data_last = Data::whereYear('tanggal', $year)->orderBy('id', 'desc')->first();

        $stok_awal = $data_first->stok_awal ?? 0;
        $stok_akhir = $data_last->stok_akhir ?? 0;
        $jumlah_stok_palet_baik = $data_last->jumlah_stok_palet_baik ?? 0;
        $jumlah_stok_palet_rusak = $data_last->jumlah_stok_palet_rusak ?? 0;

        $stokPaletTerpakai = Data::where('name', 'used')->whereYear('tanggal', $year)->orderBy('tanggal', 'desc')->first();
        $stokPaletKosong = Data::where('name', 'empty')->whereYear('tanggal', $year)->orderBy('tanggal', 'desc')->first();

        $totalStokPalet = ($stokPaletTerpakai->stok_akhir ?? 0) + ($stokPaletKosong->stok_akhir ?? 0);

        // Bangun chart
        $chartStokAkhir = $chart->buildStokAkhirChart($dataStok);
        $chartPaletKosong = $chart->buildPaletKosongChart($dataPaletKosong);
        $chartPaletTerpakai = $chart->buildPaletTerpakaiChart($dataPaletTerpakai);
        $chartPrediksi = $chart->buildPrediksiChart($dataPrediksi);

        // Mengirimkan data ke view
        return view('dashboard', [
            'chartStokAkhir' => $chartStokAkhir,
            'chartPaletKosong' => $chartPaletKosong,
            'chartPaletTerpakai' => $chartPaletTerpakai,
            'chartPrediksi' => $chartPrediksi,

            'stok_awal' => $stok_awal,
            'stok_akhir' => $stok_akhir,
            'jumlah_stok_palet_baik' => $jumlah_stok_palet_baik,
            'jumlah_stok_palet_rusak' => $jumlah_stok_palet_rusak,

            'total_stok_palet' => $totalStokPalet,
            'stok_terpakai' => $stokPaletTerpakai->stok_akhir ?? 0,
            'stok_kosong' => $stokPaletKosong->stok_akhir ?? 0,

            'years' => Data::select(DB::raw('YEAR(tanggal) as year'))->groupBy('year')->pluck('year'),
            'selectedYear' => $year,
        ]);
    }
}
