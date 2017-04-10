<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCloseAnswareHasAlternatives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('close_answare_has_alternatives', function (Blueprint $table) {
            $table->text('text');
            $table->integer('close_answare_id')->unsigned();
            $table->foreign('close_answare_id')->references('id')->on('answares');
            $table->integer('alternative_id')->unsigned();
            $table->foreign('alternative_id')->references('id')->on('alternatives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('close_answare_has_alternatives');
    }
}
