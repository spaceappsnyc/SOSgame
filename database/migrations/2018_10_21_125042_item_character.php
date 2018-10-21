<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemCharacter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('item_character', function (Blueprint $table) {
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
        Schema::dropIfExists('item_character');
    }
}
