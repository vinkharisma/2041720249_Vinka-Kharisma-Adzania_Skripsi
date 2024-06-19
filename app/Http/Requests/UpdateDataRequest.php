<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tanggal' => 'required|date_format:Y-m-d',
            'name' => 'required|string',
            'stok_awal' => 'required|string',
            'masuk' => 'required|string',
            'keluar' => 'required|string',
            'stok_akhir' => 'required|string',
            'jumlah_stok_palet_baik' => 'required|string',
            'jumlah_stok_palet_rusak' => 'required|string',
        ];
    }
}
