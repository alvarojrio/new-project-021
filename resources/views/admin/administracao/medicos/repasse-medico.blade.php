@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Médicos | Repasse
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link href="{{ asset('plugins/fullcalendar-3.9/css/fullcalendar_customizado.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('medicos-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Repasse do Médico</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- INICIO LINHA -->
                <div class="row">
        
                    
                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            
                            
                            <div class="panel panel-default">
                                
                                
                                <div class="panel-heading"><i class="fas fa-user-md"></i> Dados do repasse</div>
                                
                                
                                <!-- INICIO PANEL-BODY -->
                                <div class="panel-body">
                                    
                                    <!-- INICIO LINHA -->
                                    <div class="row">
                                        
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            
                                            
                                            <div class="form-group">
                                                
                                                
                                                <!-- INICIO LINHA -->
                                                <div class="row">
                                             
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                      
                                                        <h2>Médico: <?php echo $medico->pessoa->nome ?></h2>
                                                        <input type="hidden" name="cod_medico" id="cod_medico" value="<?php echo $medico->cod_medico; ?>" />
                                                       
                                                    </div>
                                                 
                                                </div>
                                                <!-- FIM LINHA -->
                                                
                                                
                                                <!-- INICIO LINHA -->
                                                <div class="row">

                                                   
                                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Tabela <span class="required-red">*</span></label>
                                                                <select class="form-control" name="cod_tabela" id="cod_tabela">
                                                                    <option value="">Selecione</option>
                                                                    <?php 
                                                                    
                                                                    foreach($tabelas as $tabela): ?>
                                                                    
                                                                    <option value="<?php echo $tabela->cod_tabela; ?>"><?php echo $tabela->nome_tabela; ?></option>
                                                                    
                                                                    <?php
                                                                    endforeach;
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                    
                                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Categoria</label>
                                                                <select class="form-control" name="_cod_categoria" id="cod_categoria" disabled="disabled">
                                                                   
                                                                    <option value="">Selecione</option>
                                                                    <option value="0">Todos</option>
                                                                    <?php 
                                                                    
                                                                    foreach($categorias as $categoria): ?>
                                                                    
                                                                    <option value="<?php echo $categoria->cod_categoria; ?>"><?php echo $categoria->descricao; ?></option>
                                                                    
                                                                    <?php
                                                                    endforeach;
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                              
                                                        
                                                </div> 
                                                <!-- FIM LINHA -->
                                                
                                                                       
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    <!-- FIM LINHA -->
                                    
                                   
                                    <!-- INICIO LINHA -->
                                    <div class="row">
                                        
                                        <!-- INICIO DATA-TABLE -->
                                        <div tabindex="-1" role="dialog">
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    

                                                <div class="clearfix"></div>

                                                <div class="table-responsive" id="data-table">

                                                    <!-- TABLE ALIMENTADA VIA JQUERY -->

                                                </div>

                                            </div>
                                            
                                        </div>    
                                        <!-- FIM DATA-TABLE -->
                                    </div>
                                    <!-- FIM LINHA -->
                                    
                                    
                                </div>
                                <!-- FIM PANEL BODY -->
                              
                                
                            </div>
                            
                            
                        </div>
                       
                    
                </div>
                <!-- FIM LINHA -->
                
            </div> 
        </div> 
    </div> 
</div>  

<!-- INICIO JANELA MODAL PARA CADASTRAR UM EVENTO (REPASSE) -->
<div class="modal fade" id="modal_cadastrar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- INICIO MODAL HEADER --> 
            <div class="modal-header">
      
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
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <h4 class="modal-title"><i class="fa fa-dollar-sign"></i> Cadastrar repasse</h4>
                    </div>    
            
                </div>    
                           
                <!-- FIM LINHA -->
                
                
                
            
            </div>    
            <!-- FIM MODAL HEADER -->    
            
            
            <!-- INICIO MODAL BODY -->        
            <div class="modal-body">
                
                <!-- PREENCHIMENTO VIA APPEND --> 
                
            </div>    
            <!-- FIM MODAL BODY --> 
            
            <!-- INICIO DO MODAL FOOTER -->
            <div class="modal-footer">
                
                <button type="button" class="btn btn-sm btn-default close_modal" data-dismiss="modal"> Fechar </button>
                <button type="button" id="btn_salvar_dinamico" class="btn btn-sm btn-success"><i class="far fa-save"></i> Salvar </button>
                
            </div>
            <!-- FIM DO MODAL FOOTER -->
            
        </div>
    </div>
</div> 
<!-- FIM DO MODAL CADASTRAR -->

<!-- INICIO JANELA MODAL PARA ALTERAR UM EVENTO (REPASSE) -->
<div class="modal fade" id="modal_alterar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- INICIO MODAL HEADER --> 
            <div class="modal-header">
      
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
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <h4 class="modal-title"><i class="fa fa-dollar-sign"></i> Reajustar repasse</h4>
                    </div>    
            
                </div>    
                           
                <!-- FIM LINHA -->
                
                
                
            
            </div>    
            <!-- FIM MODAL HEADER -->    
            
            
            <!-- INICIO MODAL BODY -->        
            <div class="modal-body">
                
                <!-- PREENCHIMENTO VIA APPEND --> 
                
            </div>    
            <!-- FIM MODAL BODY --> 
            
            <!-- INICIO DO MODAL FOOTER -->
            <div class="modal-footer">
                
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> Fechar </button>
                <button type="button" id="btn_reajustar_dinamico" class="btn btn-sm btn-success"><i class="far fa-save"></i> Salvar </button>
                
            </div>
            <!-- FIM DO MODAL FOOTER -->
            
        </div>
    </div>
</div> 
<!-- FIM DO MODAL ALTERAR -->

<!-- INICIO JANELA MODAL PARA VISUALIZAR UM EVENTO (REPASSE) -->
<div class="modal fade" id="modal_visualizar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- INICIO MODAL HEADER --> 
            <div class="modal-header">
      
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
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <h4 class="modal-title"><i class="fa fa-dollar-sign"></i> Visualizar repasse</h4>
                    </div>    
            
                </div>    
                           
                <!-- FIM LINHA -->
                
                
                
            
            </div>    
            <!-- FIM MODAL HEADER -->    
            
            
            <!-- INICIO MODAL BODY -->        
            <div class="modal-body">
                
                <!-- PREENCHIMENTO VIA APPEND --> 
                
            </div>    
            <!-- FIM MODAL BODY --> 
            
            <!-- INICIO DO MODAL FOOTER -->
            <div class="modal-footer">
                
                <button type="button" class="btn btn-sm btn-default close_modal" data-dismiss="modal"> Fechar </button>
                
            </div>
            <!-- FIM DO MODAL FOOTER -->
            
        </div>
    </div>
</div> 
<!-- FIM DO MODAL VISUALIZAR -->        

@stop

@section('includes_no_body')

<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>
<script type="text/javascript" src="{{ asset('js/data_atual.js') }}"></script>
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script src="{{ asset('plugins/fullcalendar-3.9/js/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-3.9/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-3.9/locale/pt-br.js') }}"></script>


<script type="text/javascript">

    $(".select2_multiple").select2({
      placeholder: "Selecione",
      allowClear: true
    });
 
    $(document).ready(function() {   
 
  
        // INICIO BLOCO 1 -----------------------------------------------------
        // Faço a busca dos procedimento de acordo com filtro informado
        $("#cod_tabela, #cod_categoria, button" ).on("change", function(){
            
           
            // LIMPANDO DATA-TABLE --------------------------------------------
            $("#data-table").html('');
            
            var cod_tabela = $("#cod_tabela").val();
            var cod_categoria = $("#cod_categoria").val();            
            var cod_medico = $("#cod_medico").val();            
            
            if(cod_categoria.length == 0){
                cod_categoria = 0;
            }
            
            if(cod_tabela.length == 0){
                // Desabita o campo
                $("#cod_categoria").prop('disabled', true);
                return false;
            }
            
            // habilitando o campo
            $("#cod_categoria").prop('disabled', false);
            
            // BUSCAR DADOS VIA AJAX ------------------------------------------
            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/medicos/buscar-procedimentos-para-repasse-medico'); ?>",
                data: { 
                    "cod_medico": cod_medico,
                    "cod_tabela": cod_tabela,
                    "cod_categoria": cod_categoria
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
                        alert(response.error);

                    } else if (response.status == 'sucesso') {
                       
                        var data_table = response.data_table;
                        var total_unidades = response.total_unidades;
                        var cod_unidades = response.cod_unidades;
                        var nome_unidades = response.nome_unidades;
                        var descricao_procedimento = response.descricao_procedimento;
                        
                        // Separando as unidades por (|)
                        var nome_unidade = nome_unidades.split("|");
                        var cod_unidade = cod_unidades.split("|");
                        
                        
                        
                        // INSERINDO A DATA TABLE DINAMICAMENTE ---------------
                        $("#data-table").append(data_table);

                        // CRIA A PAGINAÇÃO E BUSCA ----------------------------
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
                        // FIM DA PAGINAÇÃO E BUSCA ---------------------------
                        
                        // CHAMA O MODAL CADASTRAR UM EVENTO (REPASSE) ---------
                        $('.btn_modal_cadastrar').on('click', function(){
                            
                            // Campos que irão popular o modal dinamicamente
                            var cod_medico = $("#cod_medico").val();
                            
                            var cod_procedimento = $(this).parent().prev().prev().prev().prev().prev();
                            cod_procedimento = $(cod_procedimento).text();
                            
                            
                            // Requisição ajax
                            $.ajax({
                                cache: false,
                                type: "POST",
                                url: "<?php echo url('admin/painel/medicos/criar-repasse-medico-ajax'); ?>",
                                data: { 
                                    "cod_medico": cod_medico,
                                    "cod_procedimento": cod_procedimento
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
                                        alert(response.msg);              

                                    } else if (response.status == 'sucesso') {
                                        
                                        // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                        var array_unidade_sem_repasses = response.array_unidade_sem_repasses;
                                        var total_unidade_sem_repasse = response.total_unidade_sem_repasse;
                                        
                                        
                                 
                                        // Limpo o modal
                                        $('#modal_cadastrar .modal-body').html("");
                                        
                                        // Inicializo a variavel
                                        var modal = "";
                                        
                                        // passando o total de repasses que pode ser reajustado    
                                        modal +=    "<input type='hidden' name=total_repasse_cadastrar id='total_repasse_cadastrar' value = '"+total_unidade_sem_repasse+"' />"
                                            
                                        
                                        // Rodo o total de repassses que veio do controller
                                        for(i = 0; i < total_unidade_sem_repasse; i++){
                                            
                                            // armazeno o vetor[i] na variavel resultado
                                            var resultado = array_unidade_sem_repasses[i];
                                     
                                            // Separo o vetor por possição
                                            var resultado = resultado.split("|");
                                            
                                            // recebo o valor do vetor[i] na possição 0
                                            var cod_unidade = resultado[0];
                                            
                                            // recebo o valor do vetor[i] na possição 1
                                            var nome_unidade = resultado[1];
                                            
                                            // recebo o valor do vetor[i] na possição 2
                                            var cod_medico = resultado[2];
                                            
                                            // recebo o valor do vetor[i] na possição 3
                                            var cod_procedimento = resultado[3];
                                            
                                            // recebo o valor do vetor[i] na possição 4
                                            var decricao_procedimento = resultado[4];
                                            
                                           
                                            modal += "<div class='panel panel-primary'>";
                                  
                                            modal +=    "<div class='panel-heading'>";
                                            modal +=         "Dados do repasse";
                                            modal +=    "</div>";
                                            
                                            modal +=    "<input type='hidden' readonly='readonly' id='cod_medico_cadastrar' name='cod_medico_cadastrar' value='"+cod_medico+"' />";
                                            modal +=    "<input type='hidden' readonly='readonly' id='cod_procedimento_cadastrar' name='cod_procedimento_cadastrar' value='"+cod_procedimento+"' />";
                                            modal +=    "<input type='hidden' readonly='readonly' id='cod_unidade_cadastrar"+i+"' name='cod_unidade_cadastrar"+i+"' value='"+cod_unidade+"' />";
                                            
                                            modal +=    "<div class='panel-body'>";

                                            modal +=        "<div class='form-group'>";
                                            modal +=            "<label for='unidade'>Unidade </label>";
                                            modal +=            "<input type='text' readonly='readonly' class='form-control' id='nome_unidade_cadastrar' name='nome_unidade_cadastrar' value='"+nome_unidade+"' />";
                                            modal +=        "</div>";

                                            modal +=        "<div class='form-group'>";
                                            modal +=            "<label for='procedimento'>Procedimento </label>";
                                            modal +=            "<input type='text' readonly='readonly' class='form-control' id='descricao_procedimento_cadastrar' name='descricao_procedimento_cadastrar' value='"+decricao_procedimento+"' />";
                                            modal +=        "</div>";
                                            
                                            modal +=        "<div class='form-group'>";
                                                                         
                                            modal +=            "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_cadastrar"+i+"' name='tipo_valor_repasse_cadastrar"+i+"' id='tipo_valor_repasse_cadastrar"+i+"' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_cadastrar"+i+"' name='tipo_valor_repasse_cadastrar"+i+"' id='tipo_valor_repasse_cadastrar"+i+"' value='2'> Percentual (%)</label>";
                                                                
                                            modal +=        "</div>";
                                            
                                            modal +=        "<div class='form-group'>";
                                                                         
                                            modal +=            "<input type='text' class='form-control dinheiro' name='valor_repasse_cadastrar"+i+"' id='valor_repasse_cadastrar"+i+"' />";                    
                                                                
                                            modal +=        "</div>";                    

                                            modal +=    "</div>";

                                            modal += "</div>";

                                           
                                        }
                                        
                                        $('#modal_cadastrar .modal-body').append(modal);
                                        $('#modal_cadastrar').modal('show');
                                        // Mascaras em todos os campos R$ 
                                        $('.dinheiro').maskMoney();
                                        
                                        
                                        
                                        // Habilitar caixa da unidade
                                        $(".btn_reajustar").on('click', function(){
                                            
                                            // Habilito a os campos de acordo com o checkbox clicado */
                                            var i  = $(this).val();
                                
                                            if($("input[name='btn_reajustar"+i+"']:checked").length > 0){
                                               $(".tipo_valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                               $("#valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                               $("#data_inicio_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                            }else{
                                               $(".tipo_valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                               $("#valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                               $("#data_inicio_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                            }
                                
                                        });
                                        
                                        
                                        
                                        
                                        // Mascaras em todos os campos R$ 
                                        $('.dinheiro').maskMoney();
                                        
                                        // Mascaras em todos os campos data
                                        $(".data_inicio").datepicker({
                                            autoclose: true,
                                            format: 'dd/mm/yyyy',
                                            startDate: '0d',
                                            language: 'pt-BR'   
                                        });
                                    }

                                },
                                complete: function(response) {

                                    // Executa ao completar envio
                                    // Habilito btn Executa ao terminar envio
                                    $("button").prop('disabled', false);

                                },
                                error: function(response, thrownError) {

                                   window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                }
                            });
     
                            
                        });


                        // CHAMA O MODAL ALTERAR UM EVENTO (REPASSE)
                        $('.btn_modal_alterar').on('click', function(){
                            
        
                            // Campos que irão popular o modal dinamicamente
                            var cod_medico = $("#cod_medico").val();
                            var cod_procedimento = $(this).parent().prev().prev().prev().prev().prev().prev();
                            cod_procedimento = $(cod_procedimento).text();
                            
                            
                            // Requisição ajax
                            $.ajax({
                                cache: false,
                                type: "POST",
                                url: "<?php echo url('admin/painel/medicos/buscar-repasse-para-alterar-medico-ajax'); ?>",
                                data: { 
                                    "cod_medico": cod_medico,
                                    "cod_procedimento": cod_procedimento
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
                                        alert(response.error);              

                                    } else if (response.status == 'sucesso') {
                                        
                                        // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                        var array_repasses = response.array_repasses;
                                        var total_repasses = response.total_repasse;
                                      
                                        // Limpo o modal
                                        $('#modal_alterar .modal-body').html("");
                                        
                                        // Inicializo a variavel
                                        var modal = "";
                                        
                                        // passando o total de repasses que pode ser reajustado    
                                        modal +=    "<input type='hidden' name=total_repasse_reajuste id='total_repasse_reajuste' value = '"+total_repasses+"' />"
                                            
                                        
                                        // Rodo o total de repassses que veio do controller
                                        for(i = 0; i < total_repasses; i++){
                                            
                                            // armazeno o vetor[i] na variavel resultado
                                            var resultado = array_repasses[i];
                                     
                                            // Separo o vetor por possição
                                            var resultado = resultado.split("|");
                                            
                                            // recebo o valor do vetor[i] na possição 0
                                            var nome_unidade = resultado[0];
                                            
                                            // recebo o valor do vetor[i] na possição 1
                                            var procedimento = resultado[1];
                                            
                                            // recebo o valor do vetor[i] na possição 2
                                            var tipo_valor_repasse = resultado[2];
                                            
                                            // recebo o valor do vetor[i] na possição 3
                                            var valor_repasse = resultado[3];
                                            
                                            // recebo o valor do vetor[i] na possição 4
                                            var cod_repasse = resultado[4];
                                            
                                            
                                            
                                            modal += "<div class='panel panel-primary'>";
                                            
                                            modal +=    "<div class='panel-heading'>";
                                            modal +=         "Dados do repasse";
                                            modal +=    "</div>";

                                            modal +=    "<div class='panel-body'>";
                       
                                            modal +=        "<p class='text-right tile_head'>";
                                            modal +=               "<small'>Reajustar</small>";
                                            modal +=                " <input type='checkbox' class='btn_reajustar' name='btn_reajustar"+i+"' id='btn_reajustar"+i+"' value='"+i+"'/> ";
                                            modal +=         "</p>";                    
                                            
                                            modal +=        "<input type='hidden' disabled='disabled' class='form-control' name='cod_repasse_reajustar"+i+"' id='cod_repasse_reajustar"+i+"' value='"+cod_repasse+"' />";
                                            
                                            modal +=        "<div class='form-group'>";
                                            modal +=            "<label for='unidade'>Unidade </label>";
                                            modal +=            "<input type='text' disabled='disabled' class='form-control' value='"+nome_unidade+"' />";
                                            modal +=        "</div>";

                                            modal +=        "<div class='form-group'>";
                                            modal +=            "<label for='procedimento'>Procedimento </label>";
                                            modal +=            "<input type='text' disabled='disabled' class='form-control' value='"+procedimento+"' />";
                                            modal +=        "</div>";

                                            modal +=        "<div class='form-group'>";
                                            
                                                                if(tipo_valor_repasse == 1){
                                                                    
                                            modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"'  disabled='disabled' checked='checked' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' value='2'> Percentual (%)</label>";
                                            
                                                                }else if(tipo_valor_repasse == 2){

                                            modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' checked='checked' value= '2'> Percentual (%)</label>";                    
                                            
                                                                }
                                                                
                                            modal +=                "<input type='text' class='form-control dinheiro' name='valor_repasse_reajustar"+i+"' id='valor_repasse_reajustar"+i+"' disabled='disabled' value='"+valor_repasse+"' />";                    
                                            
                                            modal +=        "</div>";
                                            
                                            
                                            modal +=        "<div class='form-group'>";
                                            modal +=            "<label for='data_inicio'>Data Inicio </label>";
                                            modal +=            "<input type='text' 'name='data_inicio_repasse_reajustar"+i+"' id='data_inicio_repasse_reajustar"+i+"' disabled='disabled' class='form-control data_inicio' />";
                                            modal +=        "</div>";
                
                                            modal +=    "</div>";

                                            modal += "</div>";

                                        }
                                        
                                        $('#modal_alterar .modal-body').append(modal);
                                        $('#modal_alterar').modal('show');
                                        
                                        // Habilitar caixa da unidade
                                        $(".btn_reajustar").on('click', function(){
                                            
                                            // Habilito a os campos de acordo com o checkbox clicado */
                                            var i  = $(this).val();
                                
                                            if($("input[name='btn_reajustar"+i+"']:checked").length > 0){
                                               $(".tipo_valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                               $("#valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                               $("#data_inicio_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                            }else{
                                               $(".tipo_valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                               $("#valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                               $("#data_inicio_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                            }
                                
                                        });
                                        
                                        
                                        
                                        
                                        // Mascaras em todos os campos R$ 
                                        $('.dinheiro').maskMoney();
                                        
                                        // Mascaras em todos os campos data
                                        $(".data_inicio").datepicker({
                                            autoclose: true,
                                            format: 'dd/mm/yyyy',
                                            startDate: '0d',
                                            language: 'pt-BR'   
                                        });
                                    }

                                },
                                complete: function(response) {

                                    // Executa ao completar envio
                                    // Habilito btn Executa ao terminar envio
                                    $("button").prop('disabled', false);

                                },
                                error: function(response, thrownError) {

                                   window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                }
                            });
                          
                        });
                        
                        
                        // CHAMA O MODAL VISUALIZAR UM EVENTO (REPASSE)
                        $('.btn_modal_visualizar').on('click', function(){
                            
                            // Campos que irão popular o modal dinamicamente
                            var cod_medico = $("#cod_medico").val();
                            
                            var cod_procedimento = $(this).parent().prev().prev().prev().prev();
                            cod_procedimento = $(cod_procedimento).text();
                            
                            // Requisição ajax
                            $.ajax({
                                cache: false,
                                type: "POST",
                                url: "<?php echo url('admin/painel/medicos/visualizar-repasse-medico-ajax'); ?>",
                                data: { 
                                    "cod_medico": cod_medico,
                                    "cod_procedimento": cod_procedimento
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
                                        alert(response.error);              

                                    } else if (response.status == 'sucesso') {
                                        
                                        // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                        var array_repasses = response.array_repasses;
                                        var total_repasses = response.total_repasse;
                                        
                                        // Limpo o modal
                                        $('#modal_visualizar .modal-body').html("");
                                        
                                        // Inicializo a variavel
                                        var modal = "";
                                        
                                        // Rodo o total de repassses que veio do controller
                                        for(i = 0; i < total_repasses; i++){
                                            
                                            // armazeno o vetor[i] na variavel resultado
                                            var resultado = array_repasses[i];
                                            
                                            // Separo o vetor por possição
                                            var resultado = resultado.split("|");
                                            
                                            // recebo o valor do vetor[i] na possição 0
                                            var nome_unidade = resultado[0];
                                            
                                            // recebo o valor do vetor[i] na possição 1
                                            var procedimento = resultado[1];
                                            
                                            // recebo o valor do vetor[i] na possição 2
                                            var tipo_valor_repasse = resultado[2];
                                            
                                            // recebo o valor do vetor[i] na possição 3
                                            var valor_repasse = resultado[3];
                                            
                                            // recebo o valor do vetor[i] na possição 3
                                            var data_inicio_repasse = resultado[4];
                                            
                                            // recebo o valor do vetor[i] na possição 3
                                            var data_fim_repasse = resultado[5];
                                            
                                            // Recuperando a data atual
                                            var data_hj = data_atual_us();
                                         
                                            if(data_fim_repasse >= data_hj | data_fim_repasse == ""){ 
                                             
                                                // O formato da data contida na variável "data" é YYY-mm-dd
                                                var data_inicio_repasse_br = data_inicio_repasse.split('-');
                                                data_inicio_repasse_br = data_inicio_repasse_br[2] + "/" +data_inicio_repasse_br[1]+"/"+data_inicio_repasse_br[0];

                                                if(data_fim_repasse != ""){
                                                    var data_fim_repasse_br = data_fim_repasse.split('-');
                                                    data_fim_repasse_br = data_fim_repasse_br[2] + "/" +data_fim_repasse_br[1]+"/"+data_fim_repasse_br[0];
                                                }else{
                                                    var data_fim_repasse_br = "";
                                                }


                                                modal += "<div class='panel panel-primary'>";

                                                modal +=    "<div class='panel-heading'>";
                                                modal +=         "Dados do repasse"
                                                modal +=    "</div>";

                                                modal +=    "<div class='panel-body'>";

                                                modal +=        "<div class='form-group'>";
                                                modal +=            "<label for='unidade'>Unidade </label>";
                                                modal +=            "<input type='text' readonly='readonly' class='form-control' value='"+nome_unidade+"' />";
                                                modal +=        "</div>";

                                                modal +=        "<div class='form-group'>";
                                                modal +=            "<label for='procedimento'>Procedimento </label>";
                                                modal +=            "<input type='text' readonly='readonly' class='form-control' value='"+procedimento+"' />";
                                                modal +=        "</div>";

                                                modal +=        "<div class='form-group'>";

                                                                    if(tipo_valor_repasse == 1){

                                                modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' disabled='disabled' checked='checked'> Reais (R$) <input type='radio' disabled='disabled' value='2'> Percentual (%)</label>";

                                                                    }else if(tipo_valor_repasse == 2){

                                                modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' disabled='disabled'> Reais (R$) <input type='radio' disabled='disabled' checked='checked'> Percentual (%)</label>";                    

                                                                    }

                                                modal +=                "<input type='text' class='form-control dinheiro' disabled='disabled' value='"+valor_repasse+"' />";                    

                                                modal +=        "</div>";

                                                modal +=        "<div class='form-group'>";

                                                modal +=            "<div class='row'>";

                                                modal +=                "<div class='col-lg-6'>";
                                                modal +=                    "<label for='procedimento'>Data início </label>";
                                                modal +=                    "<input type='text' disabled='disabled' class='form-control' value='"+data_inicio_repasse_br+"' />";
                                                modal +=                "</div>";

                                                modal +=                "<div class='col-lg-6'>";
                                                modal +=                    "<label for='procedimento'>Data Fim </label>";
                                                modal +=                    "<input type='text' disabled='disabled' class='form-control' value='"+data_fim_repasse_br+"' />";
                                                modal +=                "</div>";

                                                modal +=             "</div>";

                                                modal +=        "</div>";

                                                modal +=    "</div>";

                                                modal += "</div>";
                                            
                                            }

                                        }
                                        $('#modal_visualizar .modal-body').append(modal);
                                        $('#modal_visualizar').modal('show');
                                        // Mascaras em todos os campos R$ 
                                        $('.dinheiro').maskMoney();
                                    }

                                },
                                complete: function(response) {

                                    // Executa ao completar envio
                                    // Habilito btn Executa ao terminar envio
                                    $("button").prop('disabled', false);

                                },
                                error: function(response, thrownError) {

                                   window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                }
                            });
                          
                            
                        });
                        

                    }

                },
                complete: function(response) {

                    // Executa ao completar envio
                    // Habilito btn Executa ao terminar envio
                    $("button").prop('disabled', false);

                },
                error: function(response, thrownError) {

                   window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                }
            });
            
 
        });
        // FIM DO BLOCO 1 -----------------------------------------------------
        
        // INCIO DO BLOCO 2 ---------------------------------------------------
        // É CHAMADO O METODO SALVAR OS DADOS DO MODAL CADASTRAR 
        
        $("#btn_salvar_dinamico").on('click', function(){
           
            // :: Reset Toast :: 
            $.toast().reset('all');

        
            var total_unidade = $("#total_repasse_cadastrar").val();
            var cod_medico = $("#cod_medico_cadastrar").val(); // campo obrigatório
            var cod_procedimento = $("#cod_procedimento_cadastrar").val(); // campo obrigatório
            var cod_unidades = new Array;
            var tipo_valor_repasse = new Array;
            var valor_repasse = new Array;
            var cod_tabela = $("#cod_tabela").val();
            var cont_repasse = 0; // contador de repasses criados
    
            
    
            for(i = 0; i < total_unidade; i++){
    
                /* Verificando os campos obrigátorios --------------------------
                /* Se o campo (tipo_valor_repasse) tiver checked, logo o proximo campo(valor_repasse) será obrigatório */ 
                
                var verificador = $("input[name=tipo_valor_repasse_cadastrar"+i+"]:checked").val()
               
                if(typeof verificador != "undefined"){ // typeof: verifica se uma variavel foi definida
                    
                    var cont_repasse = cont_repasse + 1; // contando qtd de repasses criado
                    
                    // Se o campo tipo_valor_repasse foi definido, logo o campo valor repasse da unidade é obrigatório
                    //campo obrigatório 
                    if($("#valor_repasse_cadastrar"+i).val().length == 0){
                        
                        alert("O valor do repasse da unidade correspondente deve ser informado");
                        $("#valor_repasse_cadastrar"+i).focus();
                        return false;
                        
                    }
                    
                }
  
                // Armazeando os codigo em um array
                cod_unidades.push($("#cod_unidade_cadastrar"+i).val()); // campo obrigatório
                tipo_valor_repasse.push($("input[name=tipo_valor_repasse_cadastrar"+i+"]:checked").val()); // campo obrigatório
                valor_repasse.push($("#valor_repasse_cadastrar"+i).val()); // campo obrigatório
        
            }
            
            // Converto Array para JSON
            cod_unidades_em_json = JSON.stringify(cod_unidades);
            tipo_valor_repasse_em_json = JSON.stringify(tipo_valor_repasse);
            valor_repasse_em_json = JSON.stringify(valor_repasse);
            
      
            // Verificando se ao menos um repasse foi criado
            //alert(cont_repasse);
            if(cont_repasse == 0){
                alert("Crie ao menos um repasse!");
                return false;
            }
           
            
           // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/medicos/cadastrar-repasse-medico-ajax');?>",
                data: { 
                    "cod_medico": cod_medico,
                    "cod_procedimento": cod_procedimento,
                    "cod_unidades_em_json": cod_unidades_em_json,
                    "tipo_valor_repasse_em_json": tipo_valor_repasse_em_json,
                    "valor_repasse_em_json": valor_repasse_em_json
                },
                beforeSend: function() { 

                    // Desabilito btn Executa antes do envio
                    $("button").prop('disabled', true);

                },
                success: function(response) {

                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo retorno
                    if (response.status == 'erro') {

                       // Mostra mensagem de erro
                        $.toast({
                            heading: 'Não foi possivel salvar um ou mais repasses, favor tente novamente!',
                            text: response.erro,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: false,
                            allowToastClose: true,
                            afterHidden: function() {
                                
                                window.location.replace("<?php  echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);
                                
                            }   
                        });  
                        
                    } else if (response.status == 'sucesso') {

                        
                    
                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Repasse salvo com sucesso!',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 1500, // em milisegundos
                            allowToastClose: true, 
                            afterHidden: function() {
                                
                                // fechar o modal de cadastrar
                                $('#modal_cadastrar').modal('hide');
                                
                                // LIMPANDO DATA-TABLE --------------------------------------------
                                $("#data-table").html('');

                                var cod_tabela = $("#cod_tabela").val();
                                var cod_categoria = $("#cod_categoria").val();            
                                var cod_medico = $("#cod_medico").val();            

                                if(cod_categoria.length == 0){
                                    cod_categoria = 0;
                                }

                                if(cod_tabela.length == 0){
                                    // Desabita o campo
                                    $("#cod_categoria").prop('disabled', true);
                                    return false;
                                }

                                // habilitando o campo
                                $("#cod_categoria").prop('disabled', false);

                                // BUSCAR DADOS VIA AJAX ------------------------------------------
                                // Requisição ajax
                                $.ajax({
                                    cache: false,
                                    type: "POST",
                                    url: "<?php echo url('admin/painel/medicos/buscar-procedimentos-para-repasse-medico'); ?>",
                                    data: { 
                                        "cod_medico": cod_medico,
                                        "cod_tabela": cod_tabela,
                                        "cod_categoria": cod_categoria
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
                                            alert(response.error);

                                        } else if (response.status == 'sucesso') {

                                            var data_table = response.data_table;
                                            var total_unidades = response.total_unidades;
                                            var cod_unidades = response.cod_unidades;
                                            var nome_unidades = response.nome_unidades;
                                            var descricao_procedimento = response.descricao_procedimento;

                                            // Separando as unidades por (|)
                                            var nome_unidade = nome_unidades.split("|");
                                            var cod_unidade = cod_unidades.split("|");



                                            // INSERINDO A DATA TABLE DINAMICAMENTE ---------------
                                            $("#data-table").append(data_table);

                                            // CRIA A PAGINAÇÃO E BUSCA ----------------------------
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
                                            // FIM DA PAGINAÇÃO E BUSCA ---------------------------

                                            // CHAMA O MODAL CADASTRAR UM EVENTO (REPASSE) ---------
                                            $('.btn_modal_cadastrar').on('click', function(){

                                                // Campos que irão popular o modal dinamicamente
                                                var cod_medico = $("#cod_medico").val();

                                                var cod_procedimento = $(this).parent().prev().prev().prev().prev().prev();
                                                cod_procedimento = $(cod_procedimento).text();


                                                // Requisição ajax
                                                $.ajax({
                                                    cache: false,
                                                    type: "POST",
                                                    url: "<?php echo url('admin/painel/medicos/criar-repasse-medico-ajax'); ?>",
                                                    data: { 
                                                        "cod_medico": cod_medico,
                                                        "cod_procedimento": cod_procedimento
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
                                                            alert(response.msg);              

                                                        } else if (response.status == 'sucesso') {

                                                            // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                                            var array_unidade_sem_repasses = response.array_unidade_sem_repasses;
                                                            var total_unidade_sem_repasse = response.total_unidade_sem_repasse;



                                                            // Limpo o modal
                                                            $('#modal_cadastrar .modal-body').html("");

                                                            // Inicializo a variavel
                                                            var modal = "";

                                                            // passando o total de repasses que pode ser reajustado    
                                                            modal +=    "<input type='hidden' name=total_repasse_cadastrar id='total_repasse_cadastrar' value = '"+total_unidade_sem_repasse+"' />"


                                                            // Rodo o total de repassses que veio do controller
                                                            for(i = 0; i < total_unidade_sem_repasse; i++){

                                                                // armazeno o vetor[i] na variavel resultado
                                                                var resultado = array_unidade_sem_repasses[i];

                                                                // Separo o vetor por possição
                                                                var resultado = resultado.split("|");

                                                                // recebo o valor do vetor[i] na possição 0
                                                                var cod_unidade = resultado[0];

                                                                // recebo o valor do vetor[i] na possição 1
                                                                var nome_unidade = resultado[1];

                                                                // recebo o valor do vetor[i] na possição 2
                                                                var cod_medico = resultado[2];

                                                                // recebo o valor do vetor[i] na possição 3
                                                                var cod_procedimento = resultado[3];

                                                                // recebo o valor do vetor[i] na possição 4
                                                                var decricao_procedimento = resultado[4];


                                                                modal += "<div class='panel panel-primary'>";

                                                                modal +=    "<div class='panel-heading'>";
                                                                modal +=         "Dados do repasse";
                                                                modal +=    "</div>";

                                                                modal +=    "<input type='hidden' readonly='readonly' id='cod_medico_cadastrar' name='cod_medico_cadastrar' value='"+cod_medico+"' />";
                                                                modal +=    "<input type='hidden' readonly='readonly' id='cod_procedimento_cadastrar' name='cod_procedimento_cadastrar' value='"+cod_procedimento+"' />";
                                                                modal +=    "<input type='hidden' readonly='readonly' id='cod_unidade_cadastrar"+i+"' name='cod_unidade_cadastrar"+i+"' value='"+cod_unidade+"' />";

                                                                modal +=    "<div class='panel-body'>";

                                                                modal +=        "<div class='form-group'>";
                                                                modal +=            "<label for='unidade'>Unidade </label>";
                                                                modal +=            "<input type='text' readonly='readonly' class='form-control' id='nome_unidade_cadastrar' name='nome_unidade_cadastrar' value='"+nome_unidade+"' />";
                                                                modal +=        "</div>";

                                                                modal +=        "<div class='form-group'>";
                                                                modal +=            "<label for='procedimento'>Procedimento </label>";
                                                                modal +=            "<input type='text' readonly='readonly' class='form-control' id='descricao_procedimento_cadastrar' name='descricao_procedimento_cadastrar' value='"+decricao_procedimento+"' />";
                                                                modal +=        "</div>";

                                                                modal +=        "<div class='form-group'>";

                                                                modal +=            "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_cadastrar"+i+"' name='tipo_valor_repasse_cadastrar"+i+"' id='tipo_valor_repasse_cadastrar"+i+"' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_cadastrar"+i+"' name='tipo_valor_repasse_cadastrar"+i+"' id='tipo_valor_repasse_cadastrar"+i+"' value='2'> Percentual (%)</label>";

                                                                modal +=        "</div>";

                                                                modal +=        "<div class='form-group'>";

                                                                modal +=            "<input type='text' class='form-control dinheiro' name='valor_repasse_cadastrar"+i+"' id='valor_repasse_cadastrar"+i+"' />";                    

                                                                modal +=        "</div>";                    

                                                                modal +=    "</div>";

                                                                modal += "</div>";


                                                            }

                                                            $('#modal_cadastrar .modal-body').append(modal);
                                                            $('#modal_cadastrar').modal('show');
                                                            // Mascaras em todos os campos R$ 
                                                            $('.dinheiro').maskMoney();



                                                            // Habilitar caixa da unidade
                                                            $(".btn_reajustar").on('click', function(){

                                                                // Habilito a os campos de acordo com o checkbox clicado */
                                                                var i  = $(this).val();

                                                                if($("input[name='btn_reajustar"+i+"']:checked").length > 0){
                                                                   $(".tipo_valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                   $("#valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                   $("#data_inicio_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                }else{
                                                                   $(".tipo_valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                   $("#valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                   $("#data_inicio_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                }

                                                            });




                                                            // Mascaras em todos os campos R$ 
                                                            $('.dinheiro').maskMoney();

                                                            // Mascaras em todos os campos data
                                                            $(".data_inicio").datepicker({
                                                                autoclose: true,
                                                                format: 'dd/mm/yyyy',
                                                                startDate: '0d',
                                                                language: 'pt-BR'   
                                                            });
                                                        }

                                                    },
                                                    complete: function(response) {

                                                        // Executa ao completar envio
                                                        // Habilito btn Executa ao terminar envio
                                                        $("button").prop('disabled', false);

                                                    },
                                                    error: function(response, thrownError) {

                                                        window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);
                                                    }
                                                });


                                            });


                                            // CHAMA O MODAL ALTERAR UM EVENTO (REPASSE)
                                            $('.btn_modal_alterar').on('click', function(){


                                                // Campos que irão popular o modal dinamicamente
                                                var cod_medico = $("#cod_medico").val();
                                                var cod_procedimento = $(this).parent().prev().prev().prev().prev().prev().prev();
                                                cod_procedimento = $(cod_procedimento).text();


                                                // Requisição ajax
                                                $.ajax({
                                                    cache: false,
                                                    type: "POST",
                                                    url: "<?php echo url('admin/painel/medicos/buscar-repasse-para-alterar-medico-ajax'); ?>",
                                                    data: { 
                                                        "cod_medico": cod_medico,
                                                        "cod_procedimento": cod_procedimento
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
                                                            alert(response.error);              

                                                        } else if (response.status == 'sucesso') {

                                                            // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                                            var array_repasses = response.array_repasses;
                                                            var total_repasses = response.total_repasse;

                                                            // Limpo o modal
                                                            $('#modal_alterar .modal-body').html("");

                                                            // Inicializo a variavel
                                                            var modal = "";

                                                            // passando o total de repasses que pode ser reajustado    
                                                            modal +=    "<input type='hidden' name=total_repasse_reajuste id='total_repasse_reajuste' value = '"+total_repasses+"' />"


                                                            // Rodo o total de repassses que veio do controller
                                                            for(i = 0; i < total_repasses; i++){

                                                                // armazeno o vetor[i] na variavel resultado
                                                                var resultado = array_repasses[i];

                                                                // Separo o vetor por possição
                                                                var resultado = resultado.split("|");

                                                                // recebo o valor do vetor[i] na possição 0
                                                                var nome_unidade = resultado[0];

                                                                // recebo o valor do vetor[i] na possição 1
                                                                var procedimento = resultado[1];

                                                                // recebo o valor do vetor[i] na possição 2
                                                                var tipo_valor_repasse = resultado[2];

                                                                // recebo o valor do vetor[i] na possição 3
                                                                var valor_repasse = resultado[3];

                                                                // recebo o valor do vetor[i] na possição 4
                                                                var cod_repasse = resultado[4];



                                                                modal += "<div class='panel panel-primary'>";

                                                                modal +=    "<div class='panel-heading'>";
                                                                modal +=         "Dados do repasse";
                                                                modal +=    "</div>";

                                                                modal +=    "<div class='panel-body'>";

                                                                modal +=        "<p class='text-right tile_head'>";
                                                                modal +=               "<small'>Reajustar</small>";
                                                                modal +=                " <input type='checkbox' class='btn_reajustar' name='btn_reajustar"+i+"' id='btn_reajustar"+i+"' value='"+i+"'/> ";
                                                                modal +=         "</p>";                    

                                                                modal +=        "<input type='hidden' disabled='disabled' class='form-control' name='cod_repasse_reajustar"+i+"' id='cod_repasse_reajustar"+i+"' value='"+cod_repasse+"' />";

                                                                modal +=        "<div class='form-group'>";
                                                                modal +=            "<label for='unidade'>Unidade </label>";
                                                                modal +=            "<input type='text' disabled='disabled' class='form-control' value='"+nome_unidade+"' />";
                                                                modal +=        "</div>";

                                                                modal +=        "<div class='form-group'>";
                                                                modal +=            "<label for='procedimento'>Procedimento </label>";
                                                                modal +=            "<input type='text' disabled='disabled' class='form-control' value='"+procedimento+"' />";
                                                                modal +=        "</div>";

                                                                modal +=        "<div class='form-group'>";

                                                                                    if(tipo_valor_repasse == 1){

                                                                modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"'  disabled='disabled' checked='checked' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' value='2'> Percentual (%)</label>";

                                                                                    }else if(tipo_valor_repasse == 2){

                                                                modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' checked='checked' value= '2'> Percentual (%)</label>";                    

                                                                                    }

                                                                modal +=                "<input type='text' class='form-control dinheiro' name='valor_repasse_reajustar"+i+"' id='valor_repasse_reajustar"+i+"' disabled='disabled' value='"+valor_repasse+"' />";                    

                                                                modal +=        "</div>";


                                                                modal +=        "<div class='form-group'>";
                                                                modal +=            "<label for='data_inicio'>Data Inicio </label>";
                                                                modal +=            "<input type='text' 'name='data_inicio_repasse_reajustar"+i+"' id='data_inicio_repasse_reajustar"+i+"' disabled='disabled' class='form-control data_inicio' />";
                                                                modal +=        "</div>";

                                                                modal +=    "</div>";

                                                                modal += "</div>";

                                                            }

                                                            $('#modal_alterar .modal-body').append(modal);
                                                            $('#modal_alterar').modal('show');

                                                            // Habilitar caixa da unidade
                                                            $(".btn_reajustar").on('click', function(){

                                                                // Habilito a os campos de acordo com o checkbox clicado */
                                                                var i  = $(this).val();

                                                                if($("input[name='btn_reajustar"+i+"']:checked").length > 0){
                                                                   $(".tipo_valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                   $("#valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                   $("#data_inicio_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                }else{
                                                                   $(".tipo_valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                   $("#valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                   $("#data_inicio_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                }

                                                            });




                                                            // Mascaras em todos os campos R$ 
                                                            $('.dinheiro').maskMoney();

                                                            // Mascaras em todos os campos data
                                                            $(".data_inicio").datepicker({
                                                                autoclose: true,
                                                                format: 'dd/mm/yyyy',
                                                                startDate: '0d',
                                                                language: 'pt-BR'   
                                                            });
                                                        }

                                                    },
                                                    complete: function(response) {

                                                        // Executa ao completar envio
                                                        // Habilito btn Executa ao terminar envio
                                                        $("button").prop('disabled', false);

                                                    },
                                                    error: function(response, thrownError) {

                                                        window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                                    }
                                                });

                                            });


                                            // CHAMA O MODAL VISUALIZAR UM EVENTO (REPASSE)
                                            $('.btn_modal_visualizar').on('click', function(){

                                                // Campos que irão popular o modal dinamicamente
                                                var cod_medico = $("#cod_medico").val();

                                                var cod_procedimento = $(this).parent().prev().prev().prev().prev();
                                                cod_procedimento = $(cod_procedimento).text();

                                                // Requisição ajax
                                                $.ajax({
                                                    cache: false,
                                                    type: "POST",
                                                    url: "<?php echo url('admin/painel/medicos/visualizar-repasse-medico-ajax'); ?>",
                                                    data: { 
                                                        "cod_medico": cod_medico,
                                                        "cod_procedimento": cod_procedimento
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
                                                            alert(response.error);              

                                                        } else if (response.status == 'sucesso') {

                                                            // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                                            var array_repasses = response.array_repasses;
                                                            var total_repasses = response.total_repasse;

                                                            // Limpo o modal
                                                            $('#modal_visualizar .modal-body').html("");

                                                            // Inicializo a variavel
                                                            var modal = "";

                                                            // Rodo o total de repassses que veio do controller
                                                            for(i = 0; i < total_repasses; i++){

                                                                // armazeno o vetor[i] na variavel resultado
                                                                var resultado = array_repasses[i];

                                                                // Separo o vetor por possição
                                                                var resultado = resultado.split("|");

                                                                // recebo o valor do vetor[i] na possição 0
                                                                var nome_unidade = resultado[0];

                                                                // recebo o valor do vetor[i] na possição 1
                                                                var procedimento = resultado[1];

                                                                // recebo o valor do vetor[i] na possição 2
                                                                var tipo_valor_repasse = resultado[2];

                                                                // recebo o valor do vetor[i] na possição 3
                                                                var valor_repasse = resultado[3];

                                                                // recebo o valor do vetor[i] na possição 3
                                                                var data_inicio_repasse = resultado[4];

                                                                // recebo o valor do vetor[i] na possição 3
                                                                var data_fim_repasse = resultado[5];

                                                                // Recuperando a data atual
                                                                var data_hj = data_atual_us();

                                                                if(data_fim_repasse >= data_hj | data_fim_repasse == ""){ 

                                                                    // O formato da data contida na variável "data" é YYY-mm-dd
                                                                    var data_inicio_repasse_br = data_inicio_repasse.split('-');
                                                                    data_inicio_repasse_br = data_inicio_repasse_br[2] + "/" +data_inicio_repasse_br[1]+"/"+data_inicio_repasse_br[0];

                                                                    if(data_fim_repasse != ""){
                                                                        var data_fim_repasse_br = data_fim_repasse.split('-');
                                                                        data_fim_repasse_br = data_fim_repasse_br[2] + "/" +data_fim_repasse_br[1]+"/"+data_fim_repasse_br[0];
                                                                    }else{
                                                                        var data_fim_repasse_br = "";
                                                                    }


                                                                    modal += "<div class='panel panel-primary'>";

                                                                    modal +=    "<div class='panel-heading'>";
                                                                    modal +=         "Dados do repasse"
                                                                    modal +=    "</div>";

                                                                    modal +=    "<div class='panel-body'>";

                                                                    modal +=        "<div class='form-group'>";
                                                                    modal +=            "<label for='unidade'>Unidade </label>";
                                                                    modal +=            "<input type='text' readonly='readonly' class='form-control' value='"+nome_unidade+"' />";
                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";
                                                                    modal +=            "<label for='procedimento'>Procedimento </label>";
                                                                    modal +=            "<input type='text' readonly='readonly' class='form-control' value='"+procedimento+"' />";
                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";

                                                                                        if(tipo_valor_repasse == 1){

                                                                    modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' disabled='disabled' checked='checked'> Reais (R$) <input type='radio' disabled='disabled' value='2'> Percentual (%)</label>";

                                                                                        }else if(tipo_valor_repasse == 2){

                                                                    modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' disabled='disabled'> Reais (R$) <input type='radio' disabled='disabled' checked='checked'> Percentual (%)</label>";                    

                                                                                        }

                                                                    modal +=                "<input type='text' class='form-control dinheiro' disabled='disabled' value='"+valor_repasse+"' />";                    

                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";

                                                                    modal +=            "<div class='row'>";

                                                                    modal +=                "<div class='col-lg-6'>";
                                                                    modal +=                    "<label for='procedimento'>Data início </label>";
                                                                    modal +=                    "<input type='text' disabled='disabled' class='form-control' value='"+data_inicio_repasse_br+"' />";
                                                                    modal +=                "</div>";

                                                                    modal +=                "<div class='col-lg-6'>";
                                                                    modal +=                    "<label for='procedimento'>Data Fim </label>";
                                                                    modal +=                    "<input type='text' disabled='disabled' class='form-control' value='"+data_fim_repasse_br+"' />";
                                                                    modal +=                "</div>";

                                                                    modal +=             "</div>";

                                                                    modal +=        "</div>";

                                                                    modal +=    "</div>";

                                                                    modal += "</div>";

                                                                }

                                                            }
                                                            $('#modal_visualizar .modal-body').append(modal);
                                                            $('#modal_visualizar').modal('show');
                                                            // Mascaras em todos os campos R$ 
                                                            $('.dinheiro').maskMoney();
                                                        }

                                                    },
                                                    complete: function(response) {

                                                       // Executa ao completar envio
                                                        // Habilito btn Executa ao terminar envio
                                                        $("button").prop('disabled', false);

                                                    },
                                                    error: function(response, thrownError) {

                                                       window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                                    }
                                                });


                                            });


                                        }

                                    },
                                    complete: function(response) {

                                        // Executa ao completar envio
                                        // Habilito btn Executa ao terminar envio
                                        $("button").prop('disabled', false);

                                    },
                                    error: function(response, thrownError) {

                                       window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                    }
                                });
            
                                
                                // window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);
                            }
                        }); 

                       
                    }

                },
                complete: function(response) {

                    // Executa ao completar envio
                    // Habilito btn Executa ao terminar envio
                    $("button").prop('disabled', false);

                },
                error: function(response, thrownError) {

                    window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                }
        });
            
        });
        
        // FIM DO BLOCO 2 -----------------------------------------------------
        
        
        // INCIO DO BLOCO 3 ---------------------------------------------------
        // É CHAMADO O METODO REAJUSTAR OS DADOS DO MODAL ALTERAR 
        
        $("#btn_reajustar_dinamico").on('click', function(){
            
            // :: Reset Toast :: 
            $.toast().reset('all');
       
            var cod_repasse_reajustar = new Array;
            var tipo_valor_repasse_reajustar = new Array;
            var valor_repasse_reajustar = new Array;
            var data_inicio_repasse_reajustar = new Array;
            var cont_repasse_reajustar = $("#total_repasse_reajuste").val(); // contador de repasses criados
           
            for(i = 0; i < cont_repasse_reajustar; i++){
                
                if($("#btn_reajustar"+i).is(":checked")){
                    
                    /* Verificando os campos obrigátorios --------------------------
                    /* Se o campo (tipo_valor_repasse) tiver checked, logo o proximo campo(valor_repasse) será obrigatório */ 

                    var verificador = $("input[name=tipo_valor_repasse_reajustar"+i+"]:checked").val()

                    if(typeof verificador != "undefined"){ // typeof: verifica se uma variavel foi definida

                        // Se o campo tipo_valor_repasse foi definido, logo o campo valor repasse da unidade é obrigatório
                        
                        
                        //campo obrigatório preenchido automaticamente pelo sistema
                        if($("#cod_repasse_reajustar"+i).val().length == 0){

                            alert("Ocorreu um erro, favor tentar novamente!");
                            return false;

                        }
                        
                        //campo obrigatório 
                        if($("#valor_repasse_reajustar"+i).val().length == 0){

                            alert("O valor do repasse da unidade correspondente deve ser informado");
                            $("#valor_repasse_reajustar"+i).focus();
                            return false;

                        }
                        
                        //campo obrigatório 
                        if($("#data_inicio_repasse_reajustar"+i).val().length == 0){

                            alert("A data início do repasse da unidade correspondente deve ser informado");
                            $("#data_inicio_repasse_reajustar"+i).focus();
                            return false;

                        }

                    }
                    
                    // Armazeando os codigo em um array
                    cod_repasse_reajustar.push($("#cod_repasse_reajustar"+i).val()); // campo obrigatório
                    tipo_valor_repasse_reajustar.push($("input[name=tipo_valor_repasse_reajustar"+i+"]:checked").val()); // campo obrigatório
                    valor_repasse_reajustar.push($("#valor_repasse_reajustar"+i).val()); // campo obrigatório
                    data_inicio_repasse_reajustar.push($("#data_inicio_repasse_reajustar"+i).val()); // campo obrigatório
          
                }
                    
            }

            // Converto Array para JSON
            cod_repasse_reajustar_em_json = JSON.stringify(cod_repasse_reajustar);
            tipo_valor_repasse_reajustar_em_json = JSON.stringify(tipo_valor_repasse_reajustar);
            valor_repasse_reajustar_em_json = JSON.stringify(valor_repasse_reajustar);
            data_inicio_repasse_reajustar_em_json = JSON.stringify(data_inicio_repasse_reajustar);
         
           // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/medicos/alterar-repasse-medico-ajax');?>",
                data: { 
                    
                    "cod_repasse_reajustar_em_json": cod_repasse_reajustar_em_json,
                    "tipo_valor_repasse_reajustar_em_json": tipo_valor_repasse_reajustar_em_json,
                    "valor_repasse_reajustar_em_json": valor_repasse_reajustar_em_json,
                    "data_inicio_repasse_reajustar_em_json": data_inicio_repasse_reajustar_em_json
                    
                },
                beforeSend: function() { 

                    // Desabilito btn Executa antes do envio
                    $("button").prop('disabled', true);

                },
                success: function(response) {

                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo retorno
                    if (response.status == 'erro') {

                       // Mostra mensagem de erro
                        $.toast({
                            heading: 'Não foi possivel salvar o novo reajuste, favor tente novamente!',
                            text: response.erro,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: false,
                            allowToastClose: true,
                            afterHidden: function() {
                                window.location.replace("<?php echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);
                            }

                        });  

                    } else if (response.status == 'sucesso') {

                    
                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Novo repasse salvo com sucesso!',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 1500, // em milisegundos
                            allowToastClose: true, 
                            afterHidden: function() {
                              
                                  
                                  // fechar o modal de cadastrar
                                    $('#modal_alterar').modal('hide');

                                    // LIMPANDO DATA-TABLE --------------------------------------------
                                    $("#data-table").html('');

                                    var cod_tabela = $("#cod_tabela").val();
                                    var cod_categoria = $("#cod_categoria").val();            
                                    var cod_medico = $("#cod_medico").val();            

                                    if(cod_categoria.length == 0){
                                        cod_categoria = 0;
                                    }

                                    if(cod_tabela.length == 0){
                                        // Desabita o campo
                                        $("#cod_categoria").prop('disabled', true);
                                        return false;
                                    }

                                    // habilitando o campo
                                    $("#cod_categoria").prop('disabled', false);

                                    // BUSCAR DADOS VIA AJAX ------------------------------------------
                                    // Requisição ajax
                                    $.ajax({
                                        cache: false,
                                        type: "POST",
                                        url: "<?php echo url('admin/painel/medicos/buscar-procedimentos-para-repasse-medico'); ?>",
                                        data: { 
                                            "cod_medico": cod_medico,
                                            "cod_tabela": cod_tabela,
                                            "cod_categoria": cod_categoria
                                        },
                                        beforeSend: function() { 

                                            // Desabilito btn Executa antes do envio
                                            $("button").prop('disabled', true);

                                        },
                                        success: function(response) {

                                            // Convertendo resposta para objeto javascript
                                            var response = JSON.parse(response);

                                            // Checo retorno
                                            if (response.status == 'erro') {

                                                // Faz algo
                                                alert(response.error);

                                            } else if (response.status == 'sucesso') {
                                                
                                                // Habilito btn do envio
                                                $("button").prop('disabled', false);
                                                
                                                var data_table = response.data_table;
                                                var total_unidades = response.total_unidades;
                                                var cod_unidades = response.cod_unidades;
                                                var nome_unidades = response.nome_unidades;
                                                var descricao_procedimento = response.descricao_procedimento;

                                                // Separando as unidades por (|)
                                                var nome_unidade = nome_unidades.split("|");
                                                var cod_unidade = cod_unidades.split("|");



                                                // INSERINDO A DATA TABLE DINAMICAMENTE ---------------
                                                $("#data-table").append(data_table);

                                                // CRIA A PAGINAÇÃO E BUSCA ----------------------------
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
                                                // FIM DA PAGINAÇÃO E BUSCA ---------------------------

                                                // CHAMA O MODAL CADASTRAR UM EVENTO (REPASSE) ---------
                                                $('.btn_modal_cadastrar').on('click', function(){

                                                    // Campos que irão popular o modal dinamicamente
                                                    var cod_medico = $("#cod_medico").val();

                                                    var cod_procedimento = $(this).parent().prev().prev().prev().prev().prev();
                                                    cod_procedimento = $(cod_procedimento).text();


                                                    // Requisição ajax
                                                    $.ajax({
                                                        cache: false,
                                                        type: "POST",
                                                        url: "<?php echo url('admin/painel/medicos/criar-repasse-medico-ajax'); ?>",
                                                        data: { 
                                                            "cod_medico": cod_medico,
                                                            "cod_procedimento": cod_procedimento
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
                                                                alert(response.msg);              

                                                            } else if (response.status == 'sucesso') {

                                                                // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                                                var array_unidade_sem_repasses = response.array_unidade_sem_repasses;
                                                                var total_unidade_sem_repasse = response.total_unidade_sem_repasse;



                                                                // Limpo o modal
                                                                $('#modal_cadastrar .modal-body').html("");

                                                                // Inicializo a variavel
                                                                var modal = "";

                                                                // passando o total de repasses que pode ser reajustado    
                                                                modal +=    "<input type='hidden' name=total_repasse_cadastrar id='total_repasse_cadastrar' value = '"+total_unidade_sem_repasse+"' />"


                                                                // Rodo o total de repassses que veio do controller
                                                                for(i = 0; i < total_unidade_sem_repasse; i++){

                                                                    // armazeno o vetor[i] na variavel resultado
                                                                    var resultado = array_unidade_sem_repasses[i];

                                                                    // Separo o vetor por possição
                                                                    var resultado = resultado.split("|");

                                                                    // recebo o valor do vetor[i] na possição 0
                                                                    var cod_unidade = resultado[0];

                                                                    // recebo o valor do vetor[i] na possição 1
                                                                    var nome_unidade = resultado[1];

                                                                    // recebo o valor do vetor[i] na possição 2
                                                                    var cod_medico = resultado[2];

                                                                    // recebo o valor do vetor[i] na possição 3
                                                                    var cod_procedimento = resultado[3];

                                                                    // recebo o valor do vetor[i] na possição 4
                                                                    var decricao_procedimento = resultado[4];


                                                                    modal += "<div class='panel panel-primary'>";

                                                                    modal +=    "<div class='panel-heading'>";
                                                                    modal +=         "Dados do repasse";
                                                                    modal +=    "</div>";

                                                                    modal +=    "<input type='hidden' readonly='readonly' id='cod_medico_cadastrar' name='cod_medico_cadastrar' value='"+cod_medico+"' />";
                                                                    modal +=    "<input type='hidden' readonly='readonly' id='cod_procedimento_cadastrar' name='cod_procedimento_cadastrar' value='"+cod_procedimento+"' />";
                                                                    modal +=    "<input type='hidden' readonly='readonly' id='cod_unidade_cadastrar"+i+"' name='cod_unidade_cadastrar"+i+"' value='"+cod_unidade+"' />";

                                                                    modal +=    "<div class='panel-body'>";

                                                                    modal +=        "<div class='form-group'>";
                                                                    modal +=            "<label for='unidade'>Unidade </label>";
                                                                    modal +=            "<input type='text' readonly='readonly' class='form-control' id='nome_unidade_cadastrar' name='nome_unidade_cadastrar' value='"+nome_unidade+"' />";
                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";
                                                                    modal +=            "<label for='procedimento'>Procedimento </label>";
                                                                    modal +=            "<input type='text' readonly='readonly' class='form-control' id='descricao_procedimento_cadastrar' name='descricao_procedimento_cadastrar' value='"+decricao_procedimento+"' />";
                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";

                                                                    modal +=            "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_cadastrar"+i+"' name='tipo_valor_repasse_cadastrar"+i+"' id='tipo_valor_repasse_cadastrar"+i+"' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_cadastrar"+i+"' name='tipo_valor_repasse_cadastrar"+i+"' id='tipo_valor_repasse_cadastrar"+i+"' value='2'> Percentual (%)</label>";

                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";

                                                                    modal +=            "<input type='text' class='form-control dinheiro' name='valor_repasse_cadastrar"+i+"' id='valor_repasse_cadastrar"+i+"' />";                    

                                                                    modal +=        "</div>";                    

                                                                    modal +=    "</div>";

                                                                    modal += "</div>";


                                                                }

                                                                $('#modal_cadastrar .modal-body').append(modal);
                                                                $('#modal_cadastrar').modal('show');
                                                                // Mascaras em todos os campos R$ 
                                                                $('.dinheiro').maskMoney();



                                                                // Habilitar caixa da unidade
                                                                $(".btn_reajustar").on('click', function(){

                                                                    // Habilito a os campos de acordo com o checkbox clicado */
                                                                    var i  = $(this).val();

                                                                    if($("input[name='btn_reajustar"+i+"']:checked").length > 0){
                                                                       $(".tipo_valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                       $("#valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                       $("#data_inicio_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                    }else{
                                                                       $(".tipo_valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                       $("#valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                       $("#data_inicio_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                    }

                                                                });




                                                                // Mascaras em todos os campos R$ 
                                                                $('.dinheiro').maskMoney();

                                                                // Mascaras em todos os campos data
                                                                $(".data_inicio").datepicker({
                                                                    autoclose: true,
                                                                    format: 'dd/mm/yyyy',
                                                                    startDate: '0d',
                                                                    language: 'pt-BR'   
                                                                });
                                                            }

                                                        },
                                                        complete: function(response) {

                                                            // Executa ao completar envio
                                                            // Habilito btn Executa ao terminar envio
                                                            $("button").prop('disabled', false);

                                                        },
                                                        error: function(response, thrownError) {

                                                            // Faz algo se der erro
                                                            window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);
                                                        }
                                                    });


                                                });


                                                // CHAMA O MODAL ALTERAR UM EVENTO (REPASSE)
                                                $('.btn_modal_alterar').on('click', function(){


                                                    // Campos que irão popular o modal dinamicamente
                                                    var cod_medico = $("#cod_medico").val();
                                                    var cod_procedimento = $(this).parent().prev().prev().prev().prev().prev().prev();
                                                    cod_procedimento = $(cod_procedimento).text();


                                                    // Requisição ajax
                                                    $.ajax({
                                                        cache: false,
                                                        type: "POST",
                                                        url: "<?php echo url('admin/painel/medicos/buscar-repasse-para-alterar-medico-ajax'); ?>",
                                                        data: { 
                                                            "cod_medico": cod_medico,
                                                            "cod_procedimento": cod_procedimento
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
                                                                alert(response.error);              

                                                            } else if (response.status == 'sucesso') {

                                                                // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                                                var array_repasses = response.array_repasses;
                                                                var total_repasses = response.total_repasse;

                                                                // Limpo o modal
                                                                $('#modal_alterar .modal-body').html("");

                                                                // Inicializo a variavel
                                                                var modal = "";

                                                                // passando o total de repasses que pode ser reajustado    
                                                                modal +=    "<input type='hidden' name=total_repasse_reajuste id='total_repasse_reajuste' value = '"+total_repasses+"' />"


                                                                // Rodo o total de repassses que veio do controller
                                                                for(i = 0; i < total_repasses; i++){

                                                                    // armazeno o vetor[i] na variavel resultado
                                                                    var resultado = array_repasses[i];

                                                                    // Separo o vetor por possição
                                                                    var resultado = resultado.split("|");

                                                                    // recebo o valor do vetor[i] na possição 0
                                                                    var nome_unidade = resultado[0];

                                                                    // recebo o valor do vetor[i] na possição 1
                                                                    var procedimento = resultado[1];

                                                                    // recebo o valor do vetor[i] na possição 2
                                                                    var tipo_valor_repasse = resultado[2];

                                                                    // recebo o valor do vetor[i] na possição 3
                                                                    var valor_repasse = resultado[3];

                                                                    // recebo o valor do vetor[i] na possição 4
                                                                    var cod_repasse = resultado[4];



                                                                    modal += "<div class='panel panel-primary'>";

                                                                    modal +=    "<div class='panel-heading'>";
                                                                    modal +=         "Dados do repasse";
                                                                    modal +=    "</div>";

                                                                    modal +=    "<div class='panel-body'>";

                                                                    modal +=        "<p class='text-right tile_head'>";
                                                                    modal +=               "<small'>Reajustar</small>";
                                                                    modal +=                " <input type='checkbox' class='btn_reajustar' name='btn_reajustar"+i+"' id='btn_reajustar"+i+"' value='"+i+"'/> ";
                                                                    modal +=         "</p>";                    

                                                                    modal +=        "<input type='hidden' disabled='disabled' class='form-control' name='cod_repasse_reajustar"+i+"' id='cod_repasse_reajustar"+i+"' value='"+cod_repasse+"' />";

                                                                    modal +=        "<div class='form-group'>";
                                                                    modal +=            "<label for='unidade'>Unidade </label>";
                                                                    modal +=            "<input type='text' disabled='disabled' class='form-control' value='"+nome_unidade+"' />";
                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";
                                                                    modal +=            "<label for='procedimento'>Procedimento </label>";
                                                                    modal +=            "<input type='text' disabled='disabled' class='form-control' value='"+procedimento+"' />";
                                                                    modal +=        "</div>";

                                                                    modal +=        "<div class='form-group'>";

                                                                                        if(tipo_valor_repasse == 1){

                                                                    modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"'  disabled='disabled' checked='checked' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' value='2'> Percentual (%)</label>";

                                                                                        }else if(tipo_valor_repasse == 2){

                                                                    modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' value='1'> Reais (R$) <input type='radio' class='tipo_valor_repasse_reajustar"+i+"' name='tipo_valor_repasse_reajustar"+i+"' id='tipo_valor_repasse_reajustar"+i+"' disabled='disabled' checked='checked' value= '2'> Percentual (%)</label>";                    

                                                                                        }

                                                                    modal +=                "<input type='text' class='form-control dinheiro' name='valor_repasse_reajustar"+i+"' id='valor_repasse_reajustar"+i+"' disabled='disabled' value='"+valor_repasse+"' />";                    

                                                                    modal +=        "</div>";


                                                                    modal +=        "<div class='form-group'>";
                                                                    modal +=            "<label for='data_inicio'>Data Inicio </label>";
                                                                    modal +=            "<input type='text' 'name='data_inicio_repasse_reajustar"+i+"' id='data_inicio_repasse_reajustar"+i+"' disabled='disabled' class='form-control data_inicio' />";
                                                                    modal +=        "</div>";

                                                                    modal +=    "</div>";

                                                                    modal += "</div>";

                                                                }

                                                                $('#modal_alterar .modal-body').append(modal);
                                                                $('#modal_alterar').modal('show');

                                                                // Habilitar caixa da unidade
                                                                $(".btn_reajustar").on('click', function(){

                                                                    // Habilito a os campos de acordo com o checkbox clicado */
                                                                    var i  = $(this).val();

                                                                    if($("input[name='btn_reajustar"+i+"']:checked").length > 0){
                                                                       $(".tipo_valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                       $("#valor_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                       $("#data_inicio_repasse_reajustar"+i).prop("disabled", false); // Habilitar campo 
                                                                    }else{
                                                                       $(".tipo_valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                       $("#valor_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                       $("#data_inicio_repasse_reajustar"+i).prop("disabled", true); // Desabilitar campo  
                                                                    }

                                                                });




                                                                // Mascaras em todos os campos R$ 
                                                                $('.dinheiro').maskMoney();

                                                                // Mascaras em todos os campos data
                                                                $(".data_inicio").datepicker({
                                                                    autoclose: true,
                                                                    format: 'dd/mm/yyyy',
                                                                    startDate: '0d',
                                                                    language: 'pt-BR'   
                                                                });
                                                            }

                                                        },
                                                        complete: function(response) {

                                                            // Executa ao completar envio
                                                            // Habilito btn Executa ao terminar envio
                                                            $("button").prop('disabled', false);

                                                        },
                                                        error: function(response, thrownError) {

                                                           window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                                        }
                                                    });

                                                });


                                                // CHAMA O MODAL VISUALIZAR UM EVENTO (REPASSE)
                                                $('.btn_modal_visualizar').on('click', function(){

                                                    // Campos que irão popular o modal dinamicamente
                                                    var cod_medico = $("#cod_medico").val();

                                                    var cod_procedimento = $(this).parent().prev().prev().prev().prev();
                                                    cod_procedimento = $(cod_procedimento).text();

                                                    // Requisição ajax
                                                    $.ajax({
                                                        cache: false,
                                                        type: "POST",
                                                        url: "<?php echo url('admin/painel/medicos/visualizar-repasse-medico-ajax'); ?>",
                                                        data: { 
                                                            "cod_medico": cod_medico,
                                                            "cod_procedimento": cod_procedimento
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
                                                                alert(response.error);              

                                                            } else if (response.status == 'sucesso') {

                                                                // Recebo um array do controller com dados [nome_unidade][descricao_procedimento][tipo_valor_repasse][valor_repasse]
                                                                var array_repasses = response.array_repasses;
                                                                var total_repasses = response.total_repasse;

                                                                // Limpo o modal
                                                                $('#modal_visualizar .modal-body').html("");

                                                                // Inicializo a variavel
                                                                var modal = "";

                                                                // Rodo o total de repassses que veio do controller
                                                                for(i = 0; i < total_repasses; i++){

                                                                    // armazeno o vetor[i] na variavel resultado
                                                                    var resultado = array_repasses[i];

                                                                    // Separo o vetor por possição
                                                                    var resultado = resultado.split("|");

                                                                    // recebo o valor do vetor[i] na possição 0
                                                                    var nome_unidade = resultado[0];

                                                                    // recebo o valor do vetor[i] na possição 1
                                                                    var procedimento = resultado[1];

                                                                    // recebo o valor do vetor[i] na possição 2
                                                                    var tipo_valor_repasse = resultado[2];

                                                                    // recebo o valor do vetor[i] na possição 3
                                                                    var valor_repasse = resultado[3];

                                                                    // recebo o valor do vetor[i] na possição 3
                                                                    var data_inicio_repasse = resultado[4];

                                                                    // recebo o valor do vetor[i] na possição 3
                                                                    var data_fim_repasse = resultado[5];

                                                                    // Recuperando a data atual
                                                                    var data_hj = data_atual_us();

                                                                    if(data_fim_repasse >= data_hj | data_fim_repasse == ""){ 

                                                                        // O formato da data contida na variável "data" é YYY-mm-dd
                                                                        var data_inicio_repasse_br = data_inicio_repasse.split('-');
                                                                        data_inicio_repasse_br = data_inicio_repasse_br[2] + "/" +data_inicio_repasse_br[1]+"/"+data_inicio_repasse_br[0];

                                                                        if(data_fim_repasse != ""){
                                                                            var data_fim_repasse_br = data_fim_repasse.split('-');
                                                                            data_fim_repasse_br = data_fim_repasse_br[2] + "/" +data_fim_repasse_br[1]+"/"+data_fim_repasse_br[0];
                                                                        }else{
                                                                            var data_fim_repasse_br = "";
                                                                        }


                                                                        modal += "<div class='panel panel-primary'>";

                                                                        modal +=    "<div class='panel-heading'>";
                                                                        modal +=         "Dados do repasse"
                                                                        modal +=    "</div>";

                                                                        modal +=    "<div class='panel-body'>";

                                                                        modal +=        "<div class='form-group'>";
                                                                        modal +=            "<label for='unidade'>Unidade </label>";
                                                                        modal +=            "<input type='text' readonly='readonly' class='form-control' value='"+nome_unidade+"' />";
                                                                        modal +=        "</div>";

                                                                        modal +=        "<div class='form-group'>";
                                                                        modal +=            "<label for='procedimento'>Procedimento </label>";
                                                                        modal +=            "<input type='text' readonly='readonly' class='form-control' value='"+procedimento+"' />";
                                                                        modal +=        "</div>";

                                                                        modal +=        "<div class='form-group'>";

                                                                                            if(tipo_valor_repasse == 1){

                                                                        modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' disabled='disabled' checked='checked'> Reais (R$) <input type='radio' disabled='disabled' value='2'> Percentual (%)</label>";

                                                                                            }else if(tipo_valor_repasse == 2){

                                                                        modal +=                "<label for='tipo_valor'>Tipo valor <span class='required-red'> *  </span> <input type='radio' disabled='disabled'> Reais (R$) <input type='radio' disabled='disabled' checked='checked'> Percentual (%)</label>";                    

                                                                                            }

                                                                        modal +=                "<input type='text' class='form-control dinheiro' disabled='disabled' value='"+valor_repasse+"' />";                    

                                                                        modal +=        "</div>";

                                                                        modal +=        "<div class='form-group'>";

                                                                        modal +=            "<div class='row'>";

                                                                        modal +=                "<div class='col-lg-6'>";
                                                                        modal +=                    "<label for='procedimento'>Data início </label>";
                                                                        modal +=                    "<input type='text' disabled='disabled' class='form-control' value='"+data_inicio_repasse_br+"' />";
                                                                        modal +=                "</div>";

                                                                        modal +=                "<div class='col-lg-6'>";
                                                                        modal +=                    "<label for='procedimento'>Data Fim </label>";
                                                                        modal +=                    "<input type='text' disabled='disabled' class='form-control' value='"+data_fim_repasse_br+"' />";
                                                                        modal +=                "</div>";

                                                                        modal +=             "</div>";

                                                                        modal +=        "</div>";

                                                                        modal +=    "</div>";

                                                                        modal += "</div>";

                                                                    }

                                                                }
                                                                $('#modal_visualizar .modal-body').append(modal);
                                                                $('#modal_visualizar').modal('show');
                                                                // Mascaras em todos os campos R$ 
                                                                $('.dinheiro').maskMoney();
                                                            }

                                                        },
                                                        complete: function(response) {

                                                            // Executa ao completar envio
                                                            // Habilito btn Executa ao terminar envio
                                                            $("button").prop('disabled', false);

                                                        },
                                                        error: function(response, thrownError) {

                                                            window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                                        }
                                                    });


                                                });


                                            }

                                        },
                                        complete: function(response) {

                                            // Executa ao completar envio
                                            // Habilito btn Executa ao terminar envio
                                            $("button").prop('disabled', false);

                                        },
                                        error: function(response, thrownError) {

                                            window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                                        }
                                    });


                                    
                                }
                                  
                        }); 

                    }

                },
                complete: function(response) {

                    // Executa ao completar envio
                    // Habilito btn Executa ao terminar envio
                    $("button").prop('disabled', false);

                },
                error: function(response, thrownError) {

                    window.location.replace("<?php //echo url("admin/painel/medicos/repasse-medico"); ?>/" + response.cod_medico);

                }
        });
            
        });
        
        // FIM DO BLOCO 3 -----------------------------------------------------
  
    });
    
    
</script>
@stop
