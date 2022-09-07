<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteLoaiSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:loai_san_phams,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'    =>  'Loại sản phẩm không tồn tại!',
        ];
    }
}
