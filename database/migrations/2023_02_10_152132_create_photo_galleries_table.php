<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->id();
            $table->integer('index_no')->nullable();
            $table->string('title',100)->nullable();
            $table->string('title_italic',100)->nullable();
            $table->text('description')->nullable();
            $table->text('description_italic')->nullable();
            $table->string('image')->nullable();
            $table->integer('slider')->default('0');
            $table->integer('photo_gallery')->default('0');
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
        Schema::dropIfExists('photo_galleries');
    }
}
