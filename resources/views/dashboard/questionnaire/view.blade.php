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

	<a href="{{ route('questionnaire') }}" class="btn btn-primary">Adicionar Questão Aberta</a>
	<a href="{{ route('questionnaire') }}" class="btn btn-primary">Adicionar Questão Fechada</a>
</article>


{{-- Questões Abertas --}}
<div class="open-questions">
	<h2>Questões Abertas</h2>

	@foreach ($questionnaire->openQuestions as $index => $openQuestion)
	<div class="question">
		<h3>{{ $index+=1 }}ª) {{ $openQuestion->statement }}</h3>
		<p>{{ $openQuestion->comments }}</p>
		
		
	</div>
	@endforeach

</div>

{{-- Questões Fechadas --}}
<div class="close-questions">
	<h2>Questões Fechadas</h2>
	
	@foreach ($questionnaire->closeQuestions as $index => $closeQuestion)
	<div class="question">
		<h3>{{ $index+=1 }}ª) {{ $closeQuestion->statement }}</h3>
		<p>{{ $closeQuestion->comments }}</p>
		<ol>
			@foreach ($closeQuestion->alternatives as $alternative)
				<li>{{$alternative->statement}}</li>
			@endforeach
		</ol>
		
	</div>
	@endforeach

</div>

@endsection
