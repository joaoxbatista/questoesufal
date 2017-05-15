@extends('templates.dashboard')
@section('titulo'){{ $questionnaire->title }}@endsection
@section('content')
<div class="nav-buttons">
	<a href="{{ route('questionnaire') }}" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</a>


	{{ Form::open(['method' => 'post', 'route' => 'close_question.create'])}}
		{{ Form::hidden('questionnaire_id', $questionnaire->id) }}
		<button type="submit" class="btn btn-success"><i class="fa fa-check-square" aria-hidden="true"></i> Questão Fechada</button>
	{{ Form::close()}}



</div>

<div class="questionnaire">
	<header>
		<span> Publicado em: <time datetime="{{ $questionnaire->ini_date}}" pubdate> {{ date('d/m/Y', strtotime($questionnaire->ini_date))}}</time></span>
	</header>

	<p>{{ $questionnaire->description }}</p>
</div>

@if (count($questionnaire->openQuestions) > 0)
{{-- Questões Abertas --}}
<div class="question">
	<div class="question-header">
		<h3>Questões Abertas</h3>
	</div>
	<div class="question-body">
		@foreach ($questionnaire->openQuestions as $index => $openQuestion)
		<div class="question">
			<h1>{{ $index+=1 }}ª) {{ $openQuestion->statement }}</h1>
			<p> <strong>Observações: </strong>{{ $openQuestion->comments }}</p>
			<a href="{{ route('open_question.edit.get', [$openQuestion->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
			<a href="{{ route('open_question.delete.get', [$openQuestion->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
		</div>
		@endforeach


	</div>
</div>
@endif



@if (count($questionnaire->closeQuestions) > 0)
{{-- Questões Fechadas --}}
<div class="question">
	<div class="question-header">
		Questões Fechadas
	</div>
	<div class="question-body">
		@foreach ($questionnaire->closeQuestions as $index => $closeQuestion)
		<div class="question-content">
			<h1>{{ $index+=1 }}ª) {{ $closeQuestion->statement }}</h1>
			<ol>
				@foreach ($closeQuestion->alternatives as $alternative)
				<li>{{$alternative->statement}}</li>
				@endforeach
			</ol>
			<p><strong>Observações: </strong>{{ $closeQuestion->comments }}</p>
			<a href="{{ route('close_question.edit.get', [$closeQuestion->id]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="{{ route('close_question.delete.get', [$closeQuestion->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Deletar</a>
		</div>

		@endforeach
	</div>
</div>
@endif
@endsection
