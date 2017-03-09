<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionario;
use Auth;
class QuestionarioCtrl extends Controller
{
   public function index(){
    $questionarios = Questionario::where('user_id', Auth::user()->id)->get();
   	return view('dashboard.questionario.index', compact('questionarios'));
   }

   public function getCadastrar(){
   	return view('dashboard.questionario.cadastrar');
   }

   public function postCadastrar(Request $request){

    $this->validate($request, [
      'titulo' => 'required|max:200',
      'data_ini' => 'required',
      'data_fim' => 'required',
      'descricao' => 'max:400'
    ]);

    $questionario = $request->except('_token');
    $questionario['data_ini'] = date('Y-m-d', strtotime($questionario['data_ini']));
    $questionario['data_fim'] = date('Y-m-d', strtotime($questionario['data_fim']));


    Questionario::create($questionario);

    return redirect()->back()->with('success', 'Questionário cadastrado com sucesso!');
   }
}
