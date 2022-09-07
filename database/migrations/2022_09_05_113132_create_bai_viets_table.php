<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de_bai_viet');
            $table->string('slug_bai_viet');
            $table->string('hinh_anh_bai_viet');
            $table->text('mo_ta_ngan_bai_viet');
            $table->longText('mo_ta_chi_tiet_bai_viet');
            $table->integer('chuyen_muc_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bai_viets');
    }
};
