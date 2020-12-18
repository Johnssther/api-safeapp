<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 100);
            $table->string('user_email', 100);
            $table->string('user_phone', 30);
            $table->boolean('user_active')->default(true);
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('api_token', 600)->nullable();
            $table->string('token_firebase', 600)->nullable();
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
        Schema::dropIfExists('tb_users');
    }
}
