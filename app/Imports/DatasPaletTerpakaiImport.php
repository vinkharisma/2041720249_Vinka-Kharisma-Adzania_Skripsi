<?php

namespace App\Imports;

use App\Models\DataPaletTerpakai;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class DatasPaletTerpakaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataPaletTerpakai([
            'tanggal'                   => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])),
            'name'                      => $row[2],
            'stok_awal'                 => $row[3],
            'masuk'                     => $row[4],
            'keluar'                    => $row[5],
            'stok_akhir'                => $row[6],
            'jumlah_stok_palet_baik'    => $row[7],
            'jumlah_stok_palet_rusak'   => $row[8],
        ]);
    }
}
