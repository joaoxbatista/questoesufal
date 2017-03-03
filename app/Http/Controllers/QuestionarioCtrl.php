<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionarioCtrl extends Controller
{
   public function index(){
   	return view('dashboard.questionario.index');
   }

   public function getCadastrar(){
   	return view('dashboard.questionario.cadastrar');
   }
}
