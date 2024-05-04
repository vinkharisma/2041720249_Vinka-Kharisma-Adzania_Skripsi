<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            //
            'tanggal' => 'required|string',
            'keterangan' => 'required|string',
            'stok_awal' => 'required|string',
            'masuk' => 'required|string',
            'keluar' => 'required|string',
            'stok_akhir' => 'required|string',
            'jumlah_stok_palet_baik' => 'required|string',
            'jumlah_stok_palet_rusak' => 'required|string',
        ];
    }
}
