<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespondersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enrollment'); //Número da matrícula
            $table->string('class'); //Turma
            $table->string('course'); //Curso
            $table->string('name'); //Nome
            $table->string('email')->unique(); //E-mail
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responders');
    }
}
