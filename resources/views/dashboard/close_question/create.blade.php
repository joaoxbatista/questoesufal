@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questões fechadas @endsection
@section('content')
<div class="nav-buttons">
	<a href="{{ route('questionnaire.view', $questionnaire_id) }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</a>
</div>

{{Form::open(['method' => 'post', 'route' => 'close_question.save'])}}


{{Form::hidden('user_id',  Auth::user()->id)}}
{{Form::hidden('questionnaire_id',  $questionnaire_id)}}

<div class="form-group">
	{{Form::label('statment', 'Enunciado')}}
	{{Form::textarea('statement', '', ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::label('comments', 'Observações')}}
	{{Form::text('comments', '', ['required' => true, 'class' => 'form-control'])}}
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
