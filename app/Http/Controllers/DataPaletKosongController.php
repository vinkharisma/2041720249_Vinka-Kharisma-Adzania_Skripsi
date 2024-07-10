<?php

namespace App\Http\Controllers;

use App\Exports\DataPaletKosongExport;
use App\Http\Requests\StoreDataPaletKosongRequest;
use App\Http\Requests\UpdateDataPaletKosongRequest;
use App\Imports\DatasPaletKosongImport;
use App\Models\Category;
use App\Models\DataPaletKosong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DataPaletKosongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:palet-kosong.index')->only('index');
        $this->middleware('permission:palet-kosong.create')->only('create', 'store');
        $this->middleware('permission:palet-kosong.edit')->only('edit', 'update');
        $this->middleware('permission:palet-kosong.destroy')->only('destroy');
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
        $palet_kosongs = DB::table('data_palet_kosong')
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
            ->paginate();
        return view('datas.palet-kosong.index', compact('palet_kosongs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Halaman tambah data
        return view('datas.palet-kosong.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataPaletKosongRequest $request)
    {
        DataPaletKosong::create($request->validated());

        return redirect(route('palet-kosong.index'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DataPaletKosong $palet_kosongs)
    {
        // Nampilkan detail satu data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPaletKosong $palet_kosong)
    {
        return view('datas.palet-kosong.edit')
            ->with('palet-kosong', $palet_kosong);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataPaletKosongRequest $request, DataPaletKosong $palet_kosong)
    {
        // Mengupdate data ke database
        $validate = $request->validated();

        $palet_kosong->update($validate);
        return redirect()->route('palet-kosong.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPaletKosong $palet_kosong)
    {
        // Delete data
        $palet_kosong->delete();
        return redirect()->route('palet-kosong.index')->with('success', 'Data Deleted Successfully');
    }

    public function export()
    {
        // Export data ke excel
        return Excel::download(new DataPaletKosongExport, 'palet_kosong_export.xlsx');
    }

    public function import(Request $request)
    {
        // Import excel ke data tables
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Data', $namaFile);

        Excel::import(new DatasPaletKosongImport, public_path('/data/'.$namaFile));
        return redirect()->route('palet-kosong.index')->with('success', 'Datas Imported Successfully');
    }
}
