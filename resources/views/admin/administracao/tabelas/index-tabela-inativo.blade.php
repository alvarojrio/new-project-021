@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas Inativos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-inativas') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Tabelas Inativos</h3>
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
								<th>Nome</th>
								<th>Data Inicial</th>
								<th>Data Final</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>                                                                        
							</tr>
						</thead>
						<tbody>
							
                            @foreach($tabelas as $tabela)
                                                                                                                
								<tr>
									<td>{{ $tabela->nome_tabela }}</td>
                                    <td><?php echo date('d/m/Y',strtotime($tabela->data_inicial));  ?></td>
									<td><?php echo (!empty($tabela->data_final)) ? date('d/m/Y', strtotime($tabela->data_final)) : '-'; ?></td>
                                    <td class="text-center col-xs">

										<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelas/visualizar-inativo/'.  Crypt::encrypt($tabela->cod_tabela)) }}">
											<i class="fa fa-search"></i>
										</a>

                                    </td>
                                    <td class="text-center col-xs">

										<a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar" href="{{ url('admin/painel/tabelas/reativar-tabela/'.   Crypt::encrypt($tabela->cod_tabela)) }}">
											<i class="fa fa-power-off"></i>
										</a>

                                    </td>
								</tr>

							@endforeach

						</tbody>
					</table>

					<br />
                                    
                    <a class="btn btn-sm btn-success" href="{{ url('admin/painel/tabelas/') }}"><i class="fas fa-list-ul"></i> Listagem Ativos</a>
                                    
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
	pagingType: "full_numbers",
	language: {
        "emptyTable": "Não foram encontrados registros",
        "zeroRecords": "Não há registros para exibir",
        "processing": "Reunindo dados",
        "loadingRecords": "Carregando...",
        "lengthMenu": "Mostrar _MENU_ itens por página",
        "search": "Buscar:" ,
        "infoEmpty": "Exibindo registros 0 a 0 de 0 registros",
        "info": "Exibindo registros _START_ a _END_ de _TOTAL_ registros", // Showing _START_ to _END_ of _TOTAL_ entries
        "infoFiltered": " (filtrado de _MAX_ registros)",
        "paginate": {
            "first": "<<",
            "previous": "<",
            "next": ">",
            "last": ">>"
        }
    },
    order: [[ 0, "asc" ]],
    columns: [
        { "searchable": true, "sortable": true },
        { "searchable": true, "sortable": true },
        { "searchable": true, "sortable": true },
        { "searchable": true, "sortable": false },            
        { "searchable": true, "sortable": false }
    ]
});
</script>
@stop