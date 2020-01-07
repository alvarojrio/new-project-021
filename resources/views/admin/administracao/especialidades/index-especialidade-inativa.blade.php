@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades-inativas') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Especialidades Inativas</h3>
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
	                            <th style="width: 120px">Sexos Permitidos</th>
	                            <th style="width: 77px">Agendamento?</th>
								<th>&nbsp;</th>
	                            <th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($especialidades as $especialidade)
								<tr>
									<td>{{ $especialidade->nome_especialidade }}</td>
									<td>@if($especialidade->sexo_especialidade == 1) Apenas Homens @endif @if($especialidade->sexo_especialidade == 2) Apenas Mulheres @endif @if($especialidade->sexo_especialidade == 3) Ambos @endif</td>
									<td>@if($especialidade->agendamento == 1) Sim @else Não @endif</td>
									<td class="text-center col-xs">

										<a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/especialidades/visualizar-especialidade-inativa/'. Crypt::encrypt($especialidade->cod_especialidade)) }}">
											<i class="fa fa-search"></i>
										</a>

									</td>
									<td class="text-center col-xs">

										<a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar" href="{{ url('admin/painel/especialidades/reativar-especialidade/'. Crypt::encrypt($especialidade->cod_especialidade)) }}')">
											<i class="fas fa-power-off"></i>
                                        </a>

									</td>			
								</tr>
							@endforeach
						</tbody>
					</table>

					<br />
                                    
                    <a class="btn btn-sm btn-success" href="{{ url('admin/painel/especialidades') }}"> <i class="fas fa-list-ul"></i> Listagem Ativos</a> 
                                    
				</div>
			</div>
		</div>
	</div>
</div>

<!--<div class="modal fade" id="modal_deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form method="POST" action="" id="form_deletar">
	            <div class="modal-header">
	                <h4 class="modal-title">Você realmente deseja deletar esta especialidade?</h4>
	            </div>
	            <div class="modal-body">
	                <p>Ao deletar a especialidade, todos os dados ligados a ele também deletados e não poderão ser recuperados.</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	                <button type="submit" class="btn btn-danger">Deletar</button>
	            </div>
	        </form>
        </div>
    </div>
</div>-->

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