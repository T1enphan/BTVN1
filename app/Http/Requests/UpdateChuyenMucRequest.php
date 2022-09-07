<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChuyenMucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                    =>  'required|exists:chuyen_mucs,id',
            'ten_chuyen_muc'        =>  'required|min:4|max:50',
            'slug_chuyen_muc'       =>  'required|min:4|max:50|unique:chuyen_mucs,slug_chuyen_muc',
            'is_open'               =>  'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                    =>  'Chuyên mục không tồn tại',
            'ten_chuyen_muc.*'        =>  'Tên chuyên mục phải từ 4 đến 50 ký tự',
            'slug_chuyen_muc.*'       =>  'Slug chuyên mục đã tồn tại hoặc phải từ 4 đến 50 ký tự',
            'is_open.*'               =>  'Tình trạng chỉ được chọn True/False',
        ];
    }
}
