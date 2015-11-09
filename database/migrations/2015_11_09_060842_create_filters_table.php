<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filter');
            $table->timestamps();
        });

        Schema::create('filter_movie', function (Blueprint $table) {
            $table->unsignedInteger('filter_id');
            $table->unsignedInteger('movie_id');
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
        Schema::drop('filters');
        Schema::drop('filter_movie');
    }
}
