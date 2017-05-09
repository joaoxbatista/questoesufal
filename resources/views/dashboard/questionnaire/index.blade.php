@extends('templates.dashboard')
@section('titulo') Dashboard - Listagem de Questionários @endsection
@section('content')
		<div class="nav-buttons">
			<a href="{{ route('questionnaire.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
		</div>
		<table class="table table-bordered">
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
								<td width="20%">{{ $questionnaire->title }}</td>
								<td>{{ date('d/m/Y', strtotime($questionnaire->ini_date)) }}</td>
								<td>{{ date('d/m/Y', strtotime($questionnaire->end_date)) }}</td>
								<td>{{ $questionnaire->description }}</td>
								<td class="row-button">
									<a href="{{ route('questionnaire.edit', $questionnaire->id) }}" class="btn btn-block btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editar</a>
									<a href="{{ route('questionnaire.view', $questionnaire->id) }}" class="btn btn-block btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</a>

									<a href="{{ route('questionnaire.delete', $questionnaire->id) }}" class="btn btn-block btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Remover</a>
								</td>
							</tr>
						@endforeach	
				</tbody>
		</table>
@endsection
