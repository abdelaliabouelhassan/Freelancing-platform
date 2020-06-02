<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->index();
            $table->string('title','255');
            $table->text('body');
            $table->integer('image_id')->unsigned()->nullable()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('city_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('price')->nullable();
            $table->string('type',50);
            $table->string('slug');
            $table->boolean('is_done')->default(false);
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
        Schema::dropIfExists('posts');
    }
}
