@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Convênios
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Convênios</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<a class="btn btn-primary" href="{{ url('admin/painel/convenios/cadastrar-convenio') }}"><i class="fa fa-plus"></i> Cadastrar Novo Convênio</a>
                
                <br /><br />  

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
								<th>&nbsp;</th>                                                                        
							</tr>
						</thead>
						<tbody>
							
                            @foreach($convenios as $convenio)
                                                                                                                
								<tr>
									<td>{{ $convenio->nome_convenio }}</td>
									<td>{{ $convenio->razao_social }}</td>
									<td>{{ drclub\Biblioteca\FuncoesGlobais::mascaraCnpj($convenio->cnpj) }}</td>
                                    <td>
                                        <?php if ($convenio->auto_gestao == 0) { ?>                                                                    
                                                <span class="label label-warning" style="font-size:14px">ANS</span>
                                        <?php } elseif ($convenio->auto_gestao == 1) { ?>
                                                <span class="label label-success" style="font-size:14px">AUTO GESTÃO</span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center col-xs">

										<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/convenios/visualizar-convenio/'.  Crypt::encrypt($convenio->cod_convenio)) }}">
                                            <i class="fas fa-search"></i>
										</a>

                                    </td>
                                    <td class="text-center col-xs">

										<a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/convenios/alterar-convenio/'.   Crypt::encrypt($convenio->cod_convenio)) }}">
                                            <i class="fas fa-edit"></i>
										</a>

                                    </td>
                                    <td class="text-center col-xs">

										<a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="{{ url('admin/painel/convenios/inativar-convenio/'.   Crypt::encrypt($convenio->cod_convenio)) }}">
                                            <i class="fa fa-power-off"></i>
										</a>

									</td>
								</tr>
								
							@endforeach

						</tbody>
					</table>

					<br />
                                        
                    <a class="btn btn-sm btn-danger" href="{{ url('admin/painel/convenios/index-convenio-inativo') }}">
                    	<i class="fas fa-list-ul"></i> Listagem Inativos
                	</a>                                            
                                    

					@if(session('aviso_cadastrar_planos') != null)
						<div class="modal fade" id="modal_aviso_cadastrar_planos" tabindex="-1" role="dialog">
						    <div class="modal-dialog">
						        <div class="modal-content">
						            <div class="modal-header">
						                <h4 class="modal-title">Cadastrar Planos</h4>
						            </div>
						            <div class="modal-body">
						                <p>Você deseja prosseguir ao cadastro de planos do convênio recém cadastrado?</p>
						            </div>
						            <div class="modal-footer">
						            	<a href="{{ url('admin/painel/planos/cadastrar?codconvenio='.session('aviso_cadastrar_planos')) }}" class="btn btn-primary">Cadastrar Planos</a>
						                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						            </div>
						        </div>
						    </div>
						</div>
					@endif


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
	                <h4 class="modal-title">Você realmente deseja deletar este convenio?</h4>
	            </div>
	            <div class="modal-body">
	                <p>Ao deletar o convenio, todos os dados ligados a ele também deletados e não poderão ser recuperados.</p>
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

@if(session('aviso_cadastrar_planos') != null)
<script type="text/javascript">
	$("#modal_aviso_cadastrar_planos").modal('show');
</script>
@endif

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