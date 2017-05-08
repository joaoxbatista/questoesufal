@extends('templates.dashboard')
@section('titulo') Questionário : {{ $questionnaire->title }}@endsection
@section('content')
<div class="nav-buttons">
	<a href="{{ route('questionnaire') }}" class="btn btn-default">Voltar</a>
</div>

<article>
	<header>
		<span> Publicado em: <time datetime="{{ $questionnaire->ini_date}}" pubdate> {{ date('d/m/Y', strtotime($questionnaire->ini_date))}}</time></span>
	</header>

	<p>{{ $questionnaire->description }}</p>
	
</article>


{{-- Questões Abertas --}}
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3>Questões Abertas</h3>
	</div>
	<div class="panel-body">
		@foreach ($questionnaire->openQuestions as $index => $openQuestion)
		<div class="question">
			<h4>{{ $index+=1 }}ª) {{ $openQuestion->statement }}</h4>
			<p> <strong>Observações: </strong>{{ $openQuestion->comments }}</p>
			<a href="{{ route('open_question.edit.get', [$openQuestion->id]) }}" class="btn btn-warning">Editar</a>
			<a href="{{ route('open_question.delete.get', [$openQuestion->id]) }}" class="btn btn-danger">Deletar</a>
		</div>
		@endforeach

		
	</div>
</div>



@if (count($questionnaire->closeQuestions) > 0)
{{-- Questões Fechadas --}}
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3>Questões Fechadas</h3>
	</div>
	<div class="panel-body">
		@foreach ($questionnaire->closeQuestions as $index => $closeQuestion)
		<div class="question">
			<h4>{{ $index+=1 }}ª) {{ $closeQuestion->statement }}</h4>
			<p><strong>Observações: </strong>{{ $closeQuestion->comments }}</p>
			<ol>
				@foreach ($closeQuestion->alternatives as $alternative)
				<li>{{$alternative->statement}}</li>
				@endforeach
			</ol>
		
			<a href="{{ route('close_question.edit.get', [$closeQuestion->id]) }}" class="btn btn-warning">Editar</a>
			<a href="{{ route('close_question.delete.get', [$closeQuestion->id]) }}" class="btn btn-danger">Deletar</a>
		</div>
		@endforeach
	</div>
</div>
@endif
@endsection

@section('style')
	<style>
		.question{
			text-align: justify;
			margin-bottom: 40px;
			padding-bottom: 10px;
			border-bottom: 1px solid #eee;

		}
	</style>
@endsection