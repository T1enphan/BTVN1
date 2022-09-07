<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLoaiSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                   =>   'required|exists:loai_san_phams,id',
            'ten_loai_san_pham'    =>   'required|min:4|max:30',
            'slug_loai_san_pham'   =>   'required|min:4|max:30',
            'is_open'              =>   'required|boolean',
            'id_loai_san_pham_cha' =>   'required',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                   =>   'Loại sản phẩm không tồn tại',
            'ten_loai_san_pham.*'    =>   'Tên loại sản phẩm phải từ 4 đến 30 ký tự',
            'slug_loai_san_pham.*'   =>   'Slug loại sản phẩm phải từ 4 đến 30 ký tự',
            'is_open.*'              =>   'Tình trạng yêu cầu phải chọn đúng',
            'id_loai_san_pham_cha.*' =>   'Loại sản phẩm cha không được để trống',
        ];
    }
}
