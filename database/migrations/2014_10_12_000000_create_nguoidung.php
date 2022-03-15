<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoidung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_NguoiDung', function (Blueprint $table) {
            $table->bigIncrements('MaNguoiDung');
            $table->string('TenNguoiDung');
            $table->string('Email')->unique();
            $table->string('TenDangNhap')->unique();
            $table->string('MatKhau');
            $table->string('SoDienThoai',20);
            $table->string('AnhDaiDien');
            $table->bigInteger('MaQuyen');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
