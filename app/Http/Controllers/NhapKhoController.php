<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNhapKhoRequest;
use App\Http\Requests\DeleteNhapKhoRequest;
use App\Http\Requests\DetailNhapKhoRequest;
use App\Http\Requests\UpdateNhapKhoRequest;
use App\Models\NhapKho;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NhapKhoController extends Controller
{
    public function index()
    {
        return view('admin_lte.pages.nhap_kho.index');
    }

    public function getData()
    {
        $list = NhapKho::where('is_nhap_kho', 0)->get();

        return response()->json([
            'list'  => $list
        ]);
    }

    public function create(CreateNhapKhoRequest $request)
    {
        $sanPham = SanPham::where('id', $request->id)->first();

        $nhapKho = NhapKho::where('id_san_pham', $request->id)->where('is_nhap_kho', 0)->first();

        if($nhapKho) {
            $nhapKho->so_luong_nhap++;
            $nhapKho->save();
        } else {
            NhapKho::create([
                'id_san_pham'   => $request->id,
                'ten_san_pham'  => $sanPham->ten_san_pham,
                'so_luong_nhap' => 1,
            ]);
        }

        return response()->json([
            'status'    => true,
            'mess'      => 'Đã thêm sản phẩm vào kho'
        ]);
    }

    public function delete(DeleteNhapKhoRequest $request)
    {
        $nhapKho = NhapKho::where('id', $request->id)->where('is_nhap_kho', 0)->first();

        $nhapKho->delete();

        return response()->json([
            'status'    => true,
            'mess'      => 'Đã xóa sản phẩm khỏi kho'
        ]);
    }

    public function update(UpdateNhapKhoRequest $request)
    {
        $nhapKho = NhapKho::where('id', $request->id)->where('is_nhap_kho', 0)->first();
        if(isset($request->so_luong_nhap)) {
            $nhapKho->so_luong_nhap = $request->so_luong_nhap;
        }
        if(isset($request->don_gia_nhap)) {
            $nhapKho->don_gia_nhap = $request->don_gia_nhap;
        }
        $nhapKho->save();

        return response()->json([
            'status'    => true,
            'mess'      => 'Đã cập nhật kho!'
        ]);
    }

    public function store()
    {
        $lan_nhap = NhapKho::max('lan_nhap_kho');

        if($lan_nhap) {
            $lan_nhap = $lan_nhap + 1;
        } else {
            $lan_nhap = 1;
        }

        $list = NhapKho::where('is_nhap_kho', 0)->get();

        foreach($list as $key => $value) {
            $value->lan_nhap_kho = $lan_nhap;
            $value->is_nhap_kho = 1;
            $value->save();

        }

        return response()->json([
            'status'    => true,
            'mess'      => 'Đã nhâp kho thành công!'
        ]);
    }

    public function list()
    {
        $data = NhapKho::select('lan_nhap_kho', DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'))
                        ->groupBy('lan_nhap_kho', 'date')
                        ->get();
        return view('admin_lte.pages.nhap_kho.list', compact('data'));
    }

    public function detail(DetailNhapKhoRequest $request)
    {
        $list = NhapKho::where('lan_nhap_kho', $request->lan_nhap_kho_xx)
                       ->where('is_nhap_kho', 1)
                       ->get();
        return response()->json([
            'status'    => true,
            'mess'      => 'Đã hiển thị dữ liệu!',
            'list'      => $list,
        ]);
    }
}
