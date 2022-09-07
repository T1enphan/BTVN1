<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChuyenMucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_chuyen_muc'        =>  'required|min:4|max:50',
            'slug_chuyen_muc'       =>  'required|min:4|max:50|unique:chuyen_mucs,slug_chuyen_muc',
            'is_open'               =>  'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'ten_chuyen_muc.*'        =>  'Tên chuyên mục phải từ 4 đến 50 ký tự',
            'slug_chuyen_muc.*'       =>  'Slug chuyên mục đã tồn tại hoặc phải từ 4 đến 50 ký tự',
            'is_open.*'               =>  'Tình trạng chỉ được chọn True/False',
        ];
    }
}
