@extends('templates.dashboard')
@section('titulo') Dashboard - Questionarios @endsection
@section('content') 
	<h3>Questionários</h3>
	<a href="{{ route('questionario.cadastrar') }}" class="btn btn-primary">Cadastrar</a>
@endsection