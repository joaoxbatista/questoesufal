<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\questionnaire;

class PagesCtrl extends Controller
{

    public function index()
    {
        return view('pages.index');
    }
    
}
