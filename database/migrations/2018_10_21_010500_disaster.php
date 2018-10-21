<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Disaster extends Migration
{
      /**
      * Run the migrations.
      *
      * @return void
      */
      public function up()
      {
            Schema::create('disasters', function (Blueprint $table) {
                  $table->increments('id');
                  $table->string('name');
                  $table->string('low_severity');
                  $table->string('medium_severity');
                  $table->string('high_severity');
            });
      }

      /**
      * Reverse the migrations.
      *
      * @return void
      */
      public function down()
      {
            Schema::dropIfExists('disasters');
      }
}
