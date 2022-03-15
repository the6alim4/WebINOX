<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenMai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_KhuyenMai', function (Blueprint $table) {
            $table->bigIncrements('IDKM');
            $table->string('TenKM',100);
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');
            $table->integer('SoLuongCon');
            $table->string('MaKM',50);
            $table->bigInteger('MaSP');
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
        Schema::dropIfExists('tbl_KhuyenMai');
    }
}
