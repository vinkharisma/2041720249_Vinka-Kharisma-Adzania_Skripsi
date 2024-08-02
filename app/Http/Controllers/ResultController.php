<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Prediction;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {
        // Ambil data harian dari database
        $dataHarian = DB::table('datas')->where('name', 'KOSONG')->get();

        // Ubah data menjadi format mingguan (Minggu ke Sabtu)
        $dataMingguan = $dataHarian->groupBy(function($date) {
            return Carbon::parse($date->tanggal)->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        })->map(function($week) {
            // Menggunakan tanggal Sabtu untuk minggu tersebut
            $tanggalMinggu = Carbon::parse($week->first()->tanggal)->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
            $stokAkhir = $week->sum('stok_akhir');
            return [
                'tanggal' => $tanggalMinggu,
                'stok_akhir' => $stokAkhir,
            ];
        })->values()->toArray();

        // dd($dataMingguan);

        // Kirim data mingguan ke Flask
        $client = new Client();
        $response = $client->post('https://api.prediksipalet.my.id/predict', [
            'json' => [
                'dates' => array_column($dataMingguan, 'tanggal'),
                'stok_akhir' => array_column($dataMingguan, 'stok_akhir')
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        // dd($result);

        // Periksa jika respons memiliki 'forecast' dan 'mape'
        $predictions = $result['forecast'] ?? [];
        $mape = $result['mape'] ?? 'N/A';

        // Tentukan tanggal prediksi (mingguan setelah data terakhir)
        $lastDate = end($dataMingguan)['tanggal'];
        $nextDates = [];
        $currentDate = Carbon::parse($lastDate)->addWeek(); // Mulai dari minggu berikutnya
        for ($i = 0; $i < count($predictions); $i++) {
            $nextDates[] = $currentDate->format('d M Y');
            $currentDate->addWeek(); // Tambah satu minggu
        }

        // Simpan hasil prediksi ke database
        foreach ($predictions as $index => $prediction) {
            $formattedDate = Carbon::createFromFormat('d M Y', $nextDates[$index])->format('Y-m-d');

            Prediction::updateOrCreate(
                ['tanggal' => $formattedDate], // Kunci unik
                ['hasil' => $prediction] // Data yang disimpan
            );
        }

        // Kirim hasil prediksi ke view
        return view('results.index', [
            'predictions' => $predictions,
            'dates' => $nextDates,
            'mape' => $mape
        ]);
    }
}
