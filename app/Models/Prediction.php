<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    use HasFactory;
    // protected $table = 'predictions';
    protected $fillable = ['tanggal', 'hasil'];

    // Nonaktifkan timestamps
    public $timestamps = false;
}
