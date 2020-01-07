@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Carteirinhas
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@stop

@section('conteudo')
<div class="page-title">
	<div class="title_left">
		<h3>Carteirinhas</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="clearfix"></div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered tabela">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>CPF</th>
								<th>E-mail</th>
								<th>Telefone</th>
								<th class="text-center">Gerar Carteirinha</th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1; ?>
							@foreach($clientes as $cliente)
								<tr data-row-id="{{ $cliente->cod_cliente }}">
									<td>{{ $count }}</td>
									<td>{{ $cliente->nome }}</td>
									<td>{{ $cliente->cpf }}</td>
									<td>{{ $cliente->email }}</td>
									<td>{{ $cliente->telefone }}</td>
									<td class="text-center">
										<a class="btn btn-sm btn-primary" data-toggle="tooltip" title="Imprimir" href="{{ url('admin/painel/carteirinhas/imprimir/'.$cliente->cod_cliente) }}">
											<i class="fa fa-print"></i>
										</a>
									</td>
								</tr>
								<?php $count++; ?>
							@endforeach
						</tbody>
					</table>
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