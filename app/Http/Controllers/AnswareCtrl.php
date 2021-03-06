<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\questionnaire;
use App\OpenAnsware;
use App\CloseAnsware;
use App\Answare;

class AnswareCtrl extends Controller{

  public function index(Request $request){
    $answares = Answare::all();
    return view('dashboard.answare.index', compact('answares'));
  }

  public function getQuestionnarie($id){
    $questionnaire = questionnaire::find($id);
    return view('answare.view', compact('questionnaire'));
  }

  public function store(Request $request){

    $answare = Answare::create($request->only(['questionnaire_id', 'student_id']));

    /*
    | Registra as respostas fechadas
    */
    if(!empty($request->get('closeQuestions'))):
      foreach($request->get('closeQuestions') as $close_question_id => $close_answare):
        CloseAnsware::create([
          'answare_id' => $answare->id,
          'close_question_id' => $close_question_id,
          'alternative_id' => $close_answare
        ]);
      endforeach;
    endif;

    /*
    | Registra as respostas abertas
    */
    if(!empty($request->get('openQuestions'))):
      foreach($request->get('openQuestions') as $open_question_id => $open_answare):
        OpenAnsware::create([
          'answare_id' => $answare->id,
          'open_question_id' => $open_question_id,
          'value' => $open_answare
        ]);
      endforeach;
    endif;

    return redirect()->route('student.questionnaire')->with('success', 'Questionário respondido! Obrigado pela atenção.');
  }

}
