<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_post', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('area_id');
            $table->foreign('area_id')
                ->references('id')
                ->on('areas');
            $table->unsignedInteger('post_id');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_post');
    }
}
