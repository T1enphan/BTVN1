<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loai_san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_loai_san_pham');
            $table->string('slug_loai_san_pham');
            $table->integer('is_open')->default(1);
            $table->integer('id_loai_san_pham_cha')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loai_san_phams');
    }
};
