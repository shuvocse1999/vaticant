<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('index_no')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_title_italic')->nullable();
            $table->text('description')->nullable();
            $table->text('description_italic')->nullable();
            $table->string('image',100)->nullable();
            $table->string('admin_id',100)->nullable();
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
        Schema::dropIfExists('blog_infos');
    }
}
