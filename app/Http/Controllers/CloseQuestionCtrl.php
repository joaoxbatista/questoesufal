<?php

namespace App\Http\Controllers;
use App\CloseQuestion;
use App\Alternative;
use Illuminate\Http\Request;

class CloseQuestionCtrl extends Controller
{
    public function index(){}

	public function createGet(){
		return view('dashboard.close_question.create');
	}
	public function createPost(Request $request){

		$this->validate($request, 
			[
				'statement' => 'required|max:300',
				'comments' => 'required|max:300',
				'user_id' => 'required',

			]
		);
		
		$close_question_id = CloseQuestion::create($request->except('_token'))->id;

		$alternatives = $request->input('alternatives');
		$alternatives = array_combine($alternatives['statement'], $alternatives['correct']);

		

		foreach ($alternatives as $statement => $correct) {
			
			if($correct == 1){
				$correct = true;
			}else{
				$correct = false;
			}

			Alternative::create([
					'statement' => $statement,
					'correct' => $correct,
					'close_question_id' => $close_question_id
			]);
		}
		
		
		

		
		return redirect()->back()->with('success', 'Questão fechada cadastrada com sucesso!');
	}

	public function editGet(){
		return view('dashboard.questionnaire.edit');
	}
	public function editPost(Request $request){}

	public function deleteGet(){
		return view('dashboard.questionnaire.delte');
	}
	public function deletePost(Request $request){}
}
