@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Clientes | Pessoa Jurídica | Contratos
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-juridica-contrato-editar', $contrato) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Editar Contrato de Pessoa Jurídica</h3>
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
                


                
                <!-- ##################### INICIO CAIXA DADOS DO PLANO ##################### -->
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">DADOS DO PLANO</div>
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-6 col-xs-12">
                
                                <label class="control-label">Convênio <span class="required-red">*</span></label>
                                <select class="form-control input-sm convenio" name="cod_convenio" id="cod_convenio">
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($convenios as $convenio) :
                                    ?>
                                        <option data-autogestao="{{ $convenio->auto_gestao }}" value="{{ $convenio->cod_convenio }}" <?php if ($convenio->cod_convenio == $contrato->planos->cod_convenio) {?>selected="selected"<?php } ?>><?php echo mb_strtoupper($convenio->nome_convenio); ?></option>
                                    <?php 
                                    endforeach;
                                    ?>
                                </select>

                            </div>

                            <div class="form-group col-md-6 col-xs-12">
                                
                                <label class="control-label">Plano <span class="required-red">*</span></label>
                                <select class="form-control input-sm plano" name="cod_plano" id="cod_plano">
                                    <option value="">Selecione</option>
                                    <?php
                                    foreach ($planos_do_convenio as $pdc) :
                                    ?>
                                        <option value="{{ $pdc->cod_plano }}" <?php if ($pdc->cod_plano == $contrato->planos->cod_plano) {?>selected="selected"<?php } ?>><?php echo mb_strtoupper($pdc->nome_plano); ?></option>
                                    <?php 
                                    endforeach;
                                    ?>
                                </select>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row hiddenrow_plano_1" style="display: block;">

                            <div class="form-group col-md-3 col-xs-12">
                                
                                <label class="control-label">Nº do contrato <span class="required-red">*</span></label>
                                <input type="text" id="numero_contrato_pj" name="numero_contrato_pj" class="form-control input-sm" autocomplete="off" value="<?php echo $contrato->numero_contrato_pj; ?>" />

                            </div>

                            <div class="form-group col-md-3 col-xs-12">
                                
                                <label class="control-label">Data de inclusão <span class="required-red">*</span></label>
                                <input type="text" id="data_inclusao" name="data_inclusao" class="form-control input-sm" placeholder="00/00/0000" autocomplete="off" value="<?php echo date('d/m/Y', strtotime(str_replace('/', '-', $contrato->data_inclusao))); ?>" />

                            </div>

                            <div class="form-group col-md-3 col-xs-12">
                                
                                <label class="control-label">Primeiro pagamento <span class="required-red">*</span></label>
                                <input type="text" id="primeiro_vencimento" name="primeiro_vencimento" class="form-control input-sm" placeholder="00/00/0000" autocomplete="off" value="<?php echo date('d/m/Y', strtotime(str_replace('/', '-', $contrato->primeiro_vencimento))); ?>" />

                            </div>

                            <div class="form-group col-md-3 col-xs-12">

                                <label class="control-label">Vendedor <span class="required-red">*</span></label>
                                <select class="form-control input-sm" name="cod_vendedor" id="cod_vendedor">
                                    <option value="">Selecione</option>
                                    <?php
                                    if (count($vendedores) > 0) {
                                    ?>

                                        <?php
                                        foreach ($vendedores as $vendedor) :
                                        ?>
                                            <option value="<?php echo $vendedor->cod_funcionario; ?>" <?php if ($vendedor->cod_funcionario == $vendedor_do_contrato->cod_funcionario) { ?>selected="selected"<?php } ?>><?php echo mb_strtoupper($vendedor->nome); ?></option>
                                        <?php 
                                        endforeach;
                                        ?>

                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA DADOS DO PLANO ##################### -->

                <!-- ##################### INICIO CAIXA CONFIGURAÇÕES DE COBRANÇA ##################### -->
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">CONFIGURAÇÕES DE COBRANÇA</div>
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Tipo de cobrança <span class="required-red">*</span></label>
                                <select class="form-control input-sm" name="tipo_cobranca" id="tipo_cobranca">
                                    <option value="">Selecione</option>
                                    <option value="boleto" <?php if ($contrato->tipo_cobranca == 'boleto') { ?>selected="selected"<?php } ?>>Boleto</option>
                                    <option value="unidade"<?php if ($contrato->tipo_cobranca == 'unidade') { ?>selected="selected"<?php } ?> >Pagar na unidade</option>
                                </select>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row hiddenrow_boleto_1" <?php if ($contrato->tipo_cobranca == 'boleto') { ?>style="display: block;"<?php } else { ?>style="display: none;"<?php } ?>>
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Cobrar taxa de boleto ? <span class="required-red">*</span></label>
                                                            
                                <br />

                                <input type="radio" name="cobrar_taxa_boleto[]" id="cobrar_taxa_boleto" value="1" <?php if ($contrato->cobrar_taxa_boleto == '1') { ?>checked="checked"<?php } ?>>
                                <label class="control-label">Sim</label>
                            
                                <input type="radio" name="cobrar_taxa_boleto[]" id="cobrar_taxa_boleto" value="0" <?php if ($contrato->cobrar_taxa_boleto == '0') { ?>checked="checked"<?php } ?>>
                                <label class="control-label">Não</label>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Cobrar por inclusão de dependente ? <span class="required-red">*</span></label>
                                                            
                                <br />

                                <input type="radio" name="cobrar_inclusao_dependente[]" id="cobrar_inclusao_dependente" value="1" <?php if ($contrato->cobrar_inclusao_dependente == '1') { ?>checked="checked"<?php } ?>>
                                <label class="control-label">Sim</label>
                            
                                <input type="radio" name="cobrar_inclusao_dependente[]" id="cobrar_inclusao_dependente" value="0" <?php if ($contrato->cobrar_inclusao_dependente == '0') { ?>checked="checked"<?php } ?>>
                                <label class="control-label">Não</label>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Configuração da cobrança da taxa de consulta <span class="required-red">*</span></label>
                                <select class="form-control input-sm" name="configuracao_taxa_consulta" id="configuracao_taxa_consulta">
                                    <option value="">Selecione</option>
                                    <option value="0" <?php if ($contrato->configuracao_taxa_consulta == 0) { ?>selected="selected"<?php } ?>>A empresa não irá cobrir</option>
                                    <option value="1" <?php if ($contrato->configuracao_taxa_consulta == 1) { ?>selected="selected"<?php } ?>>A empresa irá cobrir</option>
                                    <option value="2" <?php if ($contrato->configuracao_taxa_consulta == 2) { ?>selected="selected"<?php } ?>>Isenção total</option>
                                </select>

                            </div>

                        </div>
                        <!-- FIM LINHA -->
                        
                        <!-- INICIO LINHA -->
                        <!--<div class="row">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Configuração do limite contratado <span class="required-red">*</span></label>
                                
                                <br />

                                <input type="radio" name="configuracao_limite_contratado[]" id="configuracao_limite_contratado" value="1" <?php if ($contrato->configuracao_limite_contratado == '1') { ?>checked="checked"<?php } ?>>
                                <label class="control-label">Sim</label>
                            
                                <input type="radio" name="configuracao_limite_contratado[]" id="configuracao_limite_contratado" value="0" <?php if ($contrato->configuracao_limite_contratado == '0') { ?>checked="checked"<?php } ?>>
                                <label class="control-label">Não</label>

                            </div>

                        </div>-->
                        <!-- FIM LINHA -->
                        
                        <!-- INICIO LINHA -->
                        <!--<div class="row hiddenrow_valor_limite_1" <?php if ($contrato->configuracao_limite_contratado == '1') { ?>style="display: block;"<?php } else { ?>style="display: none;"<?php } ?>>

                            <div class="form-group col-md-3 col-xs-12">
                                
                                <label class="control-label">Quantidade do limite contratado <span class="required-red">*</span></label>
                                <input type="text" id="qtd_limite_contratado" name="qtd_limite_contratado" class="form-control input-sm" autocomplete="off" value="<?php echo $contrato->qtd_limite_contratado; ?>" />

                            </div>

                        </div>-->
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-md-3 col-xs-12">
                                
                                <label class="control-label">Validade contratual (meses) <span class="required-red">*</span></label>
                                <input type="number" id="validade_contratual_meses" name="validade_contratual_meses" class="form-control input-sm" autocomplete="off" value="<?php echo $contrato->validade_contratual_meses; ?>" />

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA CONFIGURAÇÕES DE COBRANÇA ##################### --> 

                <br />

                <hr />
                
                <!-- BOTÃO PARA SALVAR FORMULARIO -->
                <a class="btn btn-md btn-success pull-right" id="btn_atualizar_contrato" href="javascript:void(null);">
                    <i class="fa fa-save"></i> Atualizar
                </a>
                
                <!-- DIV DA MENSAGEM 'PROCESSANDO' -->
                <div id="msg_processando">
                    <div id="txt_msg_processando">
                        <i class="fa fa-exchange"></i> PROCESSANDO...
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativação de plugin datepicker em campos
    $('#data_inclusao').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });

    $('#primeiro_vencimento').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '0d',
        endDate: '+5y',
        todayHighlight: true,
        autoclose: true
    });

    $('#data_nascimento_busca').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #cod_convenio
     # Ao selecionar um convênio, carrega os planos relacionados no combobox #cod_plano
     # 
    *************************************/ 
    $(document).on('change', '#cod_convenio', function() { 

        // Capto valor selecionado
        var valor_selecionado = $(this).find(':selected').val();

        // Combobox de planos
        var combo_plano = $('#cod_plano');

        // Checo se algo foi selecionado no elemento
        if (valor_selecionado > 0) {

            // Capto o atributo 'autogestao' da opção selecionada
            var auto_gestao = $(this).find(':selected').data('autogestao');
            
            // Checo se o CONVÊNIO selecionado é do tipo AUTO GESTÃO
            if (auto_gestao == 1) {

                $.ajax({
                    cache: false,
                    type: 'POST',
                    url: "<?php echo url(app('prefixo') . '/painel/convenios/listar-planos-convenio'); ?>",
                    data: { 'cod_convenio': valor_selecionado },        
                    dataType: 'json',
                    beforeSend: function() { 

                        // Resetando todos os possiveis Toast
                        $.toast().reset('all');

                        // Mostra mensagem 'processando...'
                        toast_processando = $.toast({
                            text: 'Processando...',
                            showHideTransition: 'fade',
                            position: 'top-right',
                            hideAfter: false,
                            allowToastClose: false
                        });

                    },
                    complete: function(response) {
                        // Oculta mensagem 'processando...'
                        toast_processando.reset();
                    },
                    success: function(result) {

                        // Limpo opções atuais do combo
                        combo_plano.empty();

                        // Adiciono opção padrão
                        combo_plano.append("<option value=''>Selecione uma opção</option>");

                        // Checo informações retornadas
                        if (result == 'nada-encontrado') {

                            //console.log('Nenhum convenio encontrado');

                        } else if (result == 'cod-convenio-vazio') {

                            //console.log('Codigo do convenio vazio');

                        } else {

                            // Faço loop pelas opções do vetor
                            $(result).each(function (index, value) {

                                combo_plano.append("<option value='" + value.cod_plano + "'>" + value.nome_plano + "</option>");
                                
                            });

                        }

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        //console.log(xhr.responseText);
                    }
                });

            } else {

                alert('O sistema NÃO está trabalhando com convênios do tipo ANS no momento.');
                location.reload();

            }

            // Exibo linhas secretas do formulario
            $('.hiddenrow_plano_1').fadeIn("slow");
            $('.hiddenrow_plano_2').fadeIn("slow");

        } else {

            // Limpo opções atuais do combo
            combo_plano.empty();

            // Adiciono opção padrão
            combo_plano.append("<option value=''>Selecione um convênio</option>");

            // Oculto linhas secretas do formulario
            $('.hiddenrow_plano_1').hide();
            $('.hiddenrow_plano_2').hide();

        }

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #tipo_cobranca
     # Dependendo do valor selecionado, exibe campos adicionais do formulário
     # 
    *************************************/ 
    $(document).on('change', '#tipo_cobranca', function() { 
        
        // Capto valor selecionado
        var valor_selecionado = $(this).find(':selected').val();

        // Checo se o valor selecionado foi 'boleto'
        if (valor_selecionado == 'boleto') {

            // Exibo linhas secretas do formulario
            $('.hiddenrow_boleto_1').fadeIn("slow");

        } else {

            // Oculto linhas secretas do formulario
            $('.hiddenrow_boleto_1').hide();

        }

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #configuracao_limite_contratado
     # Dependendo do valor selecionado, exibe campos adicionais do formulário
     # 
    *************************************/ 
    $(document).on('change', '#configuracao_limite_contratado', function() { 
                
        // Capto valor selecionado
        var valor_selecionado = $(this).val();

        // Checo se o valor selecionado foi 'Sim'
        if (valor_selecionado === '1') {

            // Exibo linhas secretas do formulario
            $('.hiddenrow_valor_limite_1').fadeIn("slow");

        } else if (valor_selecionado === '0') { // Checo se o valor selecionado foi 'Não'

            // Oculto linhas secretas do formulario
            $('.hiddenrow_valor_limite_1').hide();

        } else {

            // Oculto linhas secretas do formulario
            $('.hiddenrow_valor_limite_1').hide();

        }

    });




    /************************************
     #
     # Aplicando função no botão ATUALIZAR CONTRATO
     # 
    *************************************/ 
    $(document).on('click', '#btn_atualizar_contrato', function(e) {

        e.preventDefault(); 

        var elemento = $(this);

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Limpo e oculto div de erros
        $('.msg_erro').html('');
        $('.msg_erro').hide();

        // Reuno dados do formulário
        var cod_convenio = $('#cod_convenio option:selected').val();
        var cod_plano = $('#cod_plano option:selected').val();
        var numero_contrato_pj = $('#numero_contrato_pj').val();
        var data_inclusao = $('#data_inclusao').val();
        var primeiro_vencimento = $('#primeiro_vencimento').val();
        var cod_vendedor = $('#cod_vendedor option:selected').val();
        var tipo_cobranca = $('#tipo_cobranca option:selected').val();
        var cobrar_taxa_boleto = $('#cobrar_taxa_boleto:checked').val();
        var cobrar_inclusao_dependente = $('#cobrar_inclusao_dependente:checked').val();
        var configuracao_taxa_consulta = $('#configuracao_taxa_consulta option:selected').val();
        //var configuracao_limite_contratado = $('#configuracao_limite_contratado:checked').val();
        //var qtd_limite_contratado = $('#qtd_limite_contratado').val();
        var validade_contratual_meses = $('#validade_contratual_meses').val();

        /*
         ###########################################
         # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
         ###########################################
        */
        if (cod_convenio == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('O campo CONVÊNIO não foi preenchido corretamente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (cod_plano == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('O campo PLANO não foi preenchido corretamente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (numero_contrato_pj == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('O campo Nº DO CONTRATO não foi preenchido corretamente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (data_inclusao == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('O campo DATA DE INCLUSÃO não foi preenchido corretamente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (primeiro_vencimento == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('O campo PRIMEIRO VENCIMENTO não foi preenchido corretamente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (cod_vendedor == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('O campo VENDEDOR não foi preenchido corretamente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (tipo_cobranca == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('O campo TIPO DE COBRANÇA não foi preenchido corretamente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (tipo_cobranca == 'boleto') {

            if (cobrar_taxa_boleto == '') {
            
                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro').append('É necessário definir se haverá COBRANÇA por taxa de boleto.');
                $('.msg_erro').show();

                // Volto até o topo da tela para chamar a atenção
                $('html, body').animate({ scrollTop: 0 }, 'fast'); 

                return false;

            }

        } 

        if (cobrar_inclusao_dependente == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('É necessário definir se haverá COBRANÇA por inclusão de dependente.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (configuracao_taxa_consulta == '') {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('É necessário definir a configuração da cobrança da TAXA DE CONSULTA.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        /*if (configuracao_limite_contratado == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('É necessário definir se será utilizado um LIMITE CONTRATADO.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

        if (configuracao_limite_contratado == 1) {

            if (qtd_limite_contratado == '') {
                
                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro').append('É necessário definir a QUANTIDADE DO LIMITE CONTRATADO.');
                $('.msg_erro').show();

                // Volto até o topo da tela para chamar a atenção
                $('html, body').animate({ scrollTop: 0 }, 'fast'); 

                return false;

            }

        }*/

        if (validade_contratual_meses == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('É necessário definir a VALIDADE DO CONTRATO em número de meses.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }
        /*
         ###########################################
         # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
         ###########################################
        */

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/editar'); ?>",
            data: { 
                "cod_contrato_pessoa_juridica_plano": '<?php echo \Crypt::encrypt($contrato->cod_contrato_pessoa_juridica_plano); ?>',
                "cod_convenio": cod_convenio,
                "cod_plano": cod_plano,
                "cod_plano_antigo": <?php echo $contrato->planos->cod_plano; ?>,
                "numero_contrato_pj": numero_contrato_pj,
                "data_inclusao": data_inclusao,
                "primeiro_vencimento": primeiro_vencimento,
                "cod_vendedor": cod_vendedor,
                "tipo_cobranca": tipo_cobranca,
                "tipo_cobranca_antigo": '<?php echo $contrato->tipo_cobranca; ?>',
                "cobrar_taxa_boleto": cobrar_taxa_boleto,
                "cobrar_inclusao_dependente": cobrar_inclusao_dependente,
                "configuracao_taxa_consulta": configuracao_taxa_consulta,
                //"configuracao_limite_contratado": configuracao_limite_contratado,
                //"qtd_limite_contratado": qtd_limite_contratado,
                "validade_contratual_meses": validade_contratual_meses
            },
            beforeSend: function() { 

                // Limpa valor da DIV
                $('.msg_erro').html('');

                // Oculta DIV
                $('.msg_erro').hide();

                // Mostra mensagem processando...
                $('#msg_processando').show();

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Coloco mensagem dentro da div de erros e exibo a div de erros
                    $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                    $('.msg_erro').append(response.erro);
                    $('.msg_erro').show();  

                    // Volto até o topo da tela para chamar a atenção
                    $('html, body').animate({ scrollTop: 0 }, 'fast');                

                } else if (response.status == 'sucesso') {

                    // Alerta sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Dados atualizados com sucesso.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() { // Evento após o alert desaparecer
                            
                            // Checa qual deve ser o redirecionamento
                            if (response.redirecionar_para == 'visualizarcontrato') {

                                // Redireciona
                                window.location.replace("<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/visualizar'); ?>/" + response.cod_contrato);

                            } else if (response.redirecionar_para == 'gerenciarmembros') {

                                // Redireciona
                                window.location.replace("<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/gerenciar-membros'); ?>/" + response.cod_contrato);

                            }

                        }
                    });

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Oculta mensagem 'processando...
                $('#msg_processando').hide();

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro').append('Falha na requisição. Atualize a página e tente novamente.');
                $('.msg_erro').show();

                // Volto até o topo da tela para chamar a atenção
                $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            }
        });

    }).on('dblclick', function(e) {

        // Previnindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });

}); 	
</script>

@append