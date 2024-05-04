<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'keterangan',
        'stok_awal',
        'masuk',
        'keluar',
        'stok_akhir',
        'jumlah_stok_palet_baik',
        'jumlah_stok_palet_rusak'
    ];
}
