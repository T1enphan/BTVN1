<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckSlugSanPhamRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'slug'      =>      'required',
        ];
    }

    public function messages()
    {
        return [
            'slug.*'      =>    'Tên sản phẩm không được để trống',
        ];
    }
}
