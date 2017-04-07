<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/autoload.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/templates/default.css')}}">

</head>
<body>
  
  <nav class="navbar" role="navigation" id="menu">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('inicio') }}">
                    <img src="{{ url('imgs/ufal_logo.png') }}">
                    <span>Universidade Federal de Alagoas</span>
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('questionario') }}">Questionários</a></li>
                <li><a href="#">Relatórios</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Configurações</a></li>
                        <li><a href="{{ route('sair') }}">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>



<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="group-messages">
        @if( count($errors) > 0 )
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ocorreram os seguintes erros:</strong>
            <ul>
                @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if( session()->has('success'))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sucesso!</strong> {{ session('success')}}
        </div>
        @endif
    </div>
</div>
</div>
@yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>
