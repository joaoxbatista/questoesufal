<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionario;
use Auth;
class QuestionarioCtrl extends Controller
{

  /**
  *Métodos Get
  **/

  public function index(){
    $questionarios = Questionario::where('user_id', Auth::user()->id)->get();
    return view('dashboard.questionario.index', compact('questionarios'));
  }

  public function getCadastrar(){
    return view('dashboard.questionario.cadastrar');
  }

  public function getEditar($id){
    $questionario = Questionario::find($id);
    return view('dashboard.questionario.editar', compact('questionario'));
  }

  public function getDeletar($id){
    $questionario = Questionario::find($id);
    return view('dashboard.questionario.deletar', compact('questionario'));
  }

  public function getProcurar(){
    return view('dashboard.questionario.procurar');
  }

  /**
  *Métodos Post
  **/
  
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

  public function postEditar(Request $request){
    $questionario = Questionario::find($request->input('id'));
    $questionario->titulo = $request->input('titulo');
    $questionario->data_ini = date('Y-m-d', strtotime($request->input('data_ini')));
    $questionario->data_fim = date('Y-m-d', strtotime($request->input('data_fim')));
    $questionario->pontuacao = $request->input('pontuacao');
    $questionario->descricao = $request->input('descricao');
    $questionario->save();

    return redirect()->route('questionario')->with('success', 'Questionario atualizado.');

  }

  public function postDeletar(Request $request){
    $questionario = Questionario::find($request->input('id'));
    if(count($questionario) > 0){
      $questionario->delete();
    }

    return redirect()->route('questionario')->with('success', 'Questionario removido.');
  }

}
