<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user.index')->only('index');
        $this->middleware('permission:user.create')->only('create', 'store');
        $this->middleware('permission:user.edit')->only('edit', 'update');
        $this->middleware('permission:user.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Index -> menampilkan tabel data

        Category::create([
            "name" => "Masuk User Page",
        ]);

        // Mengambil data
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($request->input('no_pegawai'), function ($query, $no_pegawai) {
                return $query->where('no_pegawai', 'like', '%' . $no_pegawai . '%');
            })
            ->when($request->input('departemen'), function ($query, $departemen) {
                return $query->where('departemen', 'like', '%' . $departemen . '%');
            })
            ->when($request->input('no_hp'), function ($query, $no_hp) {
                return $query->where('no_hp', 'like', '%' . $no_hp . '%');
            })
            ->select('id', 'name', 'email', 'no_pegawai', 'departemen', 'no_hp', DB::raw("DATE_FORMAT(created_at, '%d %M %Y') as created_at"))
            ->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Halaman tambah user
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // Simpan data
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'no_pegawai' => $request['no_pegawai'],
            'departemen' => $request['departemen'],
            'no_hp' => $request['no_hp'],
        ]);
        return redirect(route('user.index'))->with('success', 'Data Added Successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Nampilkan detail satu user
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Mengupdate data user ke database
        $validate = $request->validated();

        $user->update($validate);
        return redirect()->route('user.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Delete data
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Deleted Successfully');
    }

    public function export()
    {
        // Export data ke excel
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
        // Import excel ke data tables
        $users = Excel::toCollection(new UsersImport, $request->import_file);
        foreach ($users[0] as $user) {
            User::where('id', $user[0])->update([
                'name' => $user[1],
                'email' => $user[2],
                'password' => $user[3],
                'no_pegawai' => $user[7],
                'departemen' => $user[8],
                'no_hp' => $user[9],
            ]);
        }
        return redirect()->route('user.index');
    }
}
