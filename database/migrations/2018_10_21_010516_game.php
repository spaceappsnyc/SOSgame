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
                  $table->string('id')->primary();
                  $table->integer('disaster_id')->unsigned();
                  $table->integer('disaster_proximity');

                  $table->foreign('disaster_id')->references('id')->on('disasters');
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
            Schema::dropIfExists('games');
      }
}
