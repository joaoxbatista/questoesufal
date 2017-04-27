@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questões fechadas @endsection
@section('content') 

{{Form::open(['method' => 'post', 'route' => 'close_question.create'])}}
{{Form::hidden('user_id',  Auth::user()->id)}}

<div class="form-group">
	{{Form::label('questionnaire_id', 'Questionário')}}
	{{Form::select('questionnaire_id', $questionnaires, '',['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('statment', 'Enunciado')}}
	{{Form::text('statement', '', ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('comments', 'Observações')}}
	{{Form::textarea('comments', '', ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('alternatives[]', 'Alternativa 1 *')}}
	{{Form::text('alternatives[]', '', ['required' => true, 'class' => 'form-control'])}}
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
</div>



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
