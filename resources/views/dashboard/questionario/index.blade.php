@extends('templates.dashboard')
@section('titulo') Dashboard - Questionarios @endsection
@section('content')

	<nav class="links">
		<a href="{{ route('questionario.cadastrar') }}" class="btn btn-success">Cadastrar</a>
	</nav>

	<div class="questionarios">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Título</th>
						<th>Data Inicial</th>
						<th>Data Final</th>
						<th>Descrição</th>
						<th>Pontuação</th>
						<th>Ações</th>
					</tr>
				</thead>

				<tbody>
					@foreach( $questionarios as $questionario)
						<tr>
							<td>{{ $questionario->id }}</td>
							<td>{{ $questionario->titulo }}</td>
							<td>{{ $questionario->data_ini }}</td>
							<td>{{ $questionario->data_fim }}</td>
							<td>{{ $questionario->descricao }}</td>
							<td>{{ $questionario->pontuacao }}</td>
							<td width="200px">
								<a href="" class="btn btn-info"> <span class="glyphicon glyphicon-resize-full"></span></a>
								<a href="" class="btn btn-warning"> <span class="glyphicon glyphicon-pencil"></span></a>
								<a href="" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> </a>
								<a href="" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
