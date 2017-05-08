@extends('templates.dashboard')
@section('titulo') Dashboard - Edição de Questões fechadas @endsection
@section('content') 

<div class="nav-buttons">
	<a href="{{ route('questionnaire') }}" class="btn btn-default">Voltar</a>
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

@foreach ($close_question->alternatives as $index => $alternative)
	<?php $index++; ?>
	<div class="form-group">
		{{Form::label('alternatives[]', 'Alternativa '.$index)}}
		{{Form::text('alternatives[]', $alternative->statement ,['class' => 'form-control'])}}
	</div>
@endforeach


<div class="form-group">
	{{Form::submit('Editar', ['class' => 'btn btn-success'])}}
</div>

{{Form::close()}}
@endsection

@section('scripts')

@endsection
