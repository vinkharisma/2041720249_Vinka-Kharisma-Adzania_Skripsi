<?php

namespace App\Http\Controllers;

use App\Charts\StokChart;
use App\Models\Data;
use App\Models\DataPaletKosong;
use App\Models\DataPaletTerpakai;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PredictionController extends Controller
{
    protected $stokChart;

    public function __construct(StokChart $stokChart)
    {
        $this->stokChart = $stokChart;
    }

    public function index()
    {
        // Path ke file CSV untuk prediksi
        $prediksiFilePath = storage_path('app/public/prediksi_kebutuhan_palet_df.csv');

        // Path ke file CSV untuk MAPE
        $mapeFilePath = storage_path('app/public/mape_value.csv');

        // Membaca file prediksi
        $prediksiData = [];
        if (file_exists($prediksiFilePath)) {
            $file = fopen($prediksiFilePath, 'r');
            $header = fgetcsv($file); // Mengabaikan header

            while (($row = fgetcsv($file)) !== false) {
                $prediksiData[] = [
                    'Tanggal' => $row[0],
                    'Prediksi Kebutuhan Palet' => $row[1],
                    // 'Lower CI' => $row[2],
                    // 'Upper CI' => $row[3],
                ];
            }

            fclose($file);
        } else {
            $prediksiData = [];
        }

        // Membaca file MAPE
        $mapeValue = 'File MAPE tidak ditemukan';
        if (file_exists($mapeFilePath)) {
            $mapeData = array_map('str_getcsv', file($mapeFilePath));
            $mapeValue = isset($mapeData[1][0]) ? $mapeData[1][0] : 'Data tidak ditemukan';
        }

        // Pastikan MAPE adalah numerik
        if (!is_numeric($mapeValue)) {
            $mapeValue = 0; // atau nilai default lain yang sesuai
        }

        // Initialize the chart for predictions with data
        $chartPrediksi = $this->stokChart->buildPrediksiChart($prediksiData); // Pass the $prediksiData

        return view('datas.prediction', [
            'prediksiData' => $prediksiData,
            'mape' => $mapeValue,
            'chartPrediksi' => $chartPrediksi
        ]);
    }

}
