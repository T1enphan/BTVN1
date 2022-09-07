<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;

    protected $table = 'loai_san_phams';

    protected $fillable = [
        'ten_loai_san_pham',
        'slug_loai_san_pham',
        'is_open',
        'id_loai_san_pham_cha'
    ];
}
