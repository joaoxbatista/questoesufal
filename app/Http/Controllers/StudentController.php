<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class StudentController extends Controller
{
    public function index()
    {
      return view('student.index');
    }

    public function perfil(){
      return view('student.perfil');
    }

    public function updatePerfil(Request  $request){

      $user = auth()->user();
      $data = $request->all();

      $validator = validator($data, [
        'name' => 'required|min:12',
        'email' => 'required|email|min:12|max:255',
        'enrollment' => 'required|min:8|max:8'
      ]);

      if($validator->fails()){

        return redirect()->route('student.perfil')
                ->withErrors($validator)
                ->withInput();
      }


      $user->name = $data['name'];
      $user->email = $data['email'];
      $user->enrollment = $data['enrollment'];

      $user->save();

      return redirect()->route('student.perfil')
              ->with('success', 'Informações alteradas com sucesso');


    }
}
