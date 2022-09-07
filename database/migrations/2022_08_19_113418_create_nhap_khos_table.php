<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('nhap_khos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_san_pham');
            $table->string('ten_san_pham')->nullable();
            $table->integer('don_gia_nhap')->nullable();
            $table->integer('so_luong_nhap')->nullable();
            $table->integer('lan_nhap_kho')->nullable();
            $table->integer('is_nhap_kho')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhap_khos');
    }
};
