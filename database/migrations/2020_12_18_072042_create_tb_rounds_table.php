<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_rounds', function (Blueprint $table) {
            $table->id();
            $table->date('round_date');
            $table->time('round_time');
            $table->decimal('round_latitude', 11, 8)->default(0);
            $table->decimal('round_longitude', 11, 8)->default(0);
            $table->unsignedBigInteger('round_user');
            $table->unsignedBigInteger('round_zone');

            $table->foreign('round_user')->references('id')->on('tb_users')->onDelete('restrict');
            $table->foreign('round_zone')->references('id')->on('tb_zones')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_rounds');
    }
}
