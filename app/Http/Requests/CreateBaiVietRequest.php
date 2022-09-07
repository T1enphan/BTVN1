<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBaiVietRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tieu_de_bai_viet'              =>  'required',
            'slug_bai_viet'                 =>  'required',
            'hinh_anh_bai_viet'             =>  'required',
            'mo_ta_ngan_bai_viet'           =>  'required',
            'mo_ta_chi_tiet_bai_viet'       =>  'required',
            'chuyen_muc_id'                 =>  'required|exists:chuyen_mucs,id',
            'is_open'                       =>  'required|boolean',
        ];
    }
}
