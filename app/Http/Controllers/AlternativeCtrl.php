<?php
	
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Alternative;

	class AlternativeCtrl extends Controller{

		public function index(){}

		public function add($id){
			return view('dashboard.close_question.alternative.create', compact('id'));
		}
		public function addPost(Request $request){

			Alternative::create($request->except('token'));
			return redirect()->back()->with('success', 'Alternativa adicionada com sucesso!');
		}

		public function deletGet(){}

		public function editGet(){}

		public function deletePost(){}

		public function editPost(){}


	}	