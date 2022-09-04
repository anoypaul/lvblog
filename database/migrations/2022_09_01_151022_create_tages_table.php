<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tages', function (Blueprint $table) {
            $table->id('tages_id');
            $table->string('tages_name')->unique();
            $table->string('tages_slug');
            $table->text('tages_description')->nullable();
            $table->timestamps();
        });
        // Schema::create('posts_tag', function (Blueprint $table) {
        //     $table->integer('posts_id');
        //     $table->integer('tages_id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tages');
        Schema::dropIfExists('post_tag');
    }
}
