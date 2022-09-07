<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBaiVietRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:bai_viets,id',
        ];
    }
    public function messages()
    {
        return[
            'id.*' =>'Bài viết không tồn tại',
        ];
    }
}
