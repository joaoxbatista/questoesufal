<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('titulo')</title>

	<link rel="stylesheet" type="text/css" href="{{url('css/autoload.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/templates/default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">

	@yield('style')
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
					<li><a href="{{route('student.dashboard')}}"><i class="fa fa-home"></i></a></li>
					<li><a href="{{route('student.questionnaire')}}"><i class="fa fa-pencil"></i></a></li>
					<li><a href="{{route('student.perfil')}}"><i class="fa fa-user"></i></a></li>
					<li><a href="{{ route('student.logout.get') }}"><i class="fa fa-power-off"></i></a></li>


				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="current-page">
		<div class="container">Dashboard Estudante / @yield('titulo')</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="row group-messages" style="margin-top: 10px">
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
		<div class="row" style="margin-top: 10px">
			@yield('content')
		</div>
	</div>

	<script src="{{ url('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ url('bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js') }}"></script>
	@yield('scripts')
</body>
</html>
