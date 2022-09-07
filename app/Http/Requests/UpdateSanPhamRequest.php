<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                    =>  'required|exists:san_phams,id',
            'ten_san_pham'          =>  'required|min:4|max:50',
            'slug_san_pham'         =>  'required|min:4|max:50',
            'hinh_anh'              =>  'required',
            'mo_ta_ngan'            =>  'required|min:10',
            'mo_ta_chi_tiet'        =>  'required|min:10',
            'is_open'               =>  'required|boolean',
            'gia_ban'               =>  'required|numeric|min:0',
            'gia_khuyen_mai'        =>  'required|numeric|min:0|lte:gia_ban', // lte <= , lt <
            'id_loai_san_pham'      =>  'required|exists:loai_san_phams,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                    =>  'Sản phẩm không tồn tại',
            'ten_san_pham.*'          =>  'Tên sản phẩm từ 4 đến 50 ký tự',
            'slug_san_pham.*'         =>  'Slug sản phẩm từ 4 đến 50 ký tự',
            'hinh_anh.*'              =>  'Hình ảnh không được để trống',
            'mo_ta_ngan.*'            =>  'Mô tả ngắn phải từ 10 ký tự',
            'mo_ta_chi_tiet.*'        =>  'Mô tả chi tiết phải từ 10 ký tự',
            'is_open.*'               =>  'Bạn phải chọn tình trạng',
            'gia_ban.*'               =>  'Giá bán phải từ 0đ',
            'gia_khuyen_mai.*'        =>  'Giá khuyến mãi phải nhỏ hơn hoặc bằng giá bán', // lte <= , lt <
            'id_loai_san_pham.*'      =>  'Loại sản phẩm không tồn tại',
        ];
    }
}
