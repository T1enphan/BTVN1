<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->date('ngay_sinh');
            $table->string('que_quan');
            $table->string('so_cmnd')->unique();
            $table->string('so_dien_thoai')->nullable();
            $table->string('email')->nullable();
            $table->integer('tinh_trang')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sinh_viens');
    }
};
