@extends('templates.dashboard')
@section('titulo') Dashboard - Criação de Questões fechadas @endsection
@section('content') 
		
		{{Form::open(['method' => 'post', 'route' => 'close_question.create'])}}
			{{Form::hidden('user_id',  Auth::user()->id)}}
			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('statment', 'Enunciado')}}
				{{Form::text('statement', '', ['required' => true, 'class' => 'form-control'])}}
			</div>

			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('comments', 'Observações')}}
				{{Form::textarea('comments', '', ['required' => true, 'class' => 'form-control'])}}
			</div>

			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('alternatives[statement][0]', 'Alternativa 1')}}
				{{Form::text('alternatives[statement][0]', '', ['required' => true, 'class' => 'form-control'])}}

				{{ Form::radio("alternatives[correct][0]", 1) }}
				{{ Form::label("alternatives[correct][0]", 'Verdadeiro')}}

				{{ Form::radio("alternatives[correct][0]", 0) }}
				{{Form::label("alternatives[correct][0]", 'Falso')}}
			</div>

			<div class="form-group col-md-8 col-md-offset-2">
				{{Form::label('alternatives[statement][1]', 'Alternativa 1')}}
				{{Form::text('alternatives[statement][1]', '', ['required' => true, 'class' => 'form-control'])}}

				{{ Form::radio("alternatives[correct][1]", 1) }}
				{{ Form::label("alternatives[correct][1]", 'Verdadeiro')}}

				{{ Form::radio("alternatives[correct][1]", 0) }}
				{{Form::label("alternatives[correct][1]", 'Falso')}}
			</div>


			<div class="col-md-2 col-md-offset-2">
				{{Form::submit('Registrar', ['class' => 'btn btn-block btn-success'])}}
			</div>


		{{Form::close()}}

@endsection

@section('scripts')
	<script>
		$(document).ready(function(){

		});
	</script>
@endsection
