@extends('templates.dashboard')
@section('titulo') Dashboard - ínicio @endsection
@section('content') 
	<ul>
		<li><a href=" {{ route('questionnaire.create')}}">Cadastro de Questionário</a></li>
		<li><a href="{{ route('open_question.create')}}">Cadastro de Questões Abertas</a></li>
		<li>
			<a href="{{ route('close_question.create')}}">Cadastro de Questões Fechadas</a>
			<ul>
				<li> 
					<a href="">Adição de Alternativas </a>
				</li>	
					
				<li>
					<a href="#">Editar alternativa</a>
				</li>
						
				<li>
					<a href="#">Remover alternativa</a>
				</li>
			</ul>
		</li>
		<li><a href="#">Responder Questionário</a></li>
	</ul>


@endsection