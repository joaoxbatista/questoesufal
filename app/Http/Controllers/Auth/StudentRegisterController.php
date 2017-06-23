<?php

namespace App\Http\Controllers\Auth;

use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class StudentRegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'estudantes/dashboard';

    public function guard()
    {
      return Auth::guard('student');
    }

    public function showRegistrationForm()
    {
      return view('student.register');
    }

    public function __construct()
    {
        $this->middleware('guest:student');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'password' => 'required|min:6|confirmed'
        ]);
    }

    protected function create(array $data)
    {
        return Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'enrollment' => $data['enrollment'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
