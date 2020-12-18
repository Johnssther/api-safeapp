<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_zones', function (Blueprint $table) {
            $table->id();
            $table->string('zone_name', 30);
            $table->string('zone_code', 50);
            $table->decimal('zone_latitude', 11, 8)->default(0);
            $table->decimal('zone_longitude', 11, 8)->default(0);
            $table->boolean('zone_active')->default(true);
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
        Schema::dropIfExists('tb_zones');
    }
}
