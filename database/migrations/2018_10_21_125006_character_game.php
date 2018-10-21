<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CharacterGame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('character_game', function (Blueprint $table) {
             $table->string('game_id');
             $table->integer('character_id')->unsigned();

             $table->foreign('game_id')->references('id')->on('games');
             $table->foreign('character_id')->references('id')->on('characters');
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
        Schema::dropIfExists('character_game');
    }
}
