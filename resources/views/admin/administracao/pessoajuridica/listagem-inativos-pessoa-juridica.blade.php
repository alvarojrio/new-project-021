@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Pessoa Jurídica
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb adicionar aqui!!! --> 

<div class="page-title">
	<div class="title_left">
		<h3>Pessoa Jurídica</h3>
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
                                                <th>Razão Social</th>
                                                <th>CNPJ</th>
                                                <th>E-mail</th>
                                                <th style="width: 79px">Telefone</th>
                                                <th>&nbsp;</th>                                              	
                                                <th>&nbsp;</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pessoa_juridica as $pj)
                                                <tr>
                                                    <td>{{ $pj->razao_social }}</td>
                                                    <td>{{ $pj->cnpj }}</td>
                                                    <td>{{ $pj->email }}</td>
                                                    <td>{{ $pj->telefone }}</td>
                                                    <td class="text-center col-xs">
                                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url(app('prefixo') . '/painel/pessoajuridica/visualizar-inativo/'. Crypt::encrypt($pj->cod_pessoa_juridica)) }}">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-center col-xs">	
                                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Reativar" href="{{ url(app('prefixo') . '/painel/pessoajuridica/reativar/'.  Crypt::encrypt($pj->cod_pessoa_juridica)) }}">
                                                            <i class="fas fa-power-off" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>                                    
                                                                              
                                    <a class="btn btn-xs btn-success" href="{{ url(app('prefixo') . '/painel/clientes') }}"><i class="fas fa-list-ul"></i> Listagem Ativos</a>                                            
                                    
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