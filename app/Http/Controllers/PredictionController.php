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

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('permission:datas.prediction')->only('index');
    //     $this->middleware('permission:prediction.index')->only('index');
    // }

    // public function index()
    // {
    //     return view('predictions.index');
    // }

    // public function prediction($type)
    // {
    //     // Ambil data sesuai dengan jenis
    //     if ($type === 'data') {
    //         $datas = Data::all();
    //     } elseif ($type === 'palet-terpakai') {
    //         $datas = DataPaletTerpakai::all();
    //     } elseif ($type === 'palet-kosong') {
    //         $datas = DataPaletKosong::all();
    //     } else {
    //         return abort(404, 'Invalid type');
    //     }

    //     // Ambil data stok_akhir dan tanggal
    //     $dates = $datas->pluck('tanggal')->toArray();
    //     $stok_akhir = $datas->pluck('stok_akhir')->toArray();

    //     // Resample data menjadi mingguan (Minggu ke Sabtu)
    //     $weeklyData = $this->resampleWeekly($dates, $stok_akhir);

    //     // Box-Cox Transformation (lambda = 0 untuk log transformation)
    //     $lambda = 0; // Jika perlu, sesuaikan lambda
    //     $transformedData = $this->boxcoxTransform(array_values($weeklyData), $lambda);

    //     // Uji stasioneritas
    //     $isStationaryMean = $this->adfTest($transformedData, 'mean');
    //     $isStationaryVariance = $this->adfTest($transformedData, 'variance');

    //     // Implementasi model ARIMA(0,2,1)
    //     $differencedData = $this->difference($transformedData, 2);
    //     $forecast = $this->arimaForecast($differencedData, 0, 2, 1, 10);

    //     // Konversi kembali prediksi ke skala asli
    //     $originalForecast = $this->inverseBoxcoxTransform($forecast, $lambda);

    //     // Generate future dates
    //     $lastDate = Carbon::parse(array_key_last($weeklyData));
    //     $futureDates = [];
    //     for ($i = 1; $i <= 10; $i++) {
    //         $lastDate->addWeek(); // Tambahkan satu minggu
    //         $futureDates[] = $lastDate->format('Y-m-d');
    //     }

    //     // Hasil prediksi
    //     $results = [];
    //     foreach ($forecast as $index => $value) {
    //         $results[] = [
    //             'id' => $index + 1,
    //             'date' => $futureDates[$index] ?? '',
    //             'forecast' => $value
    //         ];
    //     }

    //     // Hitung MAPE
    //     $mape = $this->calculateMAPE(array_slice($stok_akhir, -10), array_slice($originalForecast, 0, 10));

    //     // Statistik dasar
    //     // $stats = $this->calculateStats($stok_akhir);

    //     return view('datas.prediction', compact(
    //         // 'stats',
    //         'results', 'mape', 'isStationaryMean', 'isStationaryVariance'));
    // }

    // private function resampleWeekly($dates, $values)
    // {
    //     $weeklyData = [];
    //     $currentWeek = [];
    //     $currentDate = null;
    //     foreach ($dates as $index => $date) {
    //         $date = Carbon::parse($date);
    //         $dayOfWeek = $date->dayOfWeek;

    //         if ($dayOfWeek === Carbon::SATURDAY) {
    //             if ($currentDate) {
    //                 $weeklyData[$currentDate] = array_sum($currentWeek);
    //             }
    //             $currentWeek = [];
    //             $currentDate = $date->startOfWeek()->format('Y-m-d');
    //         }
    //         $currentWeek[] = $values[$index];
    //     }

    //     if ($currentDate) {
    //         $weeklyData[$currentDate] = array_sum($currentWeek);
    //     }

    //     // Geser tanggal ke hari Minggu
    //     $shiftedWeeklyData = [];
    //     foreach ($weeklyData as $date => $value) {
    //         $shiftedDate = Carbon::parse($date)->addDays(6)->format('Y-m-d');
    //         $shiftedWeeklyData[$shiftedDate] = $value;
    //     }

    //     return $shiftedWeeklyData;
    // }

    // private function boxcoxTransform($data, $lambda)
    // {
    //     $transformed = [];
    //     foreach ($data as $value) {
    //         if ($lambda == 0) {
    //             $transformed[] = log($value);
    //         } else {
    //             $transformed[] = ($value ** $lambda - 1) / $lambda;
    //         }
    //     }
    //     return $transformed;
    // }

    // private function inverseBoxcoxTransform($data, $lambda)
    // {
    //     $inverseTransformed = [];
    //     foreach ($data as $value) {
    //         if ($lambda == 0) {
    //             $inverseTransformed[] = exp($value);
    //         } else {
    //             $inverseTransformed[] = ($lambda * $value + 1) ** (1 / $lambda);
    //         }
    //     }
    //     return $inverseTransformed;
    // }

    // private function adfTest($data, $type = 'mean')
    // {
    //     // Implementasi uji ADF harus menggunakan library atau kode uji ADF yang sesuai
    //     $isStationary = true; // Placeholder
    //     // Tambahkan kode untuk uji ADF di sini
    //     return $isStationary;
    // }

    // private function difference($data, $d)
    // {
    //     for ($i = 0; $i < $d; $i++) {
    //         $data = array_slice($data, 1);
    //         $n = count($data);
    //         $temp = [];
    //         for ($j = 1; $j < $n; $j++) {
    //             $temp[] = $data[$j] - $data[$j - 1];
    //         }
    //         $data = $temp;
    //     }
    //     return $data;
    // }

    // private function arimaForecast($data, $p, $d, $q, $steps)
    // {
    //     $n = count($data);
    //     if ($n < $p + $q) {
    //         return []; // Tidak cukup data untuk parameter AR dan MA
    //     }

    //     $forecast = [];
    //     $arParams = array_fill(0, $p, 0.5); // AR Parameters
    //     $maParams = array_fill(0, $q, 0.5); // MA Parameters

    //     // Inisialisasi residuals (untuk MA)
    //     $residuals = array_fill(0, $q, 0);

    //     for ($i = 0; $i < $steps; $i++) {
    //         $arPart = 0;
    //         $maPart = 0;

    //         // Bagian AR
    //         for ($j = 0; $j < $p; $j++) {
    //             if ($n - $j - 1 >= 0) {
    //                 $arPart += $arParams[$j] * $data[$n - $j - 1];
    //             }
    //         }

    //         // Bagian MA
    //         for ($j = 0; $j < $q; $j++) {
    //             if (isset($residuals[$j])) {
    //                 $maPart += $maParams[$j] * $residuals[$j];
    //             }
    //         }

    //         // Gabungkan bagian AR dan MA
    //         $forecastValue = $arPart + $maPart;
    //         $forecast[] = $forecastValue;

    //         // Update residuals
    //         array_unshift($residuals, $forecastValue);
    //         array_pop($residuals);

    //         // Tambahkan nilai prediksi ke data differenced untuk prediksi iteratif
    //         $data[] = $forecastValue;
    //         $n++;
    //     }

    //     return $forecast;
    // }

    // private function calculateMAPE($actual, $forecast)
    // {
    //     $n = count($actual);
    //     $mape = 0;
    //     for ($i = 0; $i < $n; $i++) {
    //         if ($actual[$i] != 0) {
    //             $mape += abs(($actual[$i] - $forecast[$i]) / $actual[$i]);
    //         }
    //     }
    //     return ($mape / $n) * 100;
    // }

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

    // private function calculateStats($data)
    // {
    //     $count = count($data);
    //     $mean = $count > 0 ? array_sum($data) / $count : 0;
    //     $std = $count > 1 ? sqrt(array_sum(array_map(function ($x) use ($mean) {
    //         return pow($x - $mean, 2);
    //     }, $data)) / ($count - 1)) : 0;
    //     sort($data);
    //     $min = reset($data);
    //     $max = end($data);
    //     $percentiles = [
    //         '25_percentile' => $data[floor(0.25 * ($count + 1)) - 1] ?? 0,
    //         'median' => $data[floor(0.5 * ($count + 1)) - 1] ?? 0,
    //         '75_percentile' => $data[floor(0.75 * ($count + 1)) - 1] ?? 0,
    //     ];

    //     return [
    //         'count' => $count,
    //         'mean' => $mean,
    //         'std' => $std,
    //         'min' => $min,
    //         '25_percentile' => $percentiles['25_percentile'],
    //         'median' => $percentiles['median'],
    //         '75_percentile' => $percentiles['75_percentile'],
    //         'max' => $max,
    //     ];
    // }
}
