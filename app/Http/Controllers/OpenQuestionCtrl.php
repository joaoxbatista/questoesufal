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
				'comments' => 'max:80',
				'user_id' => 'required'
			]
		);

		OpenQuestion::create($request->except('_token'));
		return redirect()->back()->with('success', 'Questão aberta cadastrada com sucesso!');
	}

	public function editGet($id){
		$open_question = OpenQuestion::find($id);
		return view('dashboard.open_question.edit', compact('open_question'));
	}

	public function editPost(Request $request){

		$open_question = OpenQuestion::find($request->input('id'));
		$open_question->statement = $request->input('statement');
		$open_question->comments = $request->input('comments');
		$open_question->save();

		 return redirect()->back()->with('success', 'Questão aberta editada com sucesso!');
	}

	public function deleteGet($id){
		OpenQuestion::find($id)->delete();
		return redirect()->back()->with('success', 'Questão aberta removida com sucesso!');
	}

	public function deletePost(Request $request){

	}

}
