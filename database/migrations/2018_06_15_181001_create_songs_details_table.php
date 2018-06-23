<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('song_id');
            $table->string('name');
            $table->string('sub_name')->nullable();
            $table->string('author');
            $table->string('cover_img');
            $table->unsignedInteger('download_count')->default(0);
            $table->unsignedInteger('bpm')->default(0);
            $table->json('difficulty_levels');

            $table->foreign('song_id')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song_details');
    }
}
