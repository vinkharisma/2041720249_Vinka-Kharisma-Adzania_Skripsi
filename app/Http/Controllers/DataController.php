<?php

namespace App\Http\Controllers;

use App\Exports\DatasExport;
use App\Http\Requests\StoreDataRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Imports\DatasImport;
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
        // Mengambil data

        $datas = DB::table('datas')
            // ->when($request->input('name'), function ($query, $name) {
            //     return $query->where('name', 'like', '%' . $name . '%');
            // })
            // ->select('id', 'name', 'email', DB::raw("DATE_FORMAT(created_at, '%d %M %Y') as created_at"))

            ->when($request->input('tanggal'), function ($query, $tanggal) {
                return $query->where('data.tanggal', 'like', '%' . $tanggal . '%');
            })
            ->when($request->input('keterangan'), function ($query, $keterangan) {
                return $query->where('data.keterangan', 'like', '%' . $keterangan . '%');
            })
            ->when($request->input('stok_awal'), function ($query, $stok_awal) {
                return $query->where('data.stok_awal', 'like', '%' . $stok_awal . '%');
            })
            ->when($request->input('masuk'), function ($query, $masuk) {
                return $query->where('data.masuk', 'like', '%' . $masuk . '%');
            })
            ->when($request->input('keluar'), function ($query, $keluar) {
                return $query->where('data.keluar', 'like', '%' . $keluar . '%');
            })
            ->when($request->input('stok_akhir'), function ($query, $stok_akhir) {
                return $query->where('data.stok_akhir', 'like', '%' . $stok_akhir . '%');
            })
            ->when($request->input('jumlah_stok_palet_baik'), function ($query, $jumlah_stok_palet_baik) {
                return $query->where('data.jumlah_stok_palet_baik', 'like', '%' . $jumlah_stok_palet_baik . '%');
            })
            ->when($request->input('jumlah_stok_palet_rusak'), function ($query, $jumlah_stok_palet_rusak) {
                return $query->where('data.jumlah_stok_palet_rusak', 'like', '%' . $jumlah_stok_palet_rusak . '%');
            })
            ->paginate(10);
        return view('data.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Halaman tambah data
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataRequest $request)
    {
        // $this->validate($request,[

        //     'tanggal' => 'required',
        //     'keterangan' => 'required',
        //     'stok_awal' => 'required',
        //     'masuk' => 'required',
        //     'keluar' =>'required',
        //     'stok_akhir' => 'required',
        //     'jumlah_stok_palet_baik' => 'required',
        //     'jumlah_stok_palet_rusak' => 'required',

        // ]);

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

        $data = new Data;
        $data->tanggal=$request->tanggal;
        $data->keterangan->$request->keterangan;
        $data->stok_awal->$request->stok_awal;
        $data->masuk->$request->masuk;
        $data->keluar->$request->keluar;
        $data->stok_akhir->$request->stok_akhir;
        $data->jumlah_stok_palet_baik->$request->jumlah_stok_palet_baik;
        $data->jumlah_stok_palet_rusak->$request->jumlah_stok_palet_rusak;
        $data->save();

        return redirect(route('data.index'))->with('success', 'Data Berhasil Ditambahkan');


        // Simpan data
        // Data::create([
        //     'tanggal' => $request->tanggal,
        //     'keterangan' => $request->keterangan,
        //     'stok_awal' => $request->stok_awal,
        //     'masuk' => $request->masuk,
        //     'keluar' => $request->keluar,
        //     'stok_akhir' => $request->stok_akhir,
        //     'jumlah_stok_palet_baik' => $request->jumlah_stok_palet_baik,
        //     'jumlah_stok_palet_rusak' => $request->jumlah_stok_palet_rusak,

        //     // 'tanggal' => $request['tanggal'],
        //     // 'keterangan' => $request['keterangan'],
        //     // 'stok_awal' => $request['stok_awal'],
        //     // 'masuk' => $request['masuk'],
        //     // 'keluar' => $request['keluar'],
        //     // 'stok_akhir' => $request['stok_akhir'],
        //     // 'jumlah_stok_palet_baik' => $request['jumlah_stok_palet_baik'],
        //     // 'jumlah_stok_palet_rusak' => $request['jumlah_stok_palet_rusak'],

        //     // 'password' => Hash::make($request['password']),
        // ]);
        // // Data::create($request->validate());
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
    public function edit(Data $datas)
    {
        return view('data.edit')
            ->with('data', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataRequest $request, Data $datas)
    {
        // Mengupdate data ke database
        $validate = $request->validated();

        $datas->update($validate);
        return redirect()->route('data.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $datas)
    {
        // Delete data
        $datas->delete();
        return redirect()->route('data.index')->with('success', 'Data Deleted Successfully');
    }

    public function export()
    {
        // Export data ke excel
        return Excel::download(new DatasExport, 'data.xlsx');
    }

    public function import(Request $request)
    {
        // Import excel ke data tables
        $datas = Excel::toCollection(new DatasImport, $request->import_file);
        foreach ($datas[0] as $data) {
            Data::where('id', $data[0])->update([
                'tanggal' => $data[1],
                'keterangan' => $data[2],
                'stok_awal' => $data[3],
                'masuk' => $data[4],
                'keluar' => $data[5],
                'stok_akhir' => $data[6],
                'jumlah_stok_palet_baik' => $data[7],
                'jumlah_stok_palet_rusak' => $data[8],
            ]);
        }
        return redirect()->route('data.index');
    }
}
