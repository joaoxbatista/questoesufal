@extends('templates.dashboard')

@section('titulo')
Questionários / Respostas
@endsection

@section('content')
  @foreach($answares as $answare)

  <div class="well">
    <span class="label label-success"> <i class="fa fa-check"></i> Respondido em {{ date('d/m/Y', strtotime($answare->created_at))}}</span>
    <span class="label label-info"> <i class="fa fa-clock-o"></i> Criado em {{ date('d/m/Y', strtotime($answare->questionnaire->ini_date))}}</span>
    
    <div class="info-questionnaire">
      <h3>Informações do questionário</h3>
      <p>{{ $answare->questionnaire->title }}.  </p>

    </div>

    <div class="info-question">
      <div class="close-answares">
        @foreach($answare->closeAnswares as $closeAnsware)
          <h3>{{$closeAnsware->closeQuestion->statement}}</h3>
          <p>{{$closeAnsware->closeQuestion->comments}}</p>

          <div class="alert alert-info">{{ $closeAnsware->alternative->statement}}</div>
        @endforeach
      </div>

      <div class="open-answares">
        @foreach($answare->openAnswares as $openAnsware)
          <h3>{{$openAnsware->openQuestion->statement}}</h3>
          <div class="alert alert-info">{{ $openAnsware->value}}</div>
        @endforeach
      </div>
    </div>

  </div>



  @endforeach
@endsection
