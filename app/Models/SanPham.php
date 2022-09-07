<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_phams';

    protected $fillable = [
        'ten_san_pham',
        'slug_san_pham',
        'hinh_anh',
        'mo_ta_ngan',
        'mo_ta_chi_tiet',
        'so_luong',
        'is_open',
        'gia_ban',
        'gia_khuyen_mai',
        'id_loai_san_pham',
    ];
}
