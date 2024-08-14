<?php

namespace App\Charts;

use App\Models\Data;
use App\Models\DataPaletKosong;
use App\Models\DataPaletTerpakai;
use App\Models\Prediction;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StokChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function buildStokAkhirChart(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Mengambil data stok akhir dari database
        $datas = Data::select('stok_akhir', 'tanggal')->get();

        // Inisialisasi array untuk stok akhir dan tanggal bulan tahun
        $dataStokAkhir = [];
        $dataTanggal = [];

        // Mengisi array dengan data dari database
        foreach ($datas as $data) {
            $dataStokAkhir[] = round($data->stok_akhir); // Membulatkan nilai stok akhir
            $dataTanggal[] = Carbon::parse($data->tanggal)->format('d M Y'); // Format tanggal bulan tahun
        }

        // // Hitung garis tren
        // $trendline = $this->calculateTrendline($dataStokAkhir);

        // // Membulatkan nilai trendline
        // $trendline = array_map('round', $trendline);

        // Bangun chart
        return $this->chart->lineChart()
            // ->setTitle('Data Stok Akhir')
            ->addData('Stok Akhir', $dataStokAkhir)
            // ->addData('Trend Line', $trendline) // Tambahkan garis tren sebagai series tambahan
            ->setXAxis($dataTanggal) // Menggunakan data tanggal bulan tahun
            ->setHeight(400)
            ->setColors(['#394eea', '#ff0000']) // Warna stok akhir dan garis tren
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }

    public function buildPaletTerpakaiChart(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Mengambil data stok akhir untuk palet terpakai dari database
        $datas = Data::where('name', 'terpakai')
        ->select('stok_akhir', 'tanggal')
        ->get();
        // ->select(DB::raw('stok_akhir, DATE_FORMAT(tanggal, "%Y-%m") as bulan'))
        // ->orderBy('tanggal')
        // ->get()
        // ->groupBy('bulan')
        // ->map(function ($item) {
        //     return $item->last();
        // });

        // Inisialisasi array untuk terpakai dan tanggal bulan tahun
        $dataStokAkhir = [];
        $dataTanggal = [];
        // $dataBulan = [];

        // Mengisi array dengan data dari database
        foreach ($datas as $data) {
            $dataStokAkhir[] = round($data->stok_akhir); // Membulatkan nilai stok akhir
            $dataTanggal[] = Carbon::parse($data->tanggal)->format('d M Y'); // Format tanggal bulan tahun
            // $dataBulan[] = Carbon::createFromFormat('Y-m', $data->bulan)->format('M Y'); // Format bulan
        }

        // // Hitung garis tren
        // $trendline = $this->calculateTrendline($dataStokAkhir);

        // // Membulatkan nilai trendline
        // $trendline = array_map('round', $trendline);

        // Bangun chart
        return $this->chart->lineChart()
            // ->setTitle('Data Stok Akhir Terpakai')
            ->addData('Stok Akhir', $dataStokAkhir)
            // ->addData('Trend Line', $trendline) // Tambahkan garis tren sebagai series tambahan
            ->setXAxis($dataTanggal) // Menggunakan data tanggal bulan tahun
            // ->setXAxis($dataBulan) // Menggunakan data tanggal bulan tahun
            ->setHeight(400)
            ->setColors(['#394eea', '#ff0000']) // Warna terpakai dan garis tren
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }

    public function buildPaletKosongChart(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Mengambil data stok akhir untuk palet kosong dari database
        $datas = Data::where('name', 'kosong')
        ->select('stok_akhir', 'tanggal')
        ->get();
        // ->select(DB::raw('stok_akhir, DATE_FORMAT(tanggal, "%Y-%m") as bulan'))
        // ->orderBy('tanggal')
        // ->get()
        // ->groupBy('bulan')
        // ->map(function ($item) {
        //     return $item->last();
        // });

        // Inisialisasi array untuk terpakai dan tanggal bulan tahun
        $dataStokAkhir = [];
        $dataTanggal = [];
        // $dataBulan = [];

        // Mengisi array dengan data dari database
        foreach ($datas as $data) {
            $dataStokAkhir[] = round($data->stok_akhir); // Membulatkan nilai stok akhir
            $dataTanggal[] = Carbon::parse($data->tanggal)->format('d M Y'); // Format tanggal bulan tahun
            // $dataBulan[] = Carbon::createFromFormat('Y-m', $data->bulan)->format('M Y'); // Format bulan
        }

        // // Hitung garis tren
        // $trendline = $this->calculateTrendline($dataStokAkhir);

        // // Membulatkan nilai trendline
        // $trendline = array_map('round', $trendline);

        // Bangun chart
        return $this->chart->lineChart()
            // ->setTitle('Data Stok Akhir Kosong')
            ->addData('Stok Akhir', $dataStokAkhir)
            // ->addData('Trend Line', $trendline) // Tambahkan garis tren sebagai series tambahan
            ->setXAxis($dataTanggal) // Menggunakan data tanggal bulan tahun
            // ->setXAxis($dataBulan) // Menggunakan data tanggal bulan tahun
            ->setHeight(400)
            ->setColors(['#ffa426', '#ff0000']) // Warna terpakai dan garis tren
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }

    // protected function calculateTrendline($dataStokAkhir)
    // {
    //     $n = count($dataStokAkhir);

    //     // Hitung gradien (slope) dan intercept (konstanta)
    //     $sumX = 0;
    //     $sumY = 0;
    //     $sumXY = 0;
    //     $sumX2 = 0;

    //     for ($i = 0; $i < $n; $i++) {
    //         $sumX += $i + 1;
    //         $sumY += $dataStokAkhir[$i];
    //         $sumXY += ($i + 1) * $dataStokAkhir[$i];
    //         $sumX2 += pow(($i + 1), 2);
    //     }

    //     $m = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - pow($sumX, 2));
    //     $c = ($sumY - $m * $sumX) / $n;

    //     // Bangun array data untuk garis tren
    //     $trendline = [];
    //     for ($i = 0; $i < $n; $i++) {
    //         $trendline[] = $m * ($i + 1) + $c;
    //     }

    //     return $trendline;
    // }

    public function buildPrediksiChart(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Mengambil data stok akhir dari database
        $prediksiData = Prediction::select('tanggal', 'hasil')->get();

        // // Mengambil data prediksi dari database dan mengelompokkan berdasarkan bulan
        // $prediksiData = Prediction::select(
        //     DB::raw('SUM(hasil) as hasil'),
        //     DB::raw('DATE_FORMAT(tanggal, "%Y-%m") as bulan')
        // )
        // ->groupBy('bulan')
        // ->get();

        // Inisialisasi array untuk tanggal dan nilai prediksi
        $dataTanggal = [];
        // $dataBulan = [];
        $dataPrediksi = [];

        // Mengisi array dengan data dari $prediksiData
        foreach ($prediksiData as $data) {
            $dataTanggal[] = Carbon::parse($data->tanggal)->format('d M Y');
            // $dataBulan[] = Carbon::createFromFormat('Y-m', $data->bulan)->format('M Y');
            $dataPrediksi[] = round($data->hasil);
        }

        return $this->chart->lineChart()
            ->addData('Prediksi Kebutuhan Palet', $dataPrediksi)
            ->setXAxis($dataTanggal)
            // ->setXAxis($dataBulan)
            ->setHeight(400)
            ->setColors(['#47c363'])
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }
}
