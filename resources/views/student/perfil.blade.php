@extends('templates.student-dashboard')
@section('titulo') Página Inicial @endsection
@section('content')


    <h2>Informações do estudante</h2>
    {{ Form::open(['route' => 'student.perfil.update', 'method' => 'post'])}}
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Nome</label>
        {{ Form::text('name', auth()->guard('student')->user()->name, ['class' => 'form-control'] )}}
      </div>

      <div class="form-group col-md-4">
        <label for="">E-mail</label>
        {{ Form::text('email', auth()->guard('student')->user()->email, ['class' => 'form-control'] )}}
      </div>

      <div class="form-group col-md-2">
        <label for="">Matrícula</label>
        {{ Form::text('enrollment', auth()->guard('student')->user()->enrollment, ['class' => 'form-control'] )}}
      </div>
    </div>

    <button type="submyt" class="btn btn-primary">Atualizar</button>
    {{ Form::close() }}

@endsection
