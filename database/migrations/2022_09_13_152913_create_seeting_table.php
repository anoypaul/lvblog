<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeting', function (Blueprint $table) {
            $table->id('seeting_id');
            $table->string('seeting_name', 50);
            $table->string('seeting_site_logo')->nullable();
            $table->text('seeting_about_site')->nullable();
            $table->string('seeting_facebook')->nullable();
            $table->string('seeting_twitter')->nullable();
            $table->string('seeting_instagram')->nullable();
            $table->string('seeting_reddit')->nullable();
            $table->string('seeting_email')->nullable();
            $table->string('seeting_copyright')->nullable();
            $table->string('seeting_phone')->nullable();
            $table->string('seeting_address')->nullable();
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
        Schema::dropIfExists('seeting');
    }
}
