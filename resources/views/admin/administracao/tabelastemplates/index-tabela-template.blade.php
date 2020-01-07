@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<div class="page-title">
	<div class="title_left">
		<h3>Selecione o template que deseja utilizar:</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

                                <?php if($permissoes->TemPermissao("Visualizar_Tabela") === true) { ?>
					<a class="btn btn-primary" href="{{ url('admin/painel/tabelastemplates/cadastrar-tabela-template') }}"><i class="fa fa-plus"></i> Importar Tabela Template</a>
				<?php } ?>
                                        
				<div class="clearfix"></div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered tabela">
						<thead>
                                                    <tr>
                                                        <th>Tabela</th>
                                                        <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                <th>&nbsp;</th>
                                                        <?php } ?>

                                                    </tr>
						</thead>
						<tbody>
								<tr>
									<td>AMB 90</td>
                                                                        <td class="text-center col-xs">

                                                                            <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelastemplates/renomear-tabela-template') }}">
                                                                                            <i class="fas fa-hand-point-right"></i> Usar este modelo
                                                                                    </a>
                                                                            <?php } ?>

                                                                        </td>
										
								</tr>
                                                                <tr>
									<td>AMB 92</td>
                                                                        <td class="text-center col-xs">

                                                                            <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelastemplates/renomear-tabela-template') }}">
                                                                                            <i class="fas fa-hand-point-right"></i> Usar este modelo
                                                                                    </a>
                                                                            <?php } ?>

                                                                        </td>
										
								</tr>
                                                                <tr>
									<td>AMB 96</td>
                                                                        <td class="text-center col-xs">

                                                                            <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelastemplates/renomear-tabela-template') }}">
                                                                                            <i class="fas fa-hand-point-right"></i> Usar este modelo
                                                                                    </a>
                                                                            <?php } ?>

                                                                        </td>
										
								</tr>
                                                                <tr>
									<td>CBHPM (1ª Edição)</td>
                                                                        <td class="text-center col-xs">

                                                                            <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelas/renomear-tabela-template') }}">
                                                                                            <i class="fas fa-hand-point-right"></i> Usar este modelo
                                                                                    </a>
                                                                            <?php } ?>

                                                                        </td>
										
								</tr>
                                                                <tr>
									<td>CBHPM (2ª Edição)</td>
                                                                        <td class="text-center col-xs">

                                                                            <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelas/renomear-tabela-template') }}">
                                                                                            <i class="fas fa-hand-point-right"></i> Usar este modelo
                                                                                    </a>
                                                                            <?php } ?>

                                                                        </td>
										
								</tr>
                                                                <tr>
									<td>CIEFAS</td>
                                                                        <td class="text-center col-xs">

                                                                            <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelas/renomear-tabela-template') }}">
                                                                                            <i class="fas fa-hand-point-right"></i> Usar este modelo
                                                                                    </a>
                                                                            <?php } ?>

                                                                        </td>
										
								</tr>
                                                                <tr>
									<td>TUSS</td>
                                                                        <td class="text-center col-xs">

                                                                            <?php if($permissoes->TemPermissao("Visualizar_Tabela")) { ?>
                                                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelas/renomear-tabela-template') }}">
                                                                                            <i class="fas fa-hand-point-right"></i> Usar este modelo
                                                                                    </a>
                                                                            <?php } ?>

                                                                        </td>
										
								</tr>
							
						</tbody>
					</table>
                                            
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form method="POST" action="" id="form_deletar">
	            <div class="modal-header">
	                <h4 class="modal-title">Você realmente deseja deletar esta tabela?</h4>
	            </div>
	            <div class="modal-body">
	                <p>Ao deletar a tabela, todos os dados ligados a ela também serão deletados e não poderão ser recuperados.</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	                <button type="submit" class="btn btn-danger">Deletar</button>
	            </div>
	        </form>
        </div>
    </div>
</div>
@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
	function atualiza_modal_deletar(url){
		$("#form_deletar").attr('action', url);
	}

	var options = {
	    success: function(response) {
	        if(response.status == 1){
	        	toastr.success(response.mensagem,"Sucesso!");

	        	$("table").find("[data-row-id='"+response.cod+"']").remove();
	        	$("#modal_deletar").modal('hide');
	        }else{
	        	console.log(response);
	        	toastr.error(response.mensagem,"Erro!");
	        };
	    },
	    error: function(response){
	    	console.log(response);
	    }
	}; 

	$('#form_deletar').ajaxForm(options);

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