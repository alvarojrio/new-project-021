@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades | Visualizar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades-inativa-visualizar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Visualizar Especialidade Inativa</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th colspan="2">Dados Gerais</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th style="width:180px">Nome: </th>
									<td>{{ $especialidade->nome_especialidade }}</td>
								</tr>
								<tr>
									<th style="width:180px">Sexos Permitidos: </th>
									<td>@if($especialidade->sexo_especialidade == 1) Apenas Homens @endif @if($especialidade->sexo_especialidade == 2) Apenas Mulheres @endif @if($especialidade->sexo_especialidade == 3) Ambos @endif</td>
								</tr>
								<tr>
									<th style="width:180px">Agendamento: </th>
									<td>@if($especialidade->agendamento == 1) Sim @else Não @endif</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>
					<div class="col-xs-12">
						<a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right">Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('includes_no_body')

<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
	$(".tabela").DataTable({
	  "language": {
	    "lengthMenu": "Mostrar _MENU_ itens por página",
	    "zeroRecords": "Nenhum resultado encontrado",
	    "info": "Mostrando página _PAGE_ de _PAGES_",
	    "infoEmpty": "Nenhum resultado disponível",
	    "infoFiltered": "(filtrado de _MAX_ itens ao total)",
	    "sSearch": "Buscar:",
	    "oPaginate": {
	      "sPrevious": "Anterior",
	      "sNext": "Próxima"
	    }
	  }
	});
</script>

@stop
