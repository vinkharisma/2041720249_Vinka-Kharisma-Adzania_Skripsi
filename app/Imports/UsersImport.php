<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'       => $row[1],
            'email'      => $row[2],
            'password'   => Hash::make($row[4]),
            'no_pegawai' => $row[8],
            'departemen' => $row[9],
            'no_hp'      => $row[10],
        ]);
    }
}
