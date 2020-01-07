@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categorias
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('categorias') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Categorias</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<a class="btn btn-primary" href="{{ url('admin/painel/categorias/cadastrar-categoria') }}"><i class="fa fa-plus"></i> Cadastrar Nova Categoria</a>                                          
				
				<br /><br />
                                        
				<div class="clearfix"></div>

				<div class="table-responsive">

					<table class="table table-striped table-bordered tabela">
					<thead>
						<tr>
							<td>Padrão?</td>
							<th>Descrição</th>
                            <th>Data de Criação</th>  
                            <th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>

						@foreach ($categorias as $categoria)

							<tr data-row-id="">
								<td><?php echo ($categoria->padrao == 1) ? 'Sim' : 'Não'; ?></td>
                                <td><?php echo $categoria->descricao; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($categoria->data_criacao)); ?></td>
								<td class="text-center col-xs">
									<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="<?php echo url('admin/painel/categorias/visualizar-categoria/' . Crypt::encrypt($categoria->cod_categoria)); ?>">
										<i class="fa fa-search"></i>
									</a>										
								</td>
								<td class="text-center col-xs">
									<?php if ($categoria->padrao != 1) { // Caso a categoria não seja padrão ?>
									<a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="<?php echo url('admin/painel/categorias/alterar-categoria/' . Crypt::encrypt($categoria->cod_categoria)); ?>">
										<i class="fas fa-edit"></i>
									</a>
									<?php } else { // Caso a categoria seja padrão ?>
									<a class="btn btn-sm btn-info disabled" href="javascript:void(null);">
										<i class="fas fa-edit"></i>
									</a>
									<?php } ?>									
								</td>                                                                                									                                        										
                                <td class="text-center col-xs">
                                	<?php if ($categoria->padrao != 1) { // Caso a categoria não seja padrão ?>
									<a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="<?php echo url('admin/painel/categorias/inativar-categoria/' . Crypt::encrypt($categoria->cod_categoria)); ?>">
                                    	<i class="fa fa-power-off"></i>
									</a>
									<?php } else { // Caso a categoria seja padrão ?>
									<a class="btn btn-sm btn-danger disabled" href="javascript:void(null);">
										<i class="fas fa-power-off"></i>
									</a>
									<?php } ?>	
								</td>
							</tr>

						@endforeach

					</tbody>
					</table>
                                    
                    <br />

                    <a class="btn btn-sm btn-danger" href="{{ url('admin/painel/categorias/inativo') }}">
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
	    pageLength: 25,
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
	    },
	    order: [[ 1, "asc" ]]
	});
</script>
@stop