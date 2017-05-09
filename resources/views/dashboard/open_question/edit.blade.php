@extends('templates.dashboard')
@section('titulo') Dashboard - Edição de Questões abertas @endsection
@section('content') 

	
	<div class="nav-buttons">
		<a href="{{ route('dash.home') }}" class="btn btn-default">Voltar</a>
	</div>		

	{{Form::open(['method' => 'post', 'route' => 'open_question.edit'])}}
	
	{{Form::hidden('id', $open_question->id)}}
	
	<div class="form-group">
		{{Form::label('statment', 'Enunciado')}}
		{{Form::textarea('statement', $open_question->statement, ['required' => true, 'class' => 'form-control'])}}
	</div>
	
	<div class="form-group ">
		{{Form::label('comments', 'Observações')}}
		{{Form::text('comments', $open_question->comments, ['required' => true, 'class' => 'form-control'])}}
	</div>

	<div class="form-group">
		{{Form::submit('Atualizar', ['class' => 'btn  btn-success'])}}
	</div>
	{{Form::close()}}

@endsection
