<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('slug_san_pham');
            $table->string('hinh_anh');
            $table->text('mo_ta_ngan');
            $table->longText('mo_ta_chi_tiet');
            $table->integer('so_luong')->default(0);
            $table->integer('is_open')->default(1);
            $table->integer('gia_ban')->default(0);
            $table->integer('gia_khuyen_mai')->default(0);
            $table->integer('id_loai_san_pham');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('san_phams');
    }
};
