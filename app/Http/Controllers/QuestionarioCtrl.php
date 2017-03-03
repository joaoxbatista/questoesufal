<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionario;

class QuestionarioCtrl extends Controller
{
   public function index(){
   	return view('dashboard.questionario.index');
   }

   public function getCadastrar(){
   	return view('dashboard.questionario.cadastrar');
   }

   public function postCadastrar(Request $request){
    $questionario = $request->except('_token');
    echo $questionario['data_ini'] = ;
    dump($questionario);

   }
}
