<?php

namespace App\Charts;

use App\Models\Data;
use App\Models\DataPaletKosong;
use App\Models\DataPaletTerpakai;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

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
            $dataStokAkhir[] = $data->stok_akhir;
            $dataTanggal[] = Carbon::parse($data->tanggal)->format('d M Y'); // Format tanggal bulan tahun
        }

        // Hitung garis tren
        $trendline = $this->calculateTrendline($dataStokAkhir);

        // Bangun chart
        return $this->chart->lineChart()
            ->setTitle('Data Stok Akhir')
            ->addData('Stok Akhir', $dataStokAkhir)
            ->addData('Trend Line', $trendline) // Tambahkan garis tren sebagai series tambahan
            ->setXAxis($dataTanggal) // Menggunakan data tanggal bulan tahun
            ->setHeight(400)
            ->setColors(['#394eea', '#ff0000']) // Warna stok akhir dan garis tren
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }

    public function buildPaletKosongChart(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Mengambil data terpakai dari database
        $datas = DataPaletKosong::select('stok_akhir', 'tanggal')->get();

        // Inisialisasi array untuk terpakai dan tanggal bulan tahun
        $dataStokAkhir = [];
        $dataTanggal = [];

        // Mengisi array dengan data dari database
        foreach ($datas as $data) {
            $dataStokAkhir[] = $data->stok_akhir;
            $dataTanggal[] = Carbon::parse($data->tanggal)->format('d M Y'); // Format tanggal bulan tahun
        }

        // Hitung garis tren
        $trendline = $this->calculateTrendline($dataStokAkhir);

        // Bangun chart
        return $this->chart->lineChart()
            ->setTitle('Data Stok Akhir Kosong')
            ->addData('Stok Akhir', $dataStokAkhir)
            ->addData('Trend Line', $trendline) // Tambahkan garis tren sebagai series tambahan
            ->setXAxis($dataTanggal) // Menggunakan data tanggal bulan tahun
            ->setHeight(400)
            ->setColors(['#394eea', '#ff0000']) // Warna terpakai dan garis tren
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }

    public function buildPaletTerpakaiChart(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Mengambil data terpakai dari database
        $datas = DataPaletTerpakai::select('stok_akhir', 'tanggal')->get();

        // Inisialisasi array untuk terpakai dan tanggal bulan tahun
        $dataStokAkhir = [];
        $dataTanggal = [];

        // Mengisi array dengan data dari database
        foreach ($datas as $data) {
            $dataStokAkhir[] = $data->stok_akhir;
            $dataTanggal[] = Carbon::parse($data->tanggal)->format('d M Y'); // Format tanggal bulan tahun
        }

        // Hitung garis tren
        $trendline = $this->calculateTrendline($dataStokAkhir);

        // Bangun chart
        return $this->chart->lineChart()
            ->setTitle('Data Stok Akhir Terpakai')
            ->addData('Stok Akhir', $dataStokAkhir)
            ->addData('Trend Line', $trendline) // Tambahkan garis tren sebagai series tambahan
            ->setXAxis($dataTanggal) // Menggunakan data tanggal bulan tahun
            ->setHeight(400)
            ->setColors(['#394eea', '#ff0000']) // Warna terpakai dan garis tren
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }

    protected function calculateTrendline($dataStokAkhir)
    {
        $n = count($dataStokAkhir);

        // Hitung gradien (slope) dan intercept (konstanta)
        $sumX = 0;
        $sumY = 0;
        $sumXY = 0;
        $sumX2 = 0;

        for ($i = 0; $i < $n; $i++) {
            $sumX += $i + 1;
            $sumY += $dataStokAkhir[$i];
            $sumXY += ($i + 1) * $dataStokAkhir[$i];
            $sumX2 += pow(($i + 1), 2);
        }

        $m = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - pow($sumX, 2));
        $c = ($sumY - $m * $sumX) / $n;

        // Bangun array data untuk garis tren
        $trendline = [];
        for ($i = 0; $i < $n; $i++) {
            $trendline[] = $m * ($i + 1) + $c;
        }

        return $trendline;
    }

    public function buildPrediksiChart($prediksiData): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Inisialisasi array untuk tanggal dan nilai prediksi
        $dates = [];
        $values = [];

        // Mengisi array dengan data dari $prediksiData
        foreach ($prediksiData as $data) {
            $dates[] = $data['Tanggal'];
            $values[] = $data['Prediksi Kebutuhan Palet'];
        }

        return $this->chart->lineChart()
            ->setTitle('Prediksi Kebutuhan Palet')
            ->addData('Prediksi', $values)
            ->setXAxis($dates)
            ->setHeight(400)
            ->setColors(['#394eea'])
            ->setFontColor('#6c757d')
            ->setFontFamily('Nunito, Segoe UI, Arial')
            ->setGrid();
    }

}
