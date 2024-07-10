<?php

namespace App\Exports;

use App\Models\DataPaletTerpakai;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataPaletTerpakaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPaletTerpakai::all();
    }
}
