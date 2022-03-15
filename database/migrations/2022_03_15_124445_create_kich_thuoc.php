<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKichThuoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_KichThuoc', function (Blueprint $table) {
            $table->bigIncrements('MaKichThuoc');
            $table->double('ChieuDai');
            $table->double('ChieuRong');
            $table->double('ChieuCao');
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
        Schema::dropIfExists('tbl_KichThuoc');
    }
}
