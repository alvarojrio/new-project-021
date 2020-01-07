@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Tabelas</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<a class="btn btn-primary" href="{{ url('admin/painel/tabelas/cadastrar-tabela') }}"><i class="fa fa-plus"></i> Cadastrar Nova Tabela</a>                                          
				
				<a class="btn btn-info" href="{{ url('admin/painel/categorias') }}"><i class="fa fa-bars"></i> Gerenciar Categorias</a>                                          
				
				<a class="btn btn-success" href="{{ url('admin/painel/tabelastemplates/cadastrar-tabela-template') }}"><i class="fa fa-plus"></i> Importar Tabela Modelo</a>

				<br /><br />
                                        
				<div class="clearfix"></div>

				<div class="table-responsive">
					<table class="table table-striped table-bordered tabela">
						<thead>
							<tr>
								<th>Nome</th>
								<th style="width: 60px">Data Inicial</th>
                                <th>Modelo Utilizado</th>  
                                <th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>

							@foreach($tabelas as $tabela)

								<tr data-row-id="{{ $tabela->cod_tabela }}">
									<td><?php echo $tabela->nome_tabela; ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($tabela->data_inicial)); ?></td>
                                    <td><?php echo (!empty($tabela->descricao_modelo)) ? $tabela->descricao_modelo : '-'; ?></td>	
                                    <td class="text-center col-xs">

										<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/tabelas/visualizar-tabela/'. Crypt::encrypt($tabela->cod_tabela)) }}">
											<i class="fa fa-search"></i>
										</a>

									</td>                                                                                
                                    <td class="text-center col-xs">

										<a class="btn btn-sm btn-success" data-tooltip="tooltip" title="Definir Valores" href="{{ url('admin/painel/tabelas/definir-valores-procedimentos-ativos-tabela/'. Crypt::encrypt($tabela->cod_tabela)) }}">
											<i class="fa fa-dollar-sign"></i>
										</a>

									</td>                                                                                                                            
									<td class="text-center col-xs">

										<a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/tabelas/alterar-tabela/'. Crypt::encrypt($tabela->cod_tabela)) }}">
											<i class="fas fa-edit"></i>
										</a>

									</td>
                                    <td class="text-center col-xs"> 

                                        <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Clonar" href="{{ url('admin/painel/tabelas/clonar-tabela/'. Crypt::encrypt($tabela->cod_tabela)) }}">
                                            <i class="fas fa-clone"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs"> 

                                        <a class="btn btn-sm btn-reajustar" data-tooltip="tooltip" title="Reajustar" href="{{ url('admin/painel/tabelas/reajustar-tabela-passo1/'. Crypt::encrypt($tabela->cod_tabela))}}">
                                            <i class="fas fa-wrench "></i>
                                        </a>   

                                    </td>										
                                    <td class="text-center col-xs">		
												
										<a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="{{ url('admin/painel/tabelas/inativar-tabela/'.   Crypt::encrypt($tabela->cod_tabela)) }}">
                                            <i class="fa fa-power-off"></i>
										</a>
										
									</td>
								</tr>

							@endforeach

						</tbody>
					</table>
                                    
                    <br />
                    
                    <a class="btn btn-sm btn-danger" href="{{ url('admin/painel/tabelas/inativo') }}">
                    <i class="fas fa-list-ul"></i> Listagem Inativos
                	</a>                                            
                                            
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

<script type="text/javascript" src="{{ asset('js/jquery.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

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
        { "searchable": true, "sortable": false },
        { "searchable": false, "sortable": false },
        { "searchable": false, "sortable": false },
        { "searchable": false, "sortable": false },
        { "searchable": false, "sortable": false }
    ]
});
</script>

@stop