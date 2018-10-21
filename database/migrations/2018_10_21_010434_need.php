<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Need extends Migration
{
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up()
      {
            Schema::create('needs', function (Blueprint $table) {
                  $table->increments('id');
                  $table->integer('character_id')->unsigned();
                  $table->integer('item_id')->unsigned();
                  $table->foreign('character_id')->references('id')->on('characters');
                  $table->foreign('item_id')->references('id')->on('items');
            });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down()
      {
            Schema::dropIfExists('needs');
      }
}
