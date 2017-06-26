@extends('templates.student-dashboard')
@section('titulo') Página Inicial @endsection
@section('content')

  <div class="jumbotron">
    <h2>Informações do estudante</h2>
    {{ Form::open(['route' => 'student.perfil.update', 'method' => 'post'])}}
    <div class="form-group">
      <label for="">Nome</label>
      {{ Form::text('name', auth()->guard('student')->user()->name, ['class' => 'form-control'] )}}
    </div>

    <div class="form-group">
      <label for="">E-mail</label>
      {{ Form::text('email', auth()->guard('student')->user()->email, ['class' => 'form-control'] )}}
    </div>

    <div class="form-group">
      <label for="">Matrícula</label>
      {{ Form::text('enrollment', auth()->guard('student')->user()->enrollment, ['class' => 'form-control'] )}}
    </div>

    <button type="submyt" class="btn btn-primary">Atualizar</button>
    {{ Form::close() }}
  </div>
@endsection
