<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHdb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ChiTietHDB', function (Blueprint $table) {
            $table->bigInteger('MaHDB');
            $table->bigInteger('MaSP');
            $table->integer('SoLuong');
            $table->double('DonGiaBan');
            $table->double('KhuyenMai');
            $table->double('ThanhTien');
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
        Schema::dropIfExists('tbl_ChiTietHDB');
    }
}
