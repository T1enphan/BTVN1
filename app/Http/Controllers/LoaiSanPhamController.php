<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoaiSanPhamRequest;
use App\Http\Requests\DeleteLoaiSanPhamRequest;
use App\Http\Requests\EditLoaiSanPhamRequest;
use App\Http\Requests\UpdateLoaiSanPhamRequest;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoaiSanPhamController extends Controller
{
    public function index()
    {
        $danhMucCha = LoaiSanPham::where('id_loai_san_pham_cha', 0)->get();

        return view('admin_lte.pages.loai_san_pham.index', compact('danhMucCha'));
    }

    public function getData()
    {
        $sql        = "SELECT A.TEN_LOAI_SAN_PHAM AS TEN_LOAI_CHA, B.*  FROM LOAI_SAN_PHAMS A RIGHT JOIN LOAI_SAN_PHAMS B ON A.ID = B.ID_LOAI_SAN_PHAM_CHA";
        $danhMuc    = DB::select($sql);

        return response()->json([
            'list' => $danhMuc,
        ]);
    }

    public function create(CreateLoaiSanPhamRequest $request)
    {
        LoaiSanPham::create([
            'ten_loai_san_pham'    =>   $request->ten_loai_san_pham,
            'slug_loai_san_pham'   =>   $request->slug_loai_san_pham,
            'is_open'              =>   $request->is_open,
            'id_loai_san_pham_cha' =>   $request->id_loai_san_pham_cha
        ]);

        return response()->json([
            'status'    => 1,
            'mess'      => 'Đã thêm mới thành công!',
        ]);
    }

    public function delete(DeleteLoaiSanPhamRequest $request)
    {
        $loaiSP = LoaiSanPham::where('id', $request->id)->first(); // trả về 1 object

        $loaiSP->delete();

        return response()->json([
            'status'    => 0,
            'mess'      => 'Đã xóa thành công!',
        ]);
    }

    public function update(UpdateLoaiSanPhamRequest $request)
    {
        $loaiSP = LoaiSanPham::where('id', $request->id)->first(); // trả về 1 object
        $loaiSP->ten_loai_san_pham      = $request->ten_loai_san_pham;
        $loaiSP->slug_loai_san_pham     = $request->slug_loai_san_pham;
        $loaiSP->is_open                = $request->is_open;
        $loaiSP->id_loai_san_pham_cha   = $request->id_loai_san_pham_cha;

        $loaiSP->save();

        return response()->json([
            'status'    => 1,
            'mess'      => 'Đã cập nhật thành công!',
        ]);
    }

    public function edit(DeleteLoaiSanPhamRequest $request)
    {
        $loaiSP = LoaiSanPham::where('id', $request->id)->first(); // trả về 1 object

        return response()->json([
            'xxx'      => $loaiSP,
        ]);
    }
}
