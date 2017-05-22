<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questionnaire;

class PagesCtrl extends Controller
{

    public function index()
    {
        $questionnaires = Questionnaire::take(3)->get();
        return view('pages.index', compact('questionnaires'));
    }
}
