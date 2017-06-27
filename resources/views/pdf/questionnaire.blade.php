@extends('templates.pdf')

@section('content')

  <h3>Informações do questionário</h3>
  @foreach($questionnaires as $questionnaire)
    <p><strong>Codigo: </strong>{{ $questionnaire->id }} <strong>Título: </strong> {{ $questionnaire->title }} <strong>Criado em: </strong> {{ $questionnaire->ini_date }}</p>
    <p><strong>Desrcição: </strong> {{ $questionnaire->description }}</p>

    @if (count($questionnaire->openQuestions) > 0)
    {{-- Questões Abertas --}}
    <h2>Questões Abertas</h2>
    	<div class="question-body">
    		@foreach ($questionnaire->openQuestions as $index => $openQuestion)
    		<div class="question-content">
    			<h3>{{ $index+=1 }}ª) {{ $openQuestion->statement }}</h3>
    			<p> <strong>Observações: </strong>{{ $openQuestion->comments }}</p>
    			</div>
    		@endforeach


    	</div>
    </div>
    @endif

    @if (count($questionnaire->closeQuestions) > 0)
    {{-- Questões Fechadas --}}
    <div class="question">
    	<h2>Questões Fechadas</h2>
    	<div class="question-body">
    		@foreach ($questionnaire->closeQuestions as $index => $closeQuestion)
    		<div class="question-content">
    			<h3>{{ $index+=1 }}ª) {{ $closeQuestion->statement }}</h3>
          <p><strong>Observações: </strong>{{ $closeQuestion->comments }}</p>

    			<h4>Alternativas</h4>
    			<ul>
    				@foreach ($closeQuestion->alternatives as $alternative)
    				<li>( ) {{$alternative->statement}}</li>
    				@endforeach
    			</ul>

    		 </div>

    		@endforeach
    	</div>
    </div>
    @endif

  @endforeach
@endsection
