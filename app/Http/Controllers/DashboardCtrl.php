<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCtrl extends Controller
{
 
	public function index(){
		return view('dashboard.index');
	}  
}
