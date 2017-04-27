@extends('templates.dashboard')
@section('titulo') Dashboard - Listagem de Questionários @endsection
@section('content')
		<div class="nav-buttons">
			<a href="{{ route('dash.home') }}" class="btn btn-default">Voltar</a>
			<a href="{{ route('questionnaire.create') }}" class="btn btn-primary">Criar</a>
		</div>
		<table class="table table-bordered table-striped">
				<thead>	
						<tr>
							<th>#</th>
							<th>Título</th>
							<th>Data de Início</th>
							<th>Data de Término</th>
							<th>Descrição</th>
							<th>Ações</th>
						</tr>
				</thead>	
				
				<tbody>
						@foreach($questionnaires as $questionnaire)
							<tr>
								<td>{{ $questionnaire->id }}</td>
								<td>{{ $questionnaire->title }}</td>
								<td>{{ date('d/m/Y', strtotime($questionnaire->ini_date)) }}</td>
								<td>{{ date('d/m/Y', strtotime($questionnaire->end_date)) }}</td>
								<td>{{ $questionnaire->description }}</td>
								<td>
									<a href="{{ route('questionnaire.edit', $questionnaire->id) }}" class="btn btn-block btn-warning">Editar</a>
									<a href="{{ route('questionnaire.view', $questionnaire->id) }}" class="btn btn-block btn-info">Visualizar</a>
								</td>
							</tr>
						@endforeach	
				</tbody>
		</table>
@endsection
