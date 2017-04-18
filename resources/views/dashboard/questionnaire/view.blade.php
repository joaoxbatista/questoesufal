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

		@foreach ($questionnaire->openQuestions as $index => $openQuestion)
			<div class="question">
				<h3>{{ $index+=1 }}ª) {{ $openQuestion->statement }}</h3>
				<p>{{ $openQuestion->comments }}</p>
			</div>
		@endforeach

@endsection
