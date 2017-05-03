<?php

namespace App\Http\Controllers;
use App\CloseQuestion;
use App\Alternative;
use Illuminate\Http\Request;
use App\questionnaire;

class CloseQuestionCtrl extends Controller
{
    public function index(){}

	public function createGet(){
		$questionnaires = Questionnaire::all()->pluck('title', 'id');
		return view('dashboard.close_question.create', compact('questionnaires'));
	}
	
	public function createPost(Request $request){

		$this->validate($request, 
			[
				'statement' => 'required',
				'user_id' => 'required',

			]
		);
		
		$close_question_id = CloseQuestion::create($request->except('_token'))->id;

		$alternatives = $request->input('alternatives');

		
		foreach ($alternatives as $alternative) {
			if(!empty($alternative)):
				Alternative::create([
						'statement' => $alternative,
						'close_question_id' => $close_question_id
				]);
			endif;
		}
		
		return redirect()->back()->with('success', 'Questão fechada cadastrada com sucesso!');
	}

	public function editGet($id){
		
		$close_question = CloseQuestion::find($id);
		return view('dashboard.close_question.edit', compact('close_question'));
	}
	public function editPost(Request $request){

	}

	public function deleteGet($id){
		CloseQuestion::find($id)->delete();
		return redirect()->back()->with('success', 'Questão removida com sucesso!');
	}
	public function deletePost(Request $request){

	}
}
