@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categorias | Visualizar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('categorias-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Categoria</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <div class="row">

                    <div class="col-md-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados Gerais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:200px">Descrição: </th>
                                    <td><span class="text-primary">{{ $categorias->descricao }}</span></td>
                                </tr>
                                <tr>
                                    <th style="width:200px">Data de Criação: </th>
                                    <td>{{ date('d/m/Y', strtotime($categorias->data_criacao)) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-xs-12">
                        <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right">Voltar</a>
                    </div>

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
    if (response.status == 1){
    toastr.success(response.mensagem, "Sucesso!");
    $("table").find("[data-row-id='" + response.cod + "']").remove();
    $("#modal_deletar").modal('hide');
    } else{
    console.log(response);
    toastr.error(response.mensagem, "Erro!");
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
            },
    }
    });
</script>
@stop