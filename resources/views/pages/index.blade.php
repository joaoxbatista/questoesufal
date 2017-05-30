@extends('templates.base')
@section('titulo') Dashboard - Questionarios @endsection
@section('content')


<div class="col-md-12">
	@foreach($questionnaires as $questionnaire)
		<div class="questionnaire">
			<h1> {{ $questionnaire->title }}</h1>
			<span class="label label-default">Criado por {{ $questionnaire->user->name}}</span>
			<span class="label label-warning">Data de termino {{ date('d/m/Y', strtotime($questionnaire->end_date)) }}</span>
			<p>
				{{ $questionnaire->description }}
			</p>
			<a href="/responder/{{ $questionnaire->id }}" class="btn btn-success">Responder</a>
		</div>
	@endforeach
</div>

@endsection
