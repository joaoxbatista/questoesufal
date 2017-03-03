<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasCtrl extends Controller
{

    public function index()
    {
        return view('paginas.index');
    }
}
