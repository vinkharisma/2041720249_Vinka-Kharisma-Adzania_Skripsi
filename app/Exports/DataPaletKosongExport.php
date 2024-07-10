<?php

namespace App\Exports;

use App\Models\DataPaletKosong;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataPaletKosongExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPaletKosong::all();
    }
}
