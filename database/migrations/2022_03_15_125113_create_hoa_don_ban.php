<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonBan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_HoaDonBan', function (Blueprint $table) {
            $table->bigIncrements('MaHDB');
            $table->date('NgayTao');
            $table->string('TrangThai');
            $table->bigInteger('MaNguoiDung');
            $table->bigInteger('IDKM');
            $table->double('KhuyenMai');
            $table->double('TongTien');
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
        Schema::dropIfExists('tbl_HoaDonBan');
    }
}
