<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Item extends Migration
{
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up()
      {
            Schema::create('items', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('name');
                  $table->string('description');
                  $table->string('emoji');
                  $table->integer('value');
                  $table->float('weight');
            });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down()
      {
            Schema::dropIfExists('items');
      }
}
