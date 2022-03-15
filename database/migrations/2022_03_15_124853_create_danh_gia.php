<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_DanhGia', function (Blueprint $table) {
            $table->bigIncrements('MaDanhGia');
            $table->integer('Sao');
            $table->bigInteger('MaSP');
            $table->bigInteger('MaNguoiDung');
            $table->bigInteger('MaHDB');
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
        Schema::dropIfExists('tbl_DanhGia');
    }
}
