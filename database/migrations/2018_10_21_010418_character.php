<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Character extends Migration
{
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up()
      {
            Schema::create('characters', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('type');
                  $table->float('carry');
            });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down()
      {
            Schema::dropIfExists('characters');
      }
}
