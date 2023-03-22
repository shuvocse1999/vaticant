<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->integer('index_no')->nullable();
            $table->text('description')->nullable();
            $table->text('description_italic')->nullable();
            $table->string('client_name',100)->nullable();
            $table->string('designation',100)->nullable();
            $table->string('image',100)->nullable();
            $table->integer('status')->nullable();
            $table->integer('ratings')->nullable();
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
        Schema::dropIfExists('testimonials');
    }
}
