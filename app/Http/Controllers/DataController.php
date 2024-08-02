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
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) { // Format YYYY-MM-DD
                return $query->whereDate('tanggal', $tanggal);
            } elseif (preg_match('/^\d{4}-\d{2}$/', $tanggal)) { // Format YYYY-MM
                return $query->whereBetween('tanggal', [
                    $tanggal . '-01',
                    $tanggal . '-31'
                ]);
            } elseif (preg_match('/^\d{4}$/', $tanggal)) { // Format YYYY
                return $query->whereYear('tanggal', $tanggal);
            }
            return $query;
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

        return redirect(route('data.index'))->with('success', 'Data Berhasil Ditambahkan');
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

    public function import(Request $request)
    {
        // Import excel ke data tables
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        // $file->move('Data', $namaFile);
        $file->move(public_path('/data/'), $namaFile);
        // $file->move(public_path('/data/'.$namaFile));

        Excel::import(new DatasImport, public_path('/data/'.$namaFile));
        return redirect()->route('data.index')->with('success', 'Datas Imported Successfully');
    }

}
