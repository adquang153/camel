<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name', 100);
            $table->text('password');
            $table->longText('avatar')->nullable();
            $table->longText('path')->nullable();
            $table->string('email', 50);
            $table->string('number_phone', 15);
            $table->string('address', 255)->nullable();
            $table->string('type', 100)->default('customer');
            $table->string('is_visible',1)->default('N');
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
        Schema::dropIfExists('user');
    }
}
