<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCloseAnswaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('close_answares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('answare_id')->unsigned();
            $table->integer('close_question_id')->unsigned();
            $table->foreign('answare_id')->references('id')->on('answares');
            $table->foreign('close_question_id')->references('id')->on('close_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('close_answares');
    }
}
