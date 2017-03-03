@extends('templates.dashboard')
@section('titulo') Questionarios - cadastrar @endsection
@section('content') 
	<h3>Questionários</h3>

	{{ Form::open(array('url' => 'foo/bar')) }}

	{{ Form::close() }}
@endsection