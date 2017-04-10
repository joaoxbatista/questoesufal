@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questões abertas @endsection
@section('content') 
		
		{{Form::open(['method' => 'post', 'route' => 'open_question.create'])}}
			{{Form::hidden('user_id',  Auth::user()->id)}}
			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('statment', 'Enunciado')}}
				{{Form::text('statement', '', ['required' => true, 'class' => 'form-control'])}}
			</div>

			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('comments', 'Observações')}}
				{{Form::textarea('comments', '', ['required' => true, 'class' => 'form-control'])}}
			</div>
			
			<div class="col-md-2 col-md-offset-2">
				{{Form::submit('Registrar', ['class' => 'btn btn-block btn-success'])}}
			</div>
		{{Form::close()}}
@endsection
