<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use Auth;
class QuestionnaireCtrl extends Controller
{

	public function getQuestionnaires()
	{
		$questionnaires = Questionnaire::all();
		return view('student.questionnaire.index', compact('questionnaires'));
	}

	public function index()
	{
		$questionnaires = Questionnaire::all();
		return view('dashboard.questionnaire.index', compact('questionnaires'));
	}

	public function view($id)
	{
	  $questionnaire = Questionnaire::find($id);
	  return view('dashboard.questionnaire.view', compact('questionnaire'));
	}

  public function createGet()
	{
    return view('dashboard.questionnaire.create');
  }

  public function createPost(Request $request)
	{
    $this->validate($request, [
     'title' => 'required|max:200|min:6',
     'ini_date' => 'required',
     'description' => 'required|max:500'
     ]);

    Questionnaire::create($request->except('_token'));
    return redirect()->back()->with('success', 'Questionário cadastrado com sucesso!');
  }

  public function editGet($id)
	{
    $questionnaire = Questionnaire::find($id);

    return view('dashboard.questionnaire.edit', compact('questionnaire'));
  }


  public function editPost(Request $request)
	{
    $questionnaire = Questionnaire::find($request->input('id'));
    $questionnaire->title = $request->input('title');
    $questionnaire->ini_date = date('Y-m-d', strtotime($request->input('ini_date')));
    $questionnaire->end_date = date('Y-m-d', strtotime($request->input('end_date')));
    $questionnaire->description = $request->input('description');
    $questionnaire->save();
    return redirect()->route('questionnaire')->with('success', 'Questionario atualizado.');
  }

  public function deleteGet($id)
	{
    Questionnaire::find($id)->delete();
    return redirect()->back()->with('success', 'Questionário removido.');
  }


}
