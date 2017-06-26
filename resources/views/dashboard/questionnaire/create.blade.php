@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questionário @endsection
@section('content')

<div class="nav-buttons">
	<a href="{{ route('questionnaire') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</a>
</div>
{{Form::open(['method' => 'post', 'route' => 'questionnaire.create'])}}
{{Form::hidden('user_id',  Auth::user()->id)}}
<div class="form-group">
	{{Form::label('title', 'Título')}}
	{{Form::text('title', '', ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="row">
	<div class="form-group col-md-6">
		{{Form::label('ini_date', 'Data de início')}}
		{{Form::date('ini_date', '', ['required' => true, 'class' => 'form-control'])}}
	</div>

	<div class="form-group col-md-6">
		{{Form::label('end_date', 'Data de término')}}
		{{Form::date('end_date', '', ['required' => true, 'class' => 'form-control'])}}
	</div>
</div>

<div class="form-group">
	{{Form::label('description', 'Descrição')}}
	{{Form::textarea('description', '', ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="row">
	<div class="col-md-2">
		{{Form::submit('Registrar', ['class' => 'btn btn-block btn-success'])}}
	</div>
</div>
{{Form::close()}}
@endsection
