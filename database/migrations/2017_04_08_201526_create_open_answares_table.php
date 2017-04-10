<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenAnswaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_answares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('answare_id')->unsigned();
            $table->foreign('answare_id')->references('id')->on('answares');
            $table->integer('open_question_id')->unsigned();
            $table->foreign('open_question_id')->references('id')->on('open_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('open_answares');
    }
}
