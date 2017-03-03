@extends('templates.dashboard')
@section('titulo') Questionarios - cadastrar @endsection
@section('content') 

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Cadastro de Questionário</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['route' => 'questionario.cadastrar', 'method' => 'post']) !!}

				<div class="row">
					<div class="form-group col-md-4">
						{!! Form::label('titulo', 'Título') !!}
						{!! Form::text('titulo', '', ['class' => 'form-control']) !!}
					</div>

					<div class="form-group col-md-4">
						{!! Form::label('data_ini', 'Data de início') !!}
						{!! Form::text('data_ini', '', ['class' => 'form-control', 'id' => 'date_ini']) !!}
					</div>

					<div class="form-group col-md-4">
						{!! Form::label('data_fim', 'Data de termino') !!}
						{!! Form::text('data_fim', '', ['class' => 'form-control', 'id' => 'date_fim']) !!}
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12">
						{!! Form::label('descricao', 'Descrição') !!}
						{!! Form::textarea('descricao', '', ['class' => 'form-control']) !!}
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-3">
						{!! Form::submit('Cadastrar', ['class' => 'btn btn-success btn-block']) !!}
					</div>
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
            
      var options={
        format: 'mm/dd/yyyy',
        todayHighlight: true,
        autoclose: true,
      };

      $('#date_ini').datepicker(options);
      $('#date_fim').datepicker(options);
  
    })
</script>

@endsection