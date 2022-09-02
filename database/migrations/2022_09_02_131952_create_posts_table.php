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
            $table->id('posts_id');
            $table->string('posts_title')->unique();
            $table->string('posts_slug');
            $table->string('posts_image');
            $table->longText('posts_description');
            $table->integer('categories_id')->unsigned();
            $table->string('user_name');
            $table->timestamp('post_published_at');
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
