@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questionário @endsection
@section('content') 
		
		{{Form::open(['method' => 'post', 'route' => 'questionnaire.create'])}}
			{{Form::hidden('user_id',  Auth::user()->id)}}
			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('title', 'Título')}}
				{{Form::text('title', '', ['required' => true, 'class' => 'form-control'])}}
			</div>

			<div class="form-group col-md-4 col-md-offset-2">
				{{Form::label('ini_date', 'Data de início')}}
				{{Form::date('ini_date', '', ['required' => true, 'class' => 'form-control'])}}
			</div>

			<div class="form-group col-md-4">
				{{Form::label('end_date', 'Data de término')}}
				{{Form::date('end_date', '', ['required' => true, 'class' => 'form-control'])}}
			</div>


			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('description', 'Descrição')}}
				{{Form::textarea('description', '', ['required' => true, 'class' => 'form-control'])}}
			</div>

			<div class="col-md-2 col-md-offset-2">
				{{Form::submit('Registrar', ['class' => 'btn btn-block btn-success'])}}
			</div>
		{{Form::close()}}
@endsection
