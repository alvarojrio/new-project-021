@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<div class="page-title">
	<div class="title_left">
		<h3>Planos</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
                <a class="btn btn-primary" href="{{ url('admin/painel/planos/cadastrar-plano') }}"><i class="fas fa-plus"></i> Cadastrar Novo Plano</a>

                <div class="clearfix"></div>
                                
				<div class="table-responsive">
					<table class="table table-striped table-bordered tabela">
						<thead>
							<tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>

                            @foreach($planos as $plano)

                                <tr>
                                    <td>{{ $plano->codigo }}</td>
                                    <td>{{ $plano->nome_plano }}</td>
                                    <td>
                                    <?php if($plano->tipo_plano == 1){ ?>                                                                    
                                        <strong class="bg-green">PESSOA FÍSICA</strong>
                                    <?php }elseif($plano->tipo_plano == 2){ ?>
                                        <strong class="bg-purple">PESSOA JURÍDICA</strong>
                                    <?php } ?>
                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/planos/visualizar/'. Crypt::encrypt($plano->cod_plano)) }}">
                                            <i class="fas fa-search"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Vínculos" href="{{ url('admin/painel/planos/gerenciar_vinculos/'. Crypt::encrypt($plano->cod_plano)) }}">
                                            <i class="fas fa-link"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/planos/alterar/'. Crypt::encrypt($plano->cod_plano)) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Clonar" href="{{ url('admin/painel/planos/clonar_plano/'. Crypt::encrypt($plano->cod_plano)) }}">
                                            <i class="fas fa-clone"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Migrar Pacientes" href="{{ url('admin/painel/planos/migrar_pacientes/'. Crypt::encrypt($plano->cod_plano)) }}">
                                            <i class="fas fa-share"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="javascript:void(0)" data-toggle="modal" data-target="#modal_deletar" onclick="atualiza_modal_deletar('{{ url('admin/painel/planos/deletar/'. Crypt::encrypt($plano->cod_plano)) }}')">
                                            <i class="fas fa-power-off"></i>
                                        </a>

                                    </td>
                                </tr>

                            @endforeach

						</tbody>
					</table>
				</div>
                                
                <div class="clearfix"></div>
                                                                
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form method="POST" action="" id="form_deletar">
	            <div class="modal-header">
	                <h4 class="modal-title">Você realmente deseja deletar este plano?</h4>
	            </div>
	            <div class="modal-body">
	                <p>Ao deletar o plano, todos os dados ligados a ele também deletados e não poderão ser recuperados.</p>
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
	        	toastr.error(response.mensagem,"Erro!");
	        };
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