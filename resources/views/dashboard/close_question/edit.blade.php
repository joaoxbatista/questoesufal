@extends('templates.dashboard')
@section('titulo') Dashboard - Edição de Questões fechadas @endsection
@section('content')

<div class="nav-buttons">
	<a href="{{ route('questionnaire.view', $close_question->questionnaire->id) }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</a>
</div>

{{Form::open(['method' => 'post', 'route' => 'close_question.edit'])}}
{{Form::hidden('id', $close_question->id) }}
{{Form::hidden('questionnaire_id', $close_question->questionnaire->id) }}

<div class="form-group">
	{{Form::label('statment', 'Enunciado')}}
	{{Form::textarea('statement', $close_question->statement, ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('comments', 'Observações')}}
	{{Form::text('comments', $close_question->comments, ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::submit('Editar', ['class' => 'btn btn-success'])}}
</div>

{{Form::close()}}

<h3>Alternativas</h3>
@foreach ($close_question->alternatives as $index => $alternative)
	<div class="well">
		{{ Form::open(['method' => 'post', 'route' => 'alternative.edit'])}}
			{{ Form::text('statement', $alternative->statement, ['class' => "form-control"])}}
			{{ Form::hidden('id', $alternative->id)}}
			{{Form::submit('Editar', ['class' => 'btn btn-success'])}}
			{{ link_to_route('alternative.delete', 'Deletar', ['id' => $alternative->id], ['class' => 'btn btn-danger'])}}
		{{ Form::close()}}

	</div>
@endforeach
@endsection

@section('scripts')

@endsection
