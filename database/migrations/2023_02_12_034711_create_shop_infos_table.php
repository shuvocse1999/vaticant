<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('index_no')->nullable();
            $table->string('shop_name',100)->nullable();
            $table->string('shop_name_italic',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->text('adress')->nullable();
            $table->text('adress_italic')->nullable();
            $table->text('map')->nullable();
            $table->string('image',100)->nullable();
            $table->integer('status')->nullable();
            $table->text('location')->nullable();
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
        Schema::dropIfExists('shop_infos');
    }
}
