@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades inativa
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Especialidades</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

			<a class="btn btn-primary" href="{{ url('admin/painel/especialidades/cadastrar-especialidade') }}"><i class="fa fa-plus"></i> Cadastrar Nova Especialidade</a>
			
			<br /><br />

			<div class="clearfix"></div>

				<div class="table-responsive">
					<table class="table table-striped table-bordered tabela">
						<thead>
                                                    <tr>								
                                                        <th>Nome</th>
                                                        <th style="width: 120px">Sexos Permitidos</th>
                                                        <th style="width: 77px">Agendamento?</th>
                                                        <th style="width: 77px">Ordem</th>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
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

                                                                <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/especialidades/visualizar-especialidade/'. Crypt::encrypt($especialidade->cod_especialidade)) }}">
                                                                    <i class="fa fa-search"></i>
                                                                </a>

                                                            </td>
                                                            <td class="text-center col-xs">

                                                                    <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/especialidades/alterar-especialidade/'. Crypt::encrypt($especialidade->cod_especialidade)) }}">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>

                                                            </td>
                                                            <td class="text-center col-xs">

                                                                <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Vincular" href="{{ url('admin/painel/especialidades/vincular-especialidade-procedimento/'. Crypt::encrypt($especialidade->cod_especialidade)) }}')">
                                                                    <i class="fa fa-link"></i>
                                                                </a>

                                                            </td>
                                                            
                                                            <td class="text-center col-xs">
                                                                
                                                                <a class="btn btn-sm btn-reajustar" data-tooltip="tooltip" title="Ordernar Médico" href="{{ url('admin/painel/especialidades/ordem-medico-especialidade/'. Crypt::encrypt($especialidade->cod_especialidade)) }}">
                                                                    <i class="fas fa-list-ol"></i>
                                                                </a>
                                                                
                                                            </td>
                                                            
                                                            <td class="text-center col-xs">

                                                                    <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="{{ url('admin/painel/especialidades/inativar-especialidade/'. Crypt::encrypt($especialidade->cod_especialidade)) }}')">
                                                                            <i class="fa fa-power-off"></i>
                                                                    </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
						</tbody>
					</table>

					<br />
                                    
                    <a class="btn btn-sm btn-danger" href="{{ url('admin/painel/especialidades/index-especialidade-inativa') }}">
                    	<i class="fas fa-list-ul"></i> Listagem Inativos
                	</a>  
                                    
				</div>
			</div>
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