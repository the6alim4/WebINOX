<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_BinhLuan', function (Blueprint $table) {
            $table->bigIncrements('MaBinhLuan');
            $table->text('BinhLuan');
            $table->date('NgayBinhLuan');
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
        Schema::dropIfExists('tbl_BinhLuan');
    }
}
