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
                  $table->integer('character_id');
                  $table->integer('item_id');
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
