<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacGiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tac_gia', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tac_gia');
            $table->string('dia_chi');
            $table->date('ngay_sinh');
            $table->string('hinh_anh');
            $table->text('mo_ta1');
            $table->text('mo_ta2');
            $table->text('mo_ta3');

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
        Schema::dropIfExists('tac_gia');
    }
}
