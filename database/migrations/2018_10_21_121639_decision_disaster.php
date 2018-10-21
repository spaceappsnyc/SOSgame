<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DecisionDisaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('decision_disaster', function (Blueprint $table) {
              $table->integer('disaster_id')->unsigned();
              $table->integer('decision_id')->unsigned();
              $table->integer('stay_go');

              $table->foreign('decision_id')->references('id')->on('decisions');
              $table->foreign('disaster_id')->references('id')->on('disasters');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decision_disaster');
    }
}
