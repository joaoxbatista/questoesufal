@extends('templates.dashboard')
@section('titulo')Listagem de Questionários @endsection
@section('content')
		<div class="nav-buttons">
			<a href="{{ route('questionnaire.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Novo</a>
			<a href="{{ route('answare') }}" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Respostas</a>
		</div>
		<table class="table table-bordered" id="list-questionnaires">
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
								<td width="20%"><strong>{{ $questionnaire->title }}</strong></td>
								<td>{{ date('d/m/Y', strtotime($questionnaire->ini_date)) }}</td>
								<td>{{ date('d/m/Y', strtotime($questionnaire->end_date)) }}</td>
								<td>{{ str_limit($questionnaire->description, 200)}}</td>
								<td class="row-button">
									<a href="{{ route('questionnaire.view', $questionnaire->id) }}" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="{{ route('questionnaire.edit', $questionnaire->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="{{ route('questionnaire.delete', $questionnaire->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
						@endforeach
				</tbody>
		</table>
@endsection

@section('style')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endsection
@section('scripts')
	<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$('#list-questionnaires').DataTable();
		} );
	</script>
@endsection
