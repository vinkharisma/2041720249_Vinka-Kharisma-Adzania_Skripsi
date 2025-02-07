<?php

namespace App\Http\Controllers;

use App\Charts\StokChart;
use App\Models\Data;
use App\Models\Prediction;
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

        // Build chart
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

            'stok_awal' => $dataStok->first()->stok_awal ?? 0,
            'stok_akhir' => $dataStok->last()->stok_akhir ?? 0,
            'jumlah_stok_palet_baik' => $dataStok->last()->jumlah_stok_palet_baik ?? 0,
            'jumlah_stok_palet_rusak' => $dataStok->last()->jumlah_stok_palet_rusak ?? 0,

            'total_stok_palet' => ($dataPaletTerpakai->last()->stok_akhir ?? 0) + ($dataPaletKosong->last()->stok_akhir ?? 0),
            'stok_terpakai' => $dataPaletTerpakai->last()->stok_akhir ?? 0,
            'stok_kosong' => $dataPaletKosong->last()->stok_akhir ?? 0,

            'years' => Data::select(DB::raw('YEAR(tanggal) as year'))->groupBy('year')->pluck('year'),
            'selectedYear' => $year,
        ]);
    }

}
