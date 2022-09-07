<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckIdChuyenMucRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:chuyen_mucs,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'  =>  'Chuyên mục không tồn tại!',
        ];
    }
}
