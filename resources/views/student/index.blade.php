@extends('templates.student-dashboard')
@section('titulo') Página Inicial @endsection
@section('content')

<h3>Dashboard do Estudante</h3>
  {{ auth()->guard('student')->user() }}
@endsection
