<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Game extends Migration
{
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up()
      {
            Schema::create('games', function (Blueprint $table) {
                  $table->string('id')->unique();
                  $table->integer('disaster_id')->unsigned();
                  $table->integer('emoji_id')->unsigned();
                  $table->integer('character_disabled');
                  $table->integer('proximity');
            });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down()
      {
            Schema::dropIfExists('games');
      }
}
