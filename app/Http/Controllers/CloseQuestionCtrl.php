<?php

namespace App\Http\Controllers;
use App\CloseQuestion;
use App\Alternative;
use Illuminate\Http\Request;
use App\questionnaire;

class CloseQuestionCtrl extends Controller
{

  public function index(){}

	public function create(Request $request){
		$questionnaire_id = $request->get('questionnaire_id');
		return view('dashboard.close_question.create', compact('questionnaire_id'));
	}

	public function createPost(Request $request){

    //Validação da requisição
		$this->validate($request,
			[
				'statement' => 'required',
				'user_id' => 'required',

			]
		);

    //Criação da Questão Fechada
		$close_question_id = CloseQuestion::create($request->except('_token'))->id;

    //Cadastrar Alternativas
		$alternatives = $request->input('alternatives');
		foreach ($alternatives as $alternative) {
			if(!empty($alternative)):
				Alternative::create([
						'statement' => $alternative,
						'close_question_id' => $close_question_id
				]);
			endif;
		}

    //Redirecionar caso dê tudo certo
		return redirect()->route('questionnaire.view', ['id' => $request->get('questionnaire_id')])->with('success', 'Questão fechada cadastrada com sucesso!');
	}

	public function editGet($id){

		$close_question = CloseQuestion::find($id);

		return view('dashboard.close_question.edit', compact('close_question'));
	}

  public function editPost(Request $request){

		$close_question = CloseQuestion::find($request->input('id'));
    $close_question->update(
      $request->only(['statement', 'comments'])
    );

    return redirect()->route('questionnaire.view', $request->get('questionnaire_id'))->with('success', 'Questão fechada editada com sucesso!');

	}

	public function deleteGet($id){
		CloseQuestion::find($id)->delete();
		return redirect()->back()->with('success', 'Questão removida com sucesso!');
	}

}
