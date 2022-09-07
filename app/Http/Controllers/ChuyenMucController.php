<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckIdChuyenMucRequest;
use App\Http\Requests\CreateChuyenMucRequest;
use App\Http\Requests\UpdateChuyenMucRequest;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class ChuyenMucController extends Controller
{
    public function getData()
    {
        $chuyenMuc = ChuyenMuc::get();

        return response()->json([
            'list'  => $chuyenMuc,
        ]);
    }

    public function index()
    {
        return view('admin_lte.pages.chuyen_muc.index');
    }

    public function create(CreateChuyenMucRequest $request)
    {
        ChuyenMuc::create($request->all());

        return response()->json([
            'status'  => true,
            'mess'    => 'Đã thêm mới chuyên mục thành công',
        ]);
    }

    public function delete(CheckIdChuyenMucRequest $request)
    {
        $chuyenMuc = ChuyenMuc::where('id', $request->id)->first();

        $chuyenMuc->delete();

        return response()->json([
            'status'  => true,
            'mess'    => 'Đã xóa chuyên mục thành công',
        ]);
    }

    public function update(UpdateChuyenMucRequest $request)
    {
        $chuyenMuc = ChuyenMuc::where('id', $request->id)->first();

        $chuyenMuc->update($request->all());

        return response()->json([
            'status'  => true,
            'mess'    => 'Đã cập nhật chuyên mục thành công',
        ]);
    }
}
