@extends('templates.dashboard')
@section('titulo') {{ $questionario->titulo }} @endsection
@section('content')
	<h3>{{ $questionario->titulo}}</h3>
	<span>Data inicial: {{ date('d/m/Y', strtotime($questionario->data_ini))}}</span>
	<span>Data final: {{ date('d/m/Y', strtotime($questionario->data_fim))}}</span>
	<span>Autor: {{ $questionario->user->name }}</span>
	<span>Pontos: {{ $questionario->pontuacao}}</span>
	<p>{{ $questionario->descricao}}</p>


	
@endsection
