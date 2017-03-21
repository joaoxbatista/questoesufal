@extends('templates.dashboard')
@section('titulo') Questionarios - cadastrar @endsection
@section('content')



<nav class="links">
	<a href="{{ route('questionario') }}" class="btn btn-default">Voltar</a>
</nav>

<div class="panel panel-danger">
	<div class="panel-heading">
		Remover questionário
	</div>

	<div class="panel-body">
		<h4>{{$questionario->titulo}}</h4>
		<p>{{$questionario->descricao}}</p>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'questionario.postDeletar', 'method' => 'post']) !!}

		{{ Form::hidden('id', $questionario->id) }}
		{{ Form::button('<span class="glyphicon glyphicon-ok"></span> Remover', ['type' => 'submit', 'class' => 'btn btn-danger']) }}

		{!! Form::close() !!}
	</div>
</div>
@endsection
