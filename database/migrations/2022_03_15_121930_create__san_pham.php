<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_SanPham', function (Blueprint $table) {
            $table->bigIncrements('MaSP');
            $table->string('TenSP',100);
            $table->integer('SoLuong');
            $table->double('DonGiaNhap');
            $table->double('DonGiaBan');
            $table->string('Anh');
            $table->string('MoTa');
            $table->bigInteger('MaNSX');
            $table->bigInteger('MaLoai');
            $table->double('KhuyenMai');
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
        Schema::dropIfExists('tbl_SanPham');
    }
}
