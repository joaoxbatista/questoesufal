@extends('templates.dashboard')

@section('titulo')
Questionários / Respostas
@endsection

@section('content')

  <div class="nav-buttons">
    <a href="{{ route('dash.home') }}" class="btn btn-default">Voltar</a>
  </div>

  @foreach($answares as $answare)
  <div class="well">
    <span class="label label-success"> <i class="fa fa-check"></i> Respondido em {{ date('d/m/Y', strtotime($answare->created_at))}}</span>
    <span class="label label-info"> <i class="fa fa-clock-o"></i> Criado em {{ date('d/m/Y', strtotime($answare->questionnaire->ini_date))}}</span>

    <div class="info-questionnaire">
      <h3>Informações do questionário</h3>
      <p><strong>Codigo: </strong>{{ $answare->questionnaire->id }}</p>
      <p><strong>Title: </strong>{{ $answare->questionnaire->title }}</p>
    </div>

    <div class="info-student">
      <h3>Informações de estudantes</h3>
      <p><strong>Matrícula: </strong>{{ $answare->student->enrollment }}</p>
      <p><strong>Nome: </strong>{{ $answare->student->name }}</p>
    </div>
  </div>



  @endforeach
@endsection
