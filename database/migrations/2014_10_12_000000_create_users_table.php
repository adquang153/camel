<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name');
            $table->string('password');
            $table->string('nick_name', 100);
            $table->longText('avatar')->nullable();
            $table->longText('path')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('number_phone', 15);
            $table->string('address', 255);
            $table->string('type', 100);
            $table->string('is_visible', 1)->default('N');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

