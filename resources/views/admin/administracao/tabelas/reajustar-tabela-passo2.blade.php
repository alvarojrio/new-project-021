@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Reajustar
@stop

@section('includes_no_head')

<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-reajustar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Reajustar Tabela - Passo 2</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- INICIO DIV DE ERROS DE VALIDAÇÃO -->
                    <div id="avisoValidacao">
                        @if (count($errors) > 0)
                        <div class="col-xs-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div> 
                    <!-- FIM DIV DE ERROS DE VALIDAÇÃO -->  
                    
                </div>
                <!-- FIM LINHA -->



                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_amarelo">

                            <h4 style="margin-top: 0px;">Instruções</h4>
                            
                            - Este formulário permite que você complemente os valores do reajuste dos procedimentos, finalizando a programação deles dentro do sistema.

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-sm-6 col-xs-12" style="margin-top: 9px; margin-bottom: 9px;">
                        
                        <h4>Reajustando valores da tabela: <b><?php echo $tabela->nome_tabela; ?></b></h4>

                    </div>

                </div>
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">  

                        <h2>Lista de Procedimentos Ativos</h2>

                        <!-- INICIO DIV.TABLE-RESPONSIVE -->
                        <div class="table-responsive">
                                
                            <table class="minha_datatable table table-striped table-hover table-bordered tabela">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Custo R$</th>
                                <th>Venda R$</th>
                                <th>Data de Inicio</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td>Código</td>
                                <td>Descrição</td>
                                <td>Custo R$</td>
                                <td>Venda R$</td>
                                <td>Data de Inicio</td>
                                <td>&nbsp;</td>
                            </tr>
                            </tfoot>
                            </table>

                        </div>
                        <!-- FIM DIV.TABLE-RESPONSIVE -->
 
                    </div>

                </div>
                <!-- FIM LINHA -->



                <br /><br />



                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-xs-12">
                        
                        <a class="btn btn-md btn-info" href="<?php echo url('admin/painel/tabelas/visualizar-tabela/' . Crypt::encrypt($tabela->cod_tabela)); ?>">
                            <i class="fa fa-bars"></i> VISUALIZAR TABELA ATUALIZADA
                        </a>

                    </div>

                </div>
                <!-- FIM LINHA -->

                
                 
                </div>
            </div>
        </div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Capto o código (criptografado) da tabela que estará sendo trabalhada
    var cod_tabela_criptografado = '<?php echo $codigo_tabela_criptografado; ?>'; 

    // Tabela de dados
    var tabela = $('.minha_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "<?php echo url('admin/painel/tabelas/datatable-tabelas-procedimentos-reajuste'); ?>",
            "type": "POST",
            "data": {
                "cod_tabela_criptografado": cod_tabela_criptografado
            }
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
            "emptyTable": "Todos os valores foram reajustados",
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
        order: [[ 1, "asc" ]],
        columns: [
            { "data": 0, "name": "codigo", "width": "10%", "searchable": true, "sortable": true },
            { "data": 1, "name": "descricao", "width": "35%", "searchable": true, "sortable": true },            
            { "data": 2, "name": "custo", "width": "10%", "searchable": false, "sortable": false },
            { "data": 3, "name": "venda", "width": "10%", "searchable": false, "sortable": false },
            { "data": 4, "name": "data_inicio", "width": "12%", "searchable": false, "sortable": false },
            { "data": 5, "name": "editar", "width": "9%", "searchable": false, "sortable": false }
        ],
        "fnDrawCallback": function(oSettings) { 

            // Ativação de TOOLTIPS, se existirem
            $('[data-toggle="tooltip"]').tooltip();

        } 
    });



    // Aplicando função no botão EDITAR
    $(document).on('click', '.btn_editar', function() {

        // Capto a linha mais próxima do botão
        var $row = $(this).closest('tr');

        // Capto as células (TD) da linha
        var $tds = $row.find('td');

        // Faço loop pelas células (TDs) da linha
        $.each($tds, function(i, el) {

            // Checa se o loop está na coluna VENDA
            if (i == 3) { 

                // Capto o texto atual dentro da célula, se houver
                var txt = $(this).text();

                // Limpo a célula
                $(this).html('');

                // Adiciono o novo input
                $(this).append('<input type="text" class="form-control" id="valor_venda" name="valor_venda" value="' + txt + '" placeholder="R$ 00,00" autocomplete="off" style="width: 100%;">');

            } else if (i == 5) { // Caso seja a coluna do botão editar

                // Limpa célula
                $(this).html('');

                // Adiciono botão CANCELAR
                $(this).append('<a class="btn btn-sm btn-danger btn_cancelar" href="javascript:void(null);"><i class="fa fa-times-circle"></i></a>');

                // Adiciono botão SALVAR
                $(this).append('<a class="btn btn-sm btn-success btn_salvar" href="javascript:void(null);"><i class="fa fa-save"></i></a>');

            }

        }); // Fecha loop

        // Ativa máscara de dinheiro em campos
        $('#valor_venda').maskMoney();

    });



    // Aplicando função no botão CANCELAR EDIÇÃO
    $(document).on('click', '.btn_cancelar', function() {

        // Capto a linha mais próxima do botão
        var $row = $(this).closest('tr');

        // Capto as células (TD) da linha
        var $tds = $row.find('td');

        // Variaveis para guardar valores dos inputs e códigos
        var cod_procedimento = $row.find('input#cod_procedimento').val();
        var cod_historico_procedimento = $row.find('input#cod_historico_procedimento').val();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/procedimentos/buscar-reajuste-procedimento-ajax'); ?>",
            data: { 
                "cod_procedimento": cod_procedimento,
                "cod_historico_procedimento": cod_historico_procedimento
            },
            beforeSend: function() { 
                // Resetando todos os possiveis Toast
                $.toast().reset('all');
            },
            success: function(response) {
               
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Faço loop pelas células (TDs) da linha
                    $.each($tds, function(i, el) {

                        // Checa se o loop está na coluna VENDA
                        if (i == 3) {

                            // Limpa célula
                            $(this).html('');

                        } else if (i == 5) { // Caso seja a coluna do botão editar

                            // Limpa célula
                            $(this).html('');

                        }

                    }); // Fecha loop

                } else if (response.status == 'sucesso') {

                    // Faço loop pelas células (TDs) da linha
                    $.each($tds, function(i, el) {

                        // Checa se o loop está na coluna VENDA
                        if (i == 3) {

                            // Preenche célula com novo valor
                            $(this).html(response.dados.valor_venda);

                        } else if (i == 5) { // Caso seja a coluna do botão editar

                            // Limpa célula
                            $(this).html('');

                            // Adiciono botão EDITAR
                            $(this).append('<a class="btn btn-sm btn-info btn_editar" href="javascript:void(null);"><i class="fa fa-edit"></i></a>');

                        }

                    }); // Fecha loop

                }                

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {
                // Nothing here
            }
        }); 

    });



    // Aplicando função no botão SALVAR EDIÇÃO
    $(document).on('click', '.btn_salvar', function() {

        // Capto a linha mais próxima do botão
        var $row = $(this).closest('tr');

        // Capto as células (TD) da linha
        var $tds = $row.find('td');

        // Variaveis para guardar valores dos inputs e códigos
        var cod_procedimento = '';
        var cod_historico_procedimento = '';
        var valor_venda = '';

        // Faço loop pelas células (TDs) da linha
        $.each($tds, function(i, el) {

            // Checa se o loop está na primeira coluna
            if (i == 0) {

                // Defino o valor das variaveis 'cod_procedimento' e 'cod_historico_procedimento'
                cod_procedimento = $(this).find('input#cod_procedimento').val();
                cod_historico_procedimento = $(this).find('input#cod_historico_procedimento').val();

            } else if (i == 3) { // Caso seja a coluna VENDA

                // Defino valor de variavel 'valor_venda'
                valor_venda = $(this).find('input').val();

            } 

        }); // Fecha loop

        // Variavel do Toast da mensagem 'processando...'
        var toast_processando = '';

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/procedimentos/salvar-reajuste-procedimento'); ?>",
            data: { 
                "cod_procedimento": cod_procedimento,
                "cod_historico_procedimento": cod_historico_procedimento,
                "valor_venda": valor_venda
            },
            beforeSend: function() { 
                // Resetando todos os possiveis Toast
                $.toast().reset('all');

                // Mostra mensagem 'processando...'
                /*toast_processando = $.toast({
                    text: 'Processando...',
                    showHideTransition: 'fade',
                    position: 'top-right',
                    hideAfter: false,
                    allowToastClose: false
                });*/
            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                } else if (response.status == 'sucesso') {

                    // Removo linha da tabela, após concluído o reajuste
                    tabela.row( $(this).parents('tr') ).remove().draw();

                    // Checo se a tabela está vazia (se todas as linhas de dados foram removidas)
                    if (!tabela.data().any()) {

                        // Reseta a Datatable para estado original
                        tabela.ajax.reload();

                    }

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Reajuste finalizado com sucesso.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true
                    });

                }

            },
            complete: function(response) {
                // Oculta mensagem 'processando...'
                //toast_processando.reset();
            },
            error: function(response, thrownError) {

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Falha na comunicação com a base de dados.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: false,
                    allowToastClose: true
                });

            }
        });

    });

});           
</script>

@stop