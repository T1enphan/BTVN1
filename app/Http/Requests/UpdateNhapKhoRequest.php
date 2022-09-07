<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNhapKhoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                =>  'required|exists:nhap_khos,id',
            'so_luong_nhap'     =>  'nullable|numeric|min:0',
            'don_gia_nhap'      =>  'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                =>  'Phiếu nhập kho không tổn tại',
            'so_luong_nhap.*'     =>  'Số lượng nhập phải lớn hơn hoặc bằng 0',
            'don_gia_nhap.*'      =>  'Đơn giá nhập phải lớn hơn hoặc bằng 0',
        ];
    }
}
