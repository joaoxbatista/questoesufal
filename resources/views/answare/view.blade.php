@extends('templates.base')

@section('titulo')
  {{ $questionnaire->id }} - Questionário - SRQ UFAl
@endsection

@section('content')
<div class="questionnaire">
  <header>
    <span> Publicado em: <time datetime="{{ $questionnaire->ini_date}}" pubdate> {{ date('d/m/Y', strtotime($questionnaire->ini_date))}}</time></span>
  </header>
  <p>{{ $questionnaire->description }}</p>
</div>





{{ Form::open(['method' => 'post', 'route' => 'answare.questionnaire.store'])}}

  {{-- Questões Abertas --}}
  @if (count($questionnaire->openQuestions) > 0)
  <div class="question">
    <div class="question-header">
      Questão Aberta
    </div>
    <div class="question-body">
      @foreach ($questionnaire->openQuestions as $index => $openQuestion)
      <div class="question-content">
        <h1>{{ $openQuestion->statement }}</h1>
        {{ Form::textarea('openQuestion['.$openQuestion->id.']', '', ['class' => 'form-control', 'placeholder' => 'Insira sua resposta aqui.'])}}

      </div>
      @endforeach
    </div>
  </div>
  @endif

  {{-- Questões Fechadas --}}
  @if (count($questionnaire->closeQuestions) > 0)
  <div class="question">
  	<div class="question-header">
  		Questão Fechada
  	</div>
  	<div class="question-body">
  		@foreach ($questionnaire->closeQuestions as $indexCloseQuestion => $closeQuestion)
  		<div class="question-content">
        <h1>{{ $closeQuestion->statement }}</h1>
  			<h2>Alternativas</h2>

        @foreach($closeQuestion->alternatives as $indexAlternative => $alternative)
          <div class="well">
            {{ Form::radio('CloseQuestion['.$closeQuestion->id.']', $alternative->statement, true)}}
            {{ Form::label('CloseQuestion['.$closeQuestion->id.']', $alternative->statement)}}
          </div>
        @endforeach

  		</div>

  		@endforeach

  	</div>
  </div>
  @endif



  {{ Form::submit('Enviar', ['class' => 'btn btn-success']) }}
{{ Form::close() }}

@endsection