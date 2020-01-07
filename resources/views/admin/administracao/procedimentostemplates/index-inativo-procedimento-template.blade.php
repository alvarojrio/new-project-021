@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Procedimentos Templates Inativos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<div class="page-title">
	<div class="title_left">
		<h3>Procedimentos Templates Inativos</h3>
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
								<th>Código</th>
								<th>Descrição</th>

								<?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
									<th>&nbsp;</th>
								<?php } ?>

								<?php if($permissoes->TemPermissao("Excluir_Tabela")) { ?>
									<th>&nbsp;</th>
								<?php } ?>
                                                                        
							</tr>
						</thead>
						<tbody>
							
                                                    @foreach($procedimentos_templates as $procedimento_template)
                                                                                                                
								<tr>
									<td>{{ $procedimento_template->cod_procedimento_template }}</td>
									<td>{{ $procedimento_template->codigo }}</td>
									<td>{{ $procedimento_template->descricao }}</td>
                                                                        
                                                                        <?php if($permissoes->TemPermissao("Visualizar_Tabela") || $permissoes->TemPermissao("Alterar_Tabela") || $permissoes->TemPermissao("Excluir_Tabela") === true) { ?>
                                                                        
                                                                            <td class="text-center col-xs">

										<?php if($permissoes->TemPermissao("Visualizar_Tabela") === true) { ?>
											<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/procedimentostemplates/visualizar-inativo-procedimento-template/'.  Crypt::encrypt($procedimento_template->cod_procedimento_template)) }}">
												<i class="fa fa-search"></i>
											</a>
										<?php } ?>

                                                                            </td>
                                                                            <td class="text-center col-xs">

										<?php if($permissoes->TemPermissao("Excluir_Tabela") === true) { ?>
											<a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Reativar" href="{{ url('admin/painel/procedimentostemplates/reativar-procedimento-template/'.   Crypt::encrypt($procedimento_template->cod_procedimento_template)) }}">
											<i class="fa fa-power-off"></i>
											</a>
										<?php } ?>

                                                                            </td>
                                                                        <?php } ?>
								</tr>
							@endforeach
						</tbody>
					</table>
                                    
                                        <?php if($permissoes->TemPermissao("Visualizar_Tabela") === true) { ?>
                                            <a class="btn btn-xs btn-success" href="{{ url('admin/painel/tabelas/cadastrar') }}"> listagem Ativos</a>
                                        <?php } ?>
                                    
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