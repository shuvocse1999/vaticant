<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('index_no')->nullable();
            $table->string('offer_name',100)->nullable();
            $table->string('offer_name_italic',100)->nullable();
            $table->text('description')->nullable();
            $table->text('description_italic')->nullable();
            $table->string('image',100)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('offer_infos');
    }
}
