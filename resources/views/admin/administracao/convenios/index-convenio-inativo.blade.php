@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Convênios Inativos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-inativos') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Convênios Inativos</h3>
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
								<th>Razão Social</th>
								<th style="width: 95px">CNPJ</th>
                                                                <th>Padrão</th>

									<th>&nbsp;</th>
								
									<th>&nbsp;</th>
								        
							</tr>
						</thead>
						<tbody>
							
                                                    @foreach($convenios as $convenio)
                                                                                                                
								<tr>
									<td>{{ $convenio->nome_convenio }}</td>
									<td>{{ $convenio->razao_social }}</td>
									<td>{{ $convenio->cnpj }}</td>
                                                                        <td>
                                                                            <?php if ($convenio->auto_gestao == 0) { ?>                                                                    
                                                                                    <span class="label label-warning" style="font-size:14px">ANS</span>
                                                                            <?php } elseif ($convenio->auto_gestao == 1) { ?>
                                                                                    <span class="label label-success" style="font-size:14px">AUTO GESTÃO</span>
                                                                            <?php } ?>
                                                                        </td>
                                                                        
                                                                        
                                                                            <td class="text-center col-xs">

											<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/convenios/visualizar-convenio-inativo/'.  Crypt::encrypt($convenio->cod_convenio)) }}">
												<i class="fa fa-search"></i>
											</a>
										
                                                                            </td>
                                                                            <td class="text-center col-xs">

											<a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar" href="{{ url('admin/painel/convenios/reativar-convenio/'.   Crypt::encrypt($convenio->cod_convenio)) }}">
											<i class="fa fa-power-off"></i>
											</a>
										
                                                                            </td>
                                                                       
								</tr>
							@endforeach
						</tbody>
					</table>
                    
                    <br />

                    <a class="btn btn-sm btn-success" href="{{ url('admin/painel/convenios/') }}"><i class="fas fa-list-ul"></i> listagem Ativos</a>
                                        
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
		pageLength: 15,
        lengthMenu: [[15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
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
        }
	});
</script>
@stop