<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperheroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superhero', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->char('nickname');
            $table->char('real_name');
            $table->text('origin_description');
            $table->text('superpowers');
            $table->char('catch_phrase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('superhero');
    }
}
