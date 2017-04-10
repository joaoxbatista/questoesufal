<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answares', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('responder_id')->unsigned();
            $table->integer('questionnaire_id')->unsigned();
            
            $table->foreign('responder_id')->references('id')->on('responders');
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answares');
    }
}
