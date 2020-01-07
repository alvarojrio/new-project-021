@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Bloqueios e Feriados
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('bloqueiosferiados') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Bloqueios / Feriados</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        
                <div class="x_panel">
                    
                    <div class="x_content">

                        <!-- INICIO LINHA -->
                        <div class="row">

                            <!-- Espaço para exibição de erros de validação -->
                            <div id="avisoValidacao">
                                
                                <div class="col-xs-12">
                                    <div class="alert alert-danger msg_erro" style="display: none;"></div>
                                </div>
                                
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row" style="margin-bottom: 10px;">
                    
                            <!-- Coluna -->
                            <div class="col-md-3 col-xs-12">

                                <a class="btn btn-block btn-info" href="<?php echo url('admin/painel/bloqueiosferiados/cadastrar-bloqueio'); ?>">
                                    <i class="fa fa-plus"></i> Cadastrar Bloqueio
                                </a>

                            </div>
                            <!-- Fim coluna -->
                    
                            <!-- Coluna -->
                            <div class="col-md-3 col-xs-12">

                                <a class="btn btn-block btn-success" href="<?php echo url('admin/painel/bloqueiosferiados/cadastrar-feriado'); ?>">
                                    <i class="fa fa-plus"></i> Cadastrar Feriado
                                </a>

                            </div>
                            <!-- Fim Coluna -->
                   
                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="col-xs-12">

                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="<?php if(!$_GET['aba']){echo "active"; } ?>"><a data-toggle="tab" href="#aba_bloqueios" id="tab_bloqueios" value="bloqueios">Bloqueios</a></li>                          
                                    <li class="<?php if($_GET['aba']){echo "active"; } ?>"><a data-toggle="tab" href="#aba_feriados" id="tab_feriados" value="feriados">Feriados</a></li>
                                </ul>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">

                            <!-- INICIO COLUNA -->
                            <div class="col-xs-12">

                                <!-- INICIO CONTEUDO DAS ABAS -->
                                <div class="tab-content tab_content_customizado">

                                    <!-- ###### INICIO ABA BLOQUEIO ############################# -->
                                    <div id="aba_bloqueios" class="tab-pane fade <?php if(!$_GET['aba']){echo "in active"; } ?>">

                                        <!-- INICIO PANEL RESULTADO DA BUSCA DE BLOQUEIOS -->
                                        <div class="panel panel-info panel-resultado-busca-bloqueios">
                                                              
                                            <div class="panel-heading">Resultado da Busca de Bloqueios</div>
                                                   
                                            <div class="panel-body">

                                                    <!-- INICIO DIV.TABLE-RESPONSIVE -->
                                                    <div class="table-responsive"> 

                                                        <table class='table table-striped table-hover table-bordered' id='tabela_bloqueios'>
                                                            <thead>
                                                                <tr>
                                                                   <th>Tipo</th>
                                                                    <th>Descrição</th>
                                                                    <th>Período</th>
                                                                    <th>Unidades</th>
                                                                    <th>Especialidade</th>
                                                                    <th>Turno</th>
                                                                    <th>Médico</th>
                                                                    <th class="text-center">&nbsp;</th>
                                                                    <th class="text-center">&nbsp;</th>
                                                                    <th class="text-center">&nbsp;</th>
                                                                </tr>
                                                            </thead>   
                                                        </table>                                                                

                                                    </div>
                                                    <!-- FIM DIV.TABLE-RESPONSIVE -->

                                            </div>
                                            
                                        </div>
                                        <!-- FIM PANEL RESULTADO DA BUSCA -->                                   

                                    </div>
                                    <!-- ###### FIM ABA BLOQUEIO ############################# -->


                                    <!-- ###### INICIO ABA FERIADO ############################# -->
                                    <div id="aba_feriados" class="tab-pane fade <?php if($_GET['aba']){echo "in active"; } ?>">

                                        <!-- INICIO PANEL RESULTADO DA BUSCA DE FERIADOS -->
                                        <div class="panel panel-success panel-resultado-busca-feriados">
                                                                  
                                            <div class="panel-heading">Resultado da Busca de Feriados</div>
                                                  
                                                <div class="panel-body">

                                                        <!-- INICIO DIV.TABLE-RESPONSIVE -->
                                                        <div class="table-responsive"> 

                                                            <table class='table table-striped table-hover table-bordered' id='tabela_feriados'>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Tipo</th>
                                                                        <th>Descrição</th>
                                                                        <th>Unidades</th>
                                                                        <th>Data</th>
                                                                        <th>&nbsp;</th>
                                                                        <th>&nbsp;</th>
                                                                        <th>&nbsp;</th>
                                                                    </tr>
                                                                </thead>   
                                                            </table>                                                                

                                                        </div>
                                                        <!-- FIM DIV.TABLE-RESPONSIVE -->

                                                </div>
                                            
                                        </div>
                                        <!-- FIM PANEL RESULTADO DA BUSCA -->

                                    </div>
                                    <!-- ###### FIM ABA FERIADO ############################# -->

                                </div>
                                <!-- FIM CONTEUDO DAS ABAS -->

                            </div>
                            <!-- FIM COLUNA -->

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                    
                    
        </div>
            
            
    </div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">    
$.ajaxSetup ({cache: false});

//var tabela_feriados = null;
//var tabela_bloqueios = null;

$(document).ready(function() {
    <?php 
    if($_GET['aba']){
      $url = url('admin/painel/bloqueiosferiados/buscar-feriados');
    } else {
      $url = url('admin/painel/bloqueiosferiados/buscar-bloqueios');
    }
    ?>

    // BUSCA LISTA DE BLOQUEIOS COMO PADRÃO ---------------------------------
    // Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: "<?php echo $url ?>",
        data: { 
            //"variavel": variavel
        },
        beforeSend: function() { 
            // Executa antes do envio
        },
        success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo retorno
            if (response.status == 'erro') {

                // Faz algo                

            } else if (response.status == 'sucesso') {

                // Se resposta for feriado, formato as variveis para feriados
                if (response.resp == "feriados") {

                    tabela_feriados = $('#tabela_feriados').DataTable({
                        destroy: true, // Apaga datatable atual, se existir
                        data: response.dados,                                        
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
                        order: [[ 1, "asc" ]],
                        columns: [
                            { "data": "tipo", "name": "tipo", "width": "5%", "searchable": true, "sortable": true },
                            { "data": "descricao", "name": "descricao", "width": "17%", "searchable": true, "sortable": true },
                            { "data": "unidades", "name": "unidades", "width": "64%", "searchable": true, "sortable": true },
                            { "data": "data", "name": "data", "width": "5%", "searchable": true, "sortable": true },          
                            { "data": "btn_ver", "name": "btn_ver", "width": "3%", "searchable": false, "sortable": false },
                            { "data": "btn_editar", "name": "btn_editar", "width": "3%", "searchable": false, "sortable": false },
                            { "data": "btn_inativar", "name": "btn_inativar", "width": "3%", "searchable": false, "sortable": false }
                        ],
                        "fnDrawCallback": function(oSettings) { 

                            // Ativação de TOOLTIPS, se existirem
                            $('[data-toggle="tooltip"]').tooltip();

                        } 
                    });                     
           
                } else if(response.resp == "bloqueios") { // Se resposta for bloqueios, formato as variveis para bloqueios
                    
                   tabela_bloqueios = $('#tabela_bloqueios').DataTable({
                        destroy: true, // Apaga datatable atual, se existir
                        data: response.dados,                                        
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
                        order: [[ 1, "asc" ]],
                        columns: [
                            { "data": "tipo", "name": "tipo", "width": "3%", "searchable": true, "sortable": true },
                            { "data": "descricao", "name": "descricao", "width": "10%", "searchable": true, "sortable": true },
                            { "data": "periodo", "name": "periodo", "width": "10%", "searchable": true, "sortable": true },
                            { "data": "unidades", "name": "unidades", "width": "26%", "searchable": true, "sortable": true },          
                            { "data": "especialidade", "name": "especialidade", "width": "17%", "searchable": true, "sortable": true },          
                            { "data": "turno", "name": "turno", "width": "10%", "searchable": true, "sortable": true },          
                            { "data": "medico", "name": "medico", "width": "15%", "searchable": true, "sortable": true },          
                            { "data": "btn_ver", "name": "btn_ver", "width": "3%", "searchable": false, "sortable": false },
                            { "data": "btn_editar", "name": "btn_editar", "width": "3%", "searchable": false, "sortable": false },
                            { "data": "btn_inativar", "name": "btn_inativar", "width": "3%", "searchable": false, "sortable": false }
                        ],
                        "fnDrawCallback": function(oSettings) { 

                            // Ativação de TOOLTIPS, se existirem
                            $('[data-toggle="tooltip"]').tooltip();

                        } 
                    });                        

                }

            }

        },
        complete: function(response) {
            // Executa ao completar envio
        },
        error: function(response, thrownError) {
            // Faz algo se der erro
        }
    });
    // FIM DA REQUISIÇÃO AJAX 

    
    /*** EVENTO BUSCAR FERIADOS OU BLOQUEIOS ********************************/
    $("#tab_bloqueios, #tab_feriados").on('click', function(){
         
         
            // Pegar o href do elemento clicado
            var buscar = $(this).attr('href').slice(1);
            
            if(buscar == "aba_feriados"){
        
               var url = "<?php echo url('admin/painel/bloqueiosferiados/buscar-feriados'); ?>";
                
            } else if (buscar == "aba_bloqueios"){
             
               var url = "<?php echo url('admin/painel/bloqueiosferiados/buscar-bloqueios'); ?>";
                
            }

            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: url,
                data: { 
                    //"variavel": variavel
                },
                beforeSend: function() { 

                    // Executa antes do envio

                },
                success: function(response) {

                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);
                    
                    // Checo retorno
                    if (response.status == 'erro') {

                        // Faz algo                

                    } else if (response.status == 'sucesso') {
                    
                        // Se resposta for feriado, formato as variveis para feriados
                        if(response.resp == "feriados"){
                            
                            // PAGINAÇÃO TABELA ........................................
                            tabela_feriados = $('#tabela_feriados').DataTable({
                                destroy: true, // Apaga datatable atual, se existir
                                data: response.dados,                                        
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
                                order: [[ 1, "asc" ]],
                                columns: [
                                    { "data": "tipo", "name": "tipo", "width": "3%", "searchable": true, "sortable": true },
                                    { "data": "descricao", "name": "descricao", "width": "24%", "searchable": true, "sortable": true },
                                    { "data": "unidades", "name": "unidades", "width": "40%", "searchable": true, "sortable": true },
                                    { "data": "data", "name": "data", "width": "19%", "searchable": true, "sortable": true },          
                                    { "data": "btn_ver", "name": "btn_ver", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_editar", "name": "btn_editar", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_inativar", "name": "btn_inativar", "width": "3%", "searchable": false, "sortable": false }
                                ],
                                "fnDrawCallback": function(oSettings) { 

                                    // Ativação de TOOLTIPS, se existirem
                                    $('[data-toggle="tooltip"]').tooltip();

                                }
                            });                           
                            
                        } else if(response.resp == "bloqueios") { // Se resposta for bloqueios, formato as variveis para bloqueios
                           
                            tabela_bloqueios = $('#tabela_bloqueios').DataTable({
                            destroy: true, // Apaga datatable atual, se existir
                            data: response.dados,                                        
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
                            order: [[ 1, "asc" ]],
                            columns: [
                                { "data": "tipo", "name": "tipo", "width": "3%", "searchable": true, "sortable": true },
                                { "data": "descricao", "name": "descricao", "width": "10%", "searchable": true, "sortable": true },
                                { "data": "periodo", "name": "periodo", "width": "10%", "searchable": true, "sortable": true },
                                { "data": "unidades", "name": "unidades", "width": "26%", "searchable": true, "sortable": true },          
                                { "data": "especialidade", "name": "especialidade", "width": "17%", "searchable": true, "sortable": true },          
                                { "data": "turno", "name": "turno", "width": "10%", "searchable": true, "sortable": true },          
                                { "data": "medico", "name": "medico", "width": "15%", "searchable": true, "sortable": true },          
                                { "data": "btn_ver", "name": "btn_ver", "width": "3%", "searchable": false, "sortable": false },
                                { "data": "btn_editar", "name": "btn_editar", "width": "3%", "searchable": false, "sortable": false },
                                { "data": "btn_inativar", "name": "btn_inativar", "width": "3%", "searchable": false, "sortable": false }
                                ],
                            "fnDrawCallback": function(oSettings) { 

                                // Ativação de TOOLTIPS, se existirem
                                $('[data-toggle="tooltip"]').tooltip();

                            } 
                            });    
                           
                           
                        }
                
                    }
                    
                   
                },
                complete: function(response) {

                    // Executa ao completar envio

                },
                error: function(response, thrownError) {

                    // Faz algo se der erro

                }
            });
            // FIM DA REQUISIÇÃO AJAX 
            
  });

});
</script>

@stop
