@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questões fechadas @endsection
@section('content') 

<div class="nav-buttons">
	<a href="{{ route('questionnaire') }}" class="btn btn-default">Voltar</a>
</div>

{{Form::open(['method' => 'post', 'route' => 'close_question.create'])}}
{{Form::hidden('user_id',  Auth::user()->id)}}

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
		{{Form::text('alternatives[]', $alternative->statement ,['required' => true, 'class' => 'form-control'])}}
	</div>
@endforeach

@foreach (range(1, 5-count($close_question->alternatives)) as $index)
	
	<?php $index = 6-$index; ?>

	<div class="form-group">
		{{Form::label('alternatives[]', 'Alternativa '.$index)}}
		{{Form::text('alternatives[]', '',['required' => true, 'class' => 'form-control'])}}
	</div>
@endforeach

{{-- <div class="form-group">
	{{Form::label('alternatives[]', 'Alternativa 1 *')}}
	{{Form::text('alternatives[]', '' ,['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('alternatives[]', 'Alternativa 2 *')}}
	{{Form::text('alternatives[]', '', ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('alternatives[]', 'Alternativa 3')}}
	{{Form::text('alternatives[]', '', ['class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('alternatives[]', 'Alternativa 4')}}
	{{Form::text('alternatives[]', '', ['class' => 'form-control'])}}
</div> --}}



<div class="form-group">
	{{Form::submit('Registrar', ['class' => 'btn btn-success'])}}
</div>

{{Form::close()}}
@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		console.log($('#alternative'));
	});
</script>
@endsection
