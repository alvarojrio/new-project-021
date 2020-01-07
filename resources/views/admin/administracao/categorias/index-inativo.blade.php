@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categorias Inativos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('categorias-inativas') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Categorias Inativos</h3>
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
								<th>Descrição</th>
								<th>Data Criação</th>

									<th>&nbsp;</th>
								
									<th>&nbsp;</th>
								        
							</tr>
						</thead>
						<tbody>
							
                                                    @foreach($categorias as $categoria)
                                                                                                                
								<tr>
									<td>{{ $categoria->descricao }}</td>
                                                                        <td><?php echo date('d/m/Y',strtotime($categoria->data_criacao)); ?></td>
                                                                        
                                                                        
                                                                            <td class="text-center col-xs">

											<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/categorias/visualizar-categoria/'.  Crypt::encrypt($categoria->cod_categoria)) }}">
												<i class="fa fa-search"></i>
											</a>
										
                                                                            </td>
                                                                            <td class="text-center col-xs">

											<a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Reativar" href="{{ url('admin/painel/categorias/reativar-categoria/'.   Crypt::encrypt($categoria->cod_categoria)) }}">
											<i class="fa fa-power-off"></i>
											</a>
										
                                                                            </td>
                                                                      
								</tr>
							@endforeach
						</tbody>
					</table>
                    
                    <br /><br />
                                    
                        <a class="btn btn-sm btn-success" href="{{ url('admin/painel/categorias/') }}"><i class="fas fa-list-ul"></i> Listagem Ativos</a>
                                    
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