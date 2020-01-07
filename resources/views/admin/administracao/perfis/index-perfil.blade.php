@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Perfis de Usuário
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('perfis') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Perfis de Usuário</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <a class="btn btn-primary" href="<?php echo url('admin/painel/perfis/cadastrar-perfil'); ?>"><i class="fa fa-plus"></i> Cadastrar Novo Perfil</a> 

                <br /><br />

                <div class="clearfix"></div>

                <h2>Lista de Perfis Ativos</h2>

                <!-- INICIO DIV.TABLE-RESPONSIVE -->
                <div class="table-responsive">

                    <table class="minha_datatable table table-striped table-hover table-bordered tabela">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                    </table>

                </div>
                <!-- FIM DIV.TABLE-RESPONSIVE -->

<!--                <br />

                <a class="btn btn-sm btn-danger" href="<?php //echo url('admin/painel/perfis/inativos'); ?>"><i class="fas fa-list-ul"></i> Listagem Inativos</a> -->

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
    $.ajaxSetup({cache: false});

    $(document).ready(function () {

        // Tabela de dados
        var tabela = $('.minha_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?php echo url('admin/painel/perfis/datatable-perfis-ativos'); ?>",
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
                "search": "Buscar:",
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
            order: [[1, "asc"]],
            columns: [
                {"data": 0, "name": "display_name", "width": "10%", "searchable": true, "sortable": true},
                {"data": 1, "name": "description", "width": "45%", "searchable": true, "sortable": true},
                {"data": 2, "name": "ver", "width": "2%", "searchable": false, "sortable": false},
                {"data": 3, "name": "editar", "width": "2%", "searchable": false, "sortable": false},
                {"data": 4, "name": "inativar", "width": "2%", "searchable": false, "sortable": false}
            ],
            "fnDrawCallback": function (oSettings) {

                // Ativação de TOOLTIPS, se existirem
                $('[data-toggle="tooltip"]').tooltip();

            }
        });

    });
</script>

@stop
