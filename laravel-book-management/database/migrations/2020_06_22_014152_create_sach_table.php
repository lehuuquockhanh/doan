<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->id();
            $table->string('ten_sach');
            $table->date('ngay_xuat_ban');
            $table->string('hinh_anh');
            $table->string('hinh_anh_1')->nullable();
            $table->string('hinh_anh_2')->nullable();
            $table->string('hinh_anh_3')->nullable();
            $table->string('hinh_anh_4')->nullable();
            $table->integer('tac_gia');
            $table->integer('nha_xuat_ban');
            $table->integer('the_loai');
            $table->integer('so_luong');
            $table->decimal('gia_nhap', 12, 2);
            $table->decimal('gia_ban', 12, 2);
            $table->decimal('gia_khuyen_mai', 12, 2)->nullable();
            $table->boolean('ghim')->nullable();
            $table->text('mo_ta')->nullable();
            $table->text('mo_ta2')->nullable();
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
        Schema::dropIfExists('sach');
    }
}
