<?php

namespace App\Http\Controllers;

use App\Exports\DatasExport;
use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Imports\DatasImport;
use App\Models\Category;
use App\Models\Data;
use Illuminate\Http\Request;
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
        $datas = DB::table('datas')
            ->when($request->input('tanggal'), function ($query, $tanggal) {
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
            ->paginate(10);
        return view('datas.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Halaman tambah data
        return view('datas.create');
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
        return view('datas.edit')
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

        Excel::import(new DatasImport, public_path('/data/'.$namaFile));
        return redirect()->route('data.index')->with('success', 'Datas Imported Successfully');
    }
}
