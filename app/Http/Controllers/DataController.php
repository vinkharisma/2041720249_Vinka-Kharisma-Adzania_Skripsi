<?php

namespace App\Http\Controllers;

use App\Exports\DatasExport;
use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Imports\DatasImport;
use App\Models\Category;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:data.index')->only('index');
        $this->middleware('permission:data.create')->only('create', 'store');
        $this->middleware('permission:data.edit')->only('edit', 'update');
        $this->middleware('permission:data.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Index -> menampilkan tabel data
        // Category::create([
        //     "name" => "Masuk Data Page",
        // ]);

        // Mengambil data
        $datas = Data::when($request->input('tanggal'), function ($query, $tanggal) {
            return $query->where('tanggal', 'like', '%' . $tanggal . '%');
            })
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($request->input('stok_awal'), function ($query, $stok_awal) {
                return $query->where('stok_awal', 'like', '%' . $stok_awal . '%');
            })
            ->when($request->input('masuk'), function ($query, $masuk) {
                return $query->where('masuk', 'like', '%' . $masuk . '%');
            })
            ->when($request->input('keluar'), function ($query, $keluar) {
                return $query->where('keluar', 'like', '%' . $keluar . '%');
            })
            ->when($request->input('stok_akhir'), function ($query, $stok_akhir) {
                return $query->where('stok_akhir', 'like', '%' . $stok_akhir . '%');
            })
            ->when($request->input('jumlah_stok_palet_baik'), function ($query, $jumlah_stok_palet_baik) {
                return $query->where('jumlah_stok_palet_baik', 'like', '%' . $jumlah_stok_palet_baik . '%');
            })
            ->when($request->input('jumlah_stok_palet_rusak'), function ($query, $jumlah_stok_palet_rusak) {
                return $query->where('jumlah_stok_palet_rusak', 'like', '%' . $jumlah_stok_palet_rusak . '%');
            })
            ->select('id', DB::raw("DATE_FORMAT(tanggal, '%d %M %Y') as tanggal"), 'name', 'stok_awal', 'masuk', 'keluar', 'stok_akhir', 'jumlah_stok_palet_baik', 'jumlah_stok_palet_rusak', DB::raw("DATE_FORMAT(created_at, '%d %M %Y') as created_at"))
            ->paginate();
        return view('datas.data.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Halaman tambah data
        return view('datas.data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataRequest $request)
    {
        Data::create($request->validated());

        // $request->validate([

        //     'tanggal' => 'required',
        //     'name' => 'required',
        //     'stok_awal' => 'required',
        //     'masuk' => 'required',
        //     'keluar' =>'required',
        //     'stok_akhir' => 'required',
        //     'jumlah_stok_palet_baik' => 'required',
        //     'jumlah_stok_palet_rusak' => 'required',

        // ]);

        // Data::create($request->all());


        // $this->validate($request,[
        //     'user_id' => 'required',
        //     'jenis_pupuk' => 'required',
        //     'tanggal_penjualan' => 'required',
        //     'stok_awal' => 'required',
        //     'total_pemasukkan' => 'required',
        //     'total_pengeluaran' => 'required',
        //     'stok_akhir_siap_jual' => 'required',
        //     'stok_akhir_rusak' => 'required',
        //     'stok_akhir' => 'required',
        //     'kebutuhan_kantong' => 'required'
        // ]);

        // $data = new Data;
        // $data->tanggal=$request->tanggal;
        // $data->name->$request->name;
        // $data->stok_awal->$request->stok_awal;
        // $data->masuk->$request->masuk;
        // $data->keluar->$request->keluar;
        // $data->stok_akhir->$request->stok_akhir;
        // $data->jumlah_stok_palet_baik->$request->jumlah_stok_palet_baik;
        // $data->jumlah_stok_palet_rusak->$request->jumlah_stok_palet_rusak;
        // $data->save();

        return redirect(route('data.index'))->with('success', 'Data Berhasil Ditambahkan');


        // Simpan data
        // Data::create([
        //     'tanggal' => $request->tanggal,
        //     'name' => $request->name,
        //     'stok_awal' => $request->stok_awal,
        //     'masuk' => $request->masuk,
        //     'keluar' => $request->keluar,
        //     'stok_akhir' => $request->stok_akhir,
        //     'jumlah_stok_palet_baik' => $request->jumlah_stok_palet_baik,
        //     'jumlah_stok_palet_rusak' => $request->jumlah_stok_palet_rusak,

        //     // 'tanggal' => $request['tanggal'],
        //     // 'name' => $request['name'],
        //     // 'stok_awal' => $request['stok_awal'],
        //     // 'masuk' => $request['masuk'],
        //     // 'keluar' => $request['keluar'],
        //     // 'stok_akhir' => $request['stok_akhir'],
        //     // 'jumlah_stok_palet_baik' => $request['jumlah_stok_palet_baik'],
        //     // 'jumlah_stok_palet_rusak' => $request['jumlah_stok_palet_rusak'],
        // ]);
        // return redirect(route('data.index'))->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Data $datas)
    {
        // Nampilkan detail satu data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        return view('datas.data.edit')
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataRequest $request, Data $data)
    {
        // Mengupdate data ke database
        $validate = $request->validated();

        $data->update($validate);
        return redirect()->route('data.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        // Delete data
        $data->delete();
        return redirect()->route('data.index')->with('success', 'Data Deleted Successfully');
    }

    public function export()
    {
        // Export data ke excel
        return Excel::download(new DatasExport, 'data_export.xlsx');
    }

    // public function import(Request $request)
    // {
    //     // Import excel ke data tables
    //     $datas = Excel::toCollection(new DatasImport, $request->file);
    //     foreach ($datas[0] as $data) {
    //         Data::where('id', $data[0])->update([
    //             'tanggal' => $data[1],
    //             'name' => $data[2],
    //             'stok_awal' => $data[3],
    //             'masuk' => $data[4],
    //             'keluar' => $data[5],
    //             'stok_akhir' => $data[6],
    //             'jumlah_stok_palet_baik' => $data[7],
    //             'jumlah_stok_palet_rusak' => $data[8],
    //         ]);
    //     }
    //     return redirect()->route('data.index')->with('success', 'Datas Imported Successfully');
    // }

    public function import(Request $request)
    {
        // Import excel ke data tables
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Data', $namaFile);
        // $file->move(asset('/data/'.$namaFile));
        // $file->move(public_path('/data/'.$namaFile));

        Excel::import(new DatasImport, public_path('/data/'.$namaFile));
        return redirect()->route('data.index')->with('success', 'Datas Imported Successfully');
    }

    // public function prediction()
    // {
    //     $datas = Data::all(); // Fetch all necessary data for prediction

    //     // Calculate statistics
    //     $stok_akhir = $datas->pluck('stok_akhir')->toArray();
    //     $count = count($stok_akhir);
    //     $mean = $count > 0 ? array_sum($stok_akhir) / $count : 0;
    //     $std = $count > 1 ? sqrt(array_sum(array_map(function ($x) use ($mean) { return pow($x - $mean, 2); }, $stok_akhir)) / ($count - 1)) : 0;
    //     sort($stok_akhir);
    //     $min = reset($stok_akhir);
    //     $max = end($stok_akhir);
    //     $percentiles = [
    //         '25th_percentile' => $stok_akhir[floor(0.25 * ($count + 1)) - 1],
    //         'median' => $stok_akhir[floor(0.5 * ($count + 1)) - 1],
    //         '75th_percentile' => $stok_akhir[floor(0.75 * ($count + 1)) - 1],
    //     ];

    //     // Pass statistics to the view
    //     $stats = [
    //         'count' => $count,
    //         'mean' => $mean,
    //         'std' => $std,
    //         'min' => $min,
    //         '25th_percentile' => $percentiles['25th_percentile'],
    //         'median' => $percentiles['median'],
    //         '75th_percentile' => $percentiles['75th_percentile'],
    //         'max' => $max,
    //     ];

    //     return view('predictions.index', compact('stats'));
    // }

    // public function prediction()
    // {
    //     // Ambil semua data yang diperlukan untuk prediksi
    //     $datas = Data::all();

    //     // Hitung ACF sampai lag 30
    //     $stok_akhir = $datas->pluck('stok_akhir')->toArray();
    //     $acf = $this->calculateACF($stok_akhir, 30);

    //     // Hitung statistik (count, mean, std, dll.)
    //     $count = count($stok_akhir);
    //     $mean = $count > 0 ? array_sum($stok_akhir) / $count : 0;
    //     $std = $count > 1 ? sqrt(array_sum(array_map(function ($x) use ($mean) { return pow($x - $mean, 2); }, $stok_akhir)) / ($count - 1)) : 0;
    //     sort($stok_akhir);
    //     $min = reset($stok_akhir);
    //     $max = end($stok_akhir);
    //     $percentiles = [
    //         '25th_percentile' => $stok_akhir[floor(0.25 * ($count + 1)) - 1],
    //         'median' => $stok_akhir[floor(0.5 * ($count + 1)) - 1],
    //         '75th_percentile' => $stok_akhir[floor(0.75 * ($count + 1)) - 1],
    //     ];

    //     // Kirim statistik dan ACF ke view
    //     $stats = [
    //         'count' => $count,
    //         'mean' => $mean,
    //         'std' => $std,
    //         'min' => $min,
    //         '25th_percentile' => $percentiles['25th_percentile'],
    //         'median' => $percentiles['median'],
    //         '75th_percentile' => $percentiles['75th_percentile'],
    //         'max' => $max,
    //     ];

    //     return view('predictions.index', compact('stats', 'acf'));
    // }

    // // Fungsi untuk menghitung ACF
    // private function calculateACF($data, $maxlag)
    // {
    //     $acf = [];

    //     for ($lag = 1; $lag <= $maxlag; $lag++) {
    //         $acf[] = $this->autocorrelation($data, $lag);
    //     }

    //     return $acf;
    // }

    // // Fungsi untuk menghitung autocorrelation
    // private function autocorrelation($data, $lag)
    // {
    //     $n = count($data);
    //     $mean = array_sum($data) / $n;
    //     $numerator = 0;
    //     $denominator = 0;

    //     for ($i = 0; $i < $n - $lag; $i++) {
    //         $numerator += ($data[$i] - $mean) * ($data[$i + $lag] - $mean);
    //     }

    //     for ($i = 0; $i < $n; $i++) {
    //         $denominator += pow($data[$i] - $mean, 2);
    //     }

    //     return $numerator / $denominator;
    // }

    // public function prediction()
    // {
    //     // Ambil semua data yang diperlukan untuk prediksi
    //     $datas = Data::all();

    //     // Hitung ACF sampai lag 30
    //     $stok_akhir = $datas->pluck('stok_akhir')->toArray();
    //     $acf = $this->calculateACF($stok_akhir, 30);

    //     // Hitung PACF sampai lag 30
    //     $pacf = $this->calculatePACF($acf);

    //     // Hitung statistik (count, mean, std, dll.)
    //     $count = count($stok_akhir);
    //     $mean = $count > 0 ? array_sum($stok_akhir) / $count : 0;
    //     $std = $count > 1 ? sqrt(array_sum(array_map(function ($x) use ($mean) { return pow($x - $mean, 2); }, $stok_akhir)) / ($count - 1)) : 0;
    //     sort($stok_akhir);
    //     $min = reset($stok_akhir);
    //     $max = end($stok_akhir);
    //     $percentiles = [
    //         '25th_percentile' => $stok_akhir[floor(0.25 * ($count + 1)) - 1],
    //         'median' => $stok_akhir[floor(0.5 * ($count + 1)) - 1],
    //         '75th_percentile' => $stok_akhir[floor(0.75 * ($count + 1)) - 1],
    //     ];

    //     // Kirim statistik, ACF, dan PACF ke view
    //     $stats = [
    //         'count' => $count,
    //         'mean' => $mean,
    //         'std' => $std,
    //         'min' => $min,
    //         '25th_percentile' => $percentiles['25th_percentile'],
    //         'median' => $percentiles['median'],
    //         '75th_percentile' => $percentiles['75th_percentile'],
    //         'max' => $max,
    //     ];

    //     return view('predictions.index', compact('stats', 'acf', 'pacf'));
    // }

    // // Fungsi untuk menghitung ACF
    // private function calculateACF($data, $maxlag)
    // {
    //     $acf = [];

    //     for ($lag = 1; $lag <= $maxlag; $lag++) {
    //         $acf[] = $this->autocorrelation($data, $lag);
    //     }

    //     return $acf;
    // }

    // // Fungsi untuk menghitung autocorrelation
    // private function autocorrelation($data, $lag)
    // {
    //     $n = count($data);
    //     $mean = array_sum($data) / $n;
    //     $numerator = 0;
    //     $denominator = 0;

    //     for ($i = 0; $i < $n - $lag; $i++) {
    //         $numerator += ($data[$i] - $mean) * ($data[$i + $lag] - $mean);
    //     }

    //     for ($i = 0; $i < $n; $i++) {
    //         $denominator += pow($data[$i] - $mean, 2);
    //     }

    //     return $numerator / $denominator;
    // }

    // // Fungsi untuk menghitung PACF
    // private function calculatePACF($acf)
    // {
    //     $pacf = [];
    //     $pacf[0] = 1.0; // PACF untuk lag 0 adalah 1

    //     // Hitung PACF untuk lag 1 hingga maxlag
    //     for ($k = 1; $k < count($acf); $k++) {
    //         $numerator = $acf[$k];

    //         for ($j = 1; $j < $k; $j++) {
    //             $numerator -= $pacf[$j] * $acf[$k - $j];
    //         }

    //         $denominator = 1;

    //         for ($j = 1; $j < $k; $j++) {
    //             $denominator -= $pacf[$j] * $acf[$j];
    //         }

    //         if ($denominator != 0) {
    //             $pacf[$k] = $numerator / $denominator;
    //         } else {
    //             $pacf[$k] = 0;
    //         }
    //     }

    //     return $pacf;
    // }

//     public function prediction()
//     {
//         $datas = Data::all();

//         $stok_akhir = $datas->pluck('stok_akhir')->toArray();
//         $acf = $this->calculateACF($stok_akhir, 30);
//         $pacf = $this->calculatePACF($acf);

//         $count = count($stok_akhir);
//         $mean = $count > 0 ? array_sum($stok_akhir) / $count : 0;
//         $std = $count > 1 ? sqrt(array_sum(array_map(function ($x) use ($mean) {
//             return pow($x - $mean, 2);
//         }, $stok_akhir)) / ($count - 1)) : 0;
//         sort($stok_akhir);
//         $min = reset($stok_akhir);
//         $max = end($stok_akhir);
//         $percentiles = [
//             '25th_percentile' => $stok_akhir[floor(0.25 * ($count + 1)) - 1],
//             'median' => $stok_akhir[floor(0.5 * ($count + 1)) - 1],
//             '75th_percentile' => $stok_akhir[floor(0.75 * ($count + 1)) - 1],
//         ];

//         $stats = [
//             'count' => $count,
//             'mean' => $mean,
//             'std' => $std,
//             'min' => $min,
//             '25th_percentile' => $percentiles['25th_percentile'],
//             'median' => $percentiles['median'],
//             '75th_percentile' => $percentiles['75th_percentile'],
//             'max' => $max,
//         ];

//         return view('predictions.index', compact('stats', 'acf', 'pacf'));
//     }

//     private function calculateACF($data, $maxlag)
//     {
//         $acf = [];

//         for ($lag = 1; $lag <= $maxlag; $lag++) {
//             $acf[] = $this->autocorrelation($data, $lag);
//         }

//         return $acf;
//     }

//     private function autocorrelation($data, $lag)
//     {
//         $n = count($data);
//         $mean = array_sum($data) / $n;
//         $numerator = 0;
//         $denominator = 0;

//         for ($i = 0; $i < $n - $lag; $i++) {
//             $numerator += ($data[$i] - $mean) * ($data[$i + $lag] - $mean);
//         }

//         for ($i = 0; $i < $n; $denominator += pow($data[$i] - $mean, 2), $i++) {
//             // No change needed here
//         }

//         return $numerator / $denominator;
//     }

// //     private function calculatePACF($acf)
// // {
// //     $n = count($acf);
// //     $pacf = array_fill(0, $n + 1, 0);
// //     $phi = array_fill(0, $n + 1, array_fill(0, $n + 1, 0));

// //     // Initialize the first PACF value
// //     $pacf[0] = 1; // PACF of lag 0 is always 1
// //     $phi[1][1] = $acf[0];
// //     $pacf[1] = $acf[0];

// //     for ($k = 2; $k <= $n; $k++) {
// //         $sum = 0;
// //         for ($j = 1; $j < $k; $j++) {
// //             $sum += $phi[$k-1][$j] * $acf[$k-$j-1];
// //         }
// //         $phi[$k][$k] = ($acf[$k-1] - $sum) / (1 - $sum);

// //         for ($j = 1; $j < $k; $j++) {
// //             $phi[$k][$j] = $phi[$k-1][$j] - $phi[$k][$k] * $phi[$k-1][$k-$j];
// //         }

// //         $pacf[$k] = $phi[$k][$k];
// //     }

// //     return array_slice($pacf, 1); // Exclude the first element which is always 1
// // }

// private function calculatePACF($acf)
// {
//     $n = count($acf);
//     $pacf = array_fill(0, $n + 1, 0);
//     $phi = array_fill(0, $n + 1, array_fill(0, $n + 1, 0));

//     // Initialize the first PACF value
//     $pacf[0] = 1; // PACF of lag 0 is always 1
//     $phi[1][1] = $acf[0];
//     $pacf[1] = $acf[0];

//     for ($k = 2; $k <= $n; $k++) {
//         $sum = 0;
//         for ($j = 1; $j < $k; $j++) {
//             $sum += $phi[$k-1][$j] * $acf[$k-$j-1];
//         }
//         $phi[$k][$k] = ($acf[$k-1] - $sum) / (1 - $sum);

//         for ($j = 1; $j < $k; $j++) {
//             $phi[$k][$j] = $phi[$k-1][$j] - $phi[$k][$k] * $phi[$k-1][$k-$j];
//         }

//         $pacf[$k] = $phi[$k][$k];
//     }

//     return array_slice($pacf, 1); // Exclude the first element which is always 1
// }

    // private function calculatePACF($acf)
    // {
    //     $n = count($acf);
    //     $pacf = array_fill(0, $n, 0.0); // Initialize PACF array
    //     $phi = array_fill(0, $n, array_fill(0, $n, 0.0)); // Initialize phi array

    //     // Calculate PACF for lag 0 (always 1.0)
    //     $pacf[0] = 1.0;

    //     // Calculate PACF for lag 1 to n-1
    //     for ($k = 1; $k < $n; $k++) {
    //         $sum = 0;
    //         for ($j = 1; $j < $k; $j++) {
    //             $sum += $phi[$k-1][$j] * $acf[$k-$j-1];
    //         }
    //         $phi[$k][$k] = ($acf[$k-1] - $sum) / (1 - $sum);

    //         for ($j = 1; $j < $k; $j++) {
    //             $phi[$k][$j] = $phi[$k-1][$j] - $phi[$k][$k] * $phi[$k-1][$k-$j];
    //         }

    //         $pacf[$k] = $phi[$k][$k];
    //     }

    //     return array_slice($pacf, 1); // Exclude the first element which is always 1
    // }



}
