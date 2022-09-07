<?php

use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\NhapKhoController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [TestController::class, 'index']);
Route::get('/login', [TestController::class, 'login']);
Route::get('/checkout', [TestController::class, 'checkout']);



Route::group(['prefix' => '/admin-lte'], function() {
    Route::group(['prefix' => '/loai-san-pham'], function() {
        Route::get('/index', [LoaiSanPhamController::class, 'index']);
        Route::get('/data', [LoaiSanPhamController::class, 'getData']);

        Route::post('/create', [LoaiSanPhamController::class, 'create']);
        Route::post('/delete', [LoaiSanPhamController::class, 'delete']);
        Route::post('/update', [LoaiSanPhamController::class, 'update']);
        Route::post('/edit', [LoaiSanPhamController::class, 'edit']);
    });
    Route::group(['prefix' => '/chuyen-muc'], function() {
        Route::get('/index', [ChuyenMucController::class, 'index']);
        Route::get('/data', [ChuyenMucController::class, 'getData']);
        Route::post('/create', [ChuyenMucController::class, 'create']);
    });
    Route::group(['prefix' => '/san-pham'], function() {
        Route::get('/index', [SanPhamController::class, 'index']);
        Route::get('/data', [SanPhamController::class, 'getData']);

        Route::post('/create', [SanPhamController::class, 'create']);
        Route::post('/delete', [SanPhamController::class, 'detete']);
        Route::post('/update', [SanPhamController::class, 'update']);
        Route::post('/edit', [SanPhamController::class, 'edit']);
        Route::post('/status', [SanPhamController::class, 'status']);
        Route::post('/check-slug', [SanPhamController::class, 'checkSlug']);
        Route::post('/find-name', [SanPhamController::class, 'findName']);

        Route::get('/detail/{id}', [SanPhamController::class, 'detail']);
    });
    Route::group(['prefix' => '/nhap-kho'], function() {
        Route::get('/index', [NhapKhoController::class, 'index']);
        Route::get('/list', [NhapKhoController::class, 'list']);
        Route::get('/data', [NhapKhoController::class, 'getData']);

        Route::post('/create', [NhapKhoController::class, 'create']);
        Route::post('/delete', [NhapKhoController::class, 'delete']);
        Route::post('/update', [NhapKhoController::class, 'update']);

        Route::get('/create', [NhapKhoController::class, 'store']);
        Route::post('/detail', [NhapKhoController::class, 'detail']);

    });

    Route::group(['prefix' => '/chuyen-muc'], function() {
        Route::get('/index', [ChuyenMucController::class, 'index']);
        Route::get('/data', [ChuyenMucController::class, 'getData']);

        Route::post('/create', [ChuyenMucController::class, 'create']);
        Route::post('/delete', [ChuyenMucController::class, 'delete']);
        Route::post('/update', [ChuyenMucController::class, 'update']);
    });

    Route::group(['prefix' => '/bai-viet'], function() {
        Route::get('/index', [BaiVietController::class, 'index']);

        Route::get('/data', [BaiVietController::class, 'data']);
        Route::post('/create', [BaiVietController::class, 'create']);

        Route::post('/status', [BaiVietController::class, 'status']); // Đổi Trạng Thái Của Bài Viết
        Route::post('/check-slug', [BaiVietController::class, 'checkSlug']); // Kiểm Tra Xem Bài Viết Có Chưa???
        Route::post('/delete', [BaiVietController::class, 'delete']);
        Route::post('/update', [BaiVietController::class, 'update']);
    });
});
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
