<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailNhapKhoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lan_nhap_kho_xx'  =>   'required|exists:nhap_khos,lan_nhap_kho',
        ];
    }
}
