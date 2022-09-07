<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBaiVietRequest;
use App\Http\Requests\DeleteBaiVietRequest;
use App\Http\Requests\UpdateBaiVietRequest;
use App\Models\BaiViet;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function index()
    {
        $chuyenMuc = ChuyenMuc::where('is_open', 1)->get();

        return view('admin_lte.pages.bai_viet.index', compact('chuyenMuc'));
    }

    public function create(CreateBaiVietRequest $request)
    {
        $data = $request->all();

        BaiViet::create($data);

        return response()->json([
            'status'    => true,
            'mess'      => 'Đã thêm mới bài viết thành công!',
        ]);
    }

    public function data()
    {
        $danhSachBaiViet = BaiViet::get(); // BaiViet::all();

        return response()->json([
            'danhSachBaiViet'   => $danhSachBaiViet,
        ]);
    }
    public function delete(DeleteBaiVietRequest $request){
        $danhSachBaiViet = BaiViet::where('id',$request->id)->first();
        $danhSachBaiViet->delete();
        return response()->json([
            'status'   => true,
            'mess'     => 'Đã xóa bài viết',
        ]);
    }
    public function update(UpdateBaiVietRequest $request){
        $danhSachBaiViet = BaiViet::where('id',$request->id)->first();
        $danhSachBaiViet->update($request->all());

        return response()->json([
            'status'  => true,
            'mess'    => 'Đã cập nhật bài việt thành công',
        ]);
    }
    public function checkSlug(DeleteBaiVietRequest $request){
        $danhSachBaiViet = BaiViet::where('slug_bai_viet',$request->slug)->first();
        if($danhSachBaiViet){
            return response()->json([
                'status'    => 0,
                'mess'      => 'Tên bài viết đã tồn tại!'
            ]);
        }else {
            return response()->json([
                'status'    => 1,
                'mess'      => 'Tên sản phẩm có thể sử dụng!'
            ]);
        }

    }
}

