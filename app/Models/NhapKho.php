<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    use HasFactory;

    protected $table = 'nhap_khos';

    protected $fillable = [
        'id_san_pham',
        'ten_san_pham',
        'don_gia_nhap',
        'so_luong_nhap',
        'lan_nhap_kho',
        'is_nhap_kho',
    ];
}
