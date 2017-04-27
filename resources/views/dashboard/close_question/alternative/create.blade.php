@extends('templates.dashboard')
@section('titulo') Adicionar Alternativa @endsection
@section('content') 

{{Form::open(['method' => 'post', 'route' => 'alternative.add.post'])}}
{{Form::hidden('close_question_id',  $id)}}

<div class="form-group">
	{{Form::label('statment', 'Enunciado')}}
	{{Form::text('statement', '', ['required' => true, 'class' => 'form-control'])}}
</div>

<div class="form-group">
	{{Form::submit('Adicionar', ['class' => 'btn btn-success'])}}
</div>

{{Form::close()}}
@endsection

