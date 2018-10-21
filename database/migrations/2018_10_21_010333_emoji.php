<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Emoji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('emojis', function (Blueprint $table) {
              $table->increments('id');
              $table->string('code');
              $table->integer('character_id')->unsigned();
         });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
         Schema::dropIfExists('emojis');
  }
}
