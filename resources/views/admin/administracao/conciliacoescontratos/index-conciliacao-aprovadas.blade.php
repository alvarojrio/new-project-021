@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Conciliação de Vendas
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('conciliacao-vendas-aprovadas') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Conciliação de Vendas</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

                <a class="btn btn-primary" href="<?php echo url('admin/painel/conciliacaovendas/cadastrar-contrato-pf'); ?>"><i class="fa fa-plus"></i> Cadastrar Nova Conciliação</a> 

                <div class="row tile_count">

                    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count text-center">
                        
                        <span class="count_top">CONCILIAÇÕES AGUARDANDO</span>
                        <div class="count text-warning"><?php echo $total_c_aguardando; ?></div>
                        <span class="count_bottom">
                            
                            <a class="btn btn-sm btn-info" href="<?php echo url('admin/painel/conciliacaovendas'); ?>">
                            <i class="fa fa-search"></i> Visualizar Conciliações
                            </a>

                        </span>

                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count text-center">
                        
                        <span class="count_top">CONCILIAÇÕES APROVADAS</span>
                        <div class="count text-success"><?php echo $total_c_aprovado; ?></div>
                        <span class="count_bottom">
                            
                            <a class="btn btn-sm btn-info disabled botao_desativado" href="javascript:void(null);">
                            <i class="fa fa-search"></i> Visualizar Conciliações
                            </a>

                        </span>

                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count text-center">
                        
                        <span class="count_top">CONCILIAÇÕES REPROVADAS</span>
                        <div class="count text-danger"><?php echo $total_c_reprovado; ?></div>
                        <span class="count_bottom">
                            
                            <a class="btn btn-sm btn-info" href="<?php echo url('admin/painel/conciliacaovendas/index-reprovadas'); ?>">
                            <i class="fa fa-search"></i> Visualizar Conciliações
                            </a>

                        </span>

                    </div>
                    
                </div>
				
				<h2 class="text-success">Lista de Conciliações Aprovadas</h2>

                <br />

				<!-- INICIO DIV.TABLE-RESPONSIVE -->
                <div class="table-responsive">
                        
                    <table class="minha_datatable table table-striped table-hover table-bordered tabela">
                    <thead>
                    <tr>
                        <th>Nº do Contrato</th>
                        <th>Cliente</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Origem</th>
                        <th>Vendedor</th>
                        <th>Valor (R$)</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    </table>

                </div>
                <!-- FIM DIV.TABLE-RESPONSIVE -->

			</div>
		</div>
	</div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

	// Tabela de dados
    var tabela = $('.minha_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "<?php echo url('admin/painel/conciliacaovendas/datatable-contratos-aprovados'); ?>",
            "type": "POST"
        },
        stateSave: false,
        deferRender: false,
        info: true,
        ordering: true,
        paging: true,
        searching: true,
        autoWidth: false,
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
        },
        order: [[ 0, "desc" ]],
        columns: [
            { "data": 0, "name": "cpfp.numero_contrato_pf", "width": "9%", "searchable": true, "sortable": true },
            { "data": 1, "name": "cli.nome", "width": "32%", "searchable": true, "sortable": true },
            { "data": 2, "name": "cli.telefone", "width": "12%", "searchable": true, "sortable": true },
            { "data": 3, "name": "cli.email", "width": "20%", "searchable": true, "sortable": true },
            { "data": 4, "name": "cpfp.origem_conciliacao", "width": "15%", "searchable": true, "sortable": true },
            { "data": 5, "name": "fun.nome", "width": "25%", "searchable": true, "sortable": true },
            { "data": 6, "name": "valor", "width": "10%", "searchable": false, "sortable": false },
            { "data": 7, "name": "ver", "width": "2%", "searchable": false, "sortable": false },
            { "data": 8, "name": "conciliar", "width": "2%", "searchable": false, "sortable": false }
        ],
        "fnDrawCallback": function(oSettings) { 

            // Ativação de TOOLTIPS, se existirem
            $('[data-toggle="tooltip"]').tooltip();

        } 
    });

});
</script>

@stop
