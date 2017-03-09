@extends('templates.dashboard')
@section('titulo') Questionarios - cadastrar @endsection
@section('content')



<nav class="links">
	<a href="{{ route('questionario') }}" class="btn btn-default">Voltar</a>
</nav>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Deletar Questionário</h3>
	</div>
	<div class="panel-body">
		{!! Form::open(['route' => 'questionario.deletar', 'method' => 'post']) !!}

		<input type="hidden" name="id" value="{{ $questionario->id }}">

		{!! Form::close() !!}
	</div>
</div>
@endsection
