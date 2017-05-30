<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\questionnaire;

class AnswareCtrl extends Controller{

  public function getQuestionnarie($id){
    $questionnaire = questionnaire::find($id);
    return view('answare.view', compact('questionnaire'));
  }

  public function store(Request $request){
    dd($request->except('_token'));
  }
}
