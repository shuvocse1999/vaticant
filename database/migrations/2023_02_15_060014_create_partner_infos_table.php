<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('index_no')->nullable();
            $table->string('partner_name',100)->nullable();
            $table->string('partner_name_italic',100)->nullable();
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
        Schema::dropIfExists('partner_infos');
    }
}
