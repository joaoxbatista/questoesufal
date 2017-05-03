<?php

namespace App\Http\Controllers;
use App\OpenQuestion;
use App\Questionnaire;
use Illuminate\Http\Request;

class OpenQuestionCtrl extends Controller
{
	public function index(){}

	public function createGet(){
		$questionnaires = Questionnaire::all()->pluck('title', 'id');
		return view('dashboard.open_question.create', compact('questionnaires'));
	}
	public function createPost(Request $request){

		$this->validate($request, 
			[
				'statement' => 'required',
				'user_id' => 'required'
			]
		);

		OpenQuestion::create($request->except('_token'));
		return redirect()->back()->with('success', 'Questão aberta cadastrada com sucesso!');
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
