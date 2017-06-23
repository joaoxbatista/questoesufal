<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class StudentLoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/estudantes/dashboard';

    public function guard(){
      return Auth::guard('student');
    }


    public function showLoginForm()
    {
      return view('student.login');
    }

    public function login(Request $request)
    {
      $credentials = $request->except('_token');

      $validator = validator($credentials, [
        'email' => 'required|min:3|max:100',
        'password' => 'required|min:3|max:100'
      ]);

      if( $validator->fails() ){
        return redirect()
                ->route('student.login.show')
                ->withErrors($validator)
                ->withInput();
      }


      if(Auth::guard('student')->attempt($credentials))
      {
        return redirect()->route('student.dashboard');
      }else
      {
        return redirect()->route('student.login')
               ->withErrors();

      }

    }

    public function logout(Request $request)
    {
      Auth::guard('student')->logout();
      $request->session()->flush();
      $request->session()->regenerate();
      return redirect()->guest(route( 'student.login' ));
    }


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
