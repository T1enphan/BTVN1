<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteNhapKhoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:nhap_khos,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'    =>  'Sản phẩm nhập kho không tồn tại',
        ];
    }
}
