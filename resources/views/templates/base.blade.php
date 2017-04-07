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
			
			
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ route('inicio') }}">Página Inicial</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Area do Usuário <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('login') }}">Entrar</a></li>
							<li><a href="{{ route('register') }}">Cadastre-se</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
