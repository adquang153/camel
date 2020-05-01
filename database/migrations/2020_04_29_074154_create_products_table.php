<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->longText('content');
            $table->longText('image_product')->nullable();
            $table->longText('path')->nullable();
            $table->integer('price')->unsigned()->default(0);
            $table->integer('type')->unsigned();
            $table->integer('likes')->unsigned()->nullable()->default(0);
            $table->integer('comments')->unsigned()->nullable()->default(0);
            $table->string('is_visible', 1)->default('N');
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
        Schema::dropIfExists('products');
    }
}
