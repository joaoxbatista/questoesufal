@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questões abertas @endsection
@section('content') 

	
	<div class="nav-buttons">
		<a href="{{ route('dash.home') }}" class="btn btn-default">Voltar</a>
	</div>		

	{{Form::open(['method' => 'post', 'route' => 'open_question.create'])}}
	{{Form::hidden('user_id',  Auth::user()->id)}}
	
	<div class="form-group">
		{{Form::label('questionnaire_id', 'Questionário')}}
		{{Form::select('questionnaire_id', $questionnaires, '',['required' => true, 'class' => 'form-control'])}}
	</div>

	<div class="form-group">
		{{Form::label('statment', 'Enunciado')}}
		{{Form::textarea('statement', '', ['required' => true, 'class' => 'form-control'])}}
	</div>
	
	<div class="form-group ">
		{{Form::label('comments', 'Observações')}}
		{{Form::text('comments', '', ['required' => true, 'class' => 'form-control'])}}
	</div>

	<div class="form-group">
		{{Form::submit('Registrar', ['class' => 'btn  btn-success'])}}
	</div>
	{{Form::close()}}

@endsection
