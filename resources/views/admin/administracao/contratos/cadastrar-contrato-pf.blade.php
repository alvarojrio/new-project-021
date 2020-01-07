@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Clientes | Pessoa Física | Contratos
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-fisica-contrato-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Contrato para Pessoa Física</h3>
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
                                        <option data-autogestao="{{ $convenio->auto_gestao }}" value="{{ $convenio->cod_convenio }}"><?php echo mb_strtoupper($convenio->nome_convenio); ?></option>
                                    <?php 
                                    endforeach;
                                    ?>
                                </select>

                            </div>

                            <div class="form-group col-md-6 col-xs-12">
                                
                                <label class="control-label">Plano <span class="required-red">*</span></label>
                                <select class="form-control input-sm plano" name="cod_plano" id="cod_plano">
                                    <option value="">Selecione um convênio</option>
                                </select>
                                
                                <!-- Input onde são guardados JSON de serviços relacionados ao plano selecionado -->
                                <input type="hidden" id="servicos_do_plano" name="servicos_do_plano" />

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row hiddenrow_plano_1" style="display: none;">

                            <div class="form-group col-md-4 col-xs-12">
                                
                                <label class="control-label">Nº do contrato <span class="required-red">*</span></label>
                                <input type="text" id="numero_contrato_pf" name="numero_contrato_pf" class="form-control input-sm" autocomplete="off" />

                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                
                                <label class="control-label">Data de inclusão <span class="required-red">*</span></label>
                                <input type="text" id="data_inclusao" name="data_inclusao" class="form-control input-sm" placeholder="00/00/0000" autocomplete="off" />

                            </div>

                            <div class="form-group col-md-2 col-xs-12">
                                
                                <label class="control-label">Primeiro pagamento <span class="required-red">*</span></label>
                                <input type="text" id="primeiro_vencimento" name="primeiro_vencimento" class="form-control input-sm" placeholder="00/00/0000" autocomplete="off" />

                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                
                                <label class="control-label">Vendedor <span class="required-red">*</span></label>
                                <select class="form-control input-sm" name="cod_vendedor" id="cod_vendedor">
                                    <option value="">Selecione</option>
                                    <?php
                                    if (count($vendedores) > 0) {
                                    ?>

                                        <?php
                                        foreach ($vendedores as $vendedor) :
                                        ?>
                                            <option value="<?php echo $vendedor->cod_funcionario; ?>"><?php echo mb_strtoupper($vendedor->nome); ?></option>
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
                                    <option value="boleto">Boleto</option>
                                    <option value="cobrador">Cobrador</option>
                                    <option value="unidade">Pagar na unidade</option>
                                </select>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row hiddenrow_cobrador_1" style="display: none;">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Cobrador <span class="required-red">*</span></label>
                                <select class="form-control input-sm" name="cod_cobrador" id="cod_cobrador">
                                    <option value="">Selecione</option>
                                    <?php
                                    if (count($cobradores) > 0) {
                                    ?>

                                        <?php
                                        foreach ($cobradores as $cobrador) :
                                        ?>
                                            <option value="<?php echo $cobrador->cod_funcionario; ?>"><?php echo mb_strtoupper($cobrador->nome); ?></option>
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

                        <!-- INICIO LINHA -->
                        <div class="row hiddenrow_boleto_1" style="display: none;">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Cobrar taxa de boleto ? <span class="required-red">*</span></label>
                                                            
                                <br />

                                <input type="radio" name="cobrar_taxa_boleto[]" id="cobrar_taxa_boleto" value="1" checked="checked">
                                <label class="control-label">Sim</label>
                            
                                <input type="radio" name="cobrar_taxa_boleto[]" id="cobrar_taxa_boleto" value="0">
                                <label class="control-label">Não</label>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Cobrar por inclusão de dependente ? <span class="required-red">*</span></label>
                                                            
                                <br />

                                <input type="radio" name="cobrar_inclusao_dependente[]" id="cobrar_inclusao_dependente" value="1" checked="checked">
                                <label class="control-label">Sim</label>
                            
                                <input type="radio" name="cobrar_inclusao_dependente[]" id="cobrar_inclusao_dependente" value="0">
                                <label class="control-label">Não</label>

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <label class="control-label">Cobrar taxa por consulta ? <span class="required-red">*</span></label>
                                                            
                                <br />

                                <input type="radio" name="cobrar_taxa_consulta[]" id="cobrar_taxa_consulta" value="1" checked="checked">
                                <label class="control-label">Sim</label>
                            
                                <input type="radio" name="cobrar_taxa_consulta[]" id="cobrar_taxa_consulta" value="0">
                                <label class="control-label">Não</label>

                            </div>

                        </div>
                        <!-- FIM LINHA -->
                        
                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-md-3 col-xs-12">
                                
                                <label class="control-label">Validade contratual (meses) <span class="required-red">*</span></label>
                                <input type="text" id="validade_contratual_meses" name="validade_contratual_meses" class="form-control input-sm" autocomplete="off" />

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA CONFIGURAÇÕES DE COBRANÇA ##################### -->

                <!-- ##################### INICIO CAIXA MEMBROS DO CONTRATO ##################### -->
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">RESPONSÁVEL & MEMBROS DO CONTRATO</div>
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-12 col-xs-12">
                                
                                <!-- DIV COM TEXTO PARA O CASO DE NENHUM MEMBRO TER SIDO SELECIONADO -->
                                <div id="texto_sem_pessoas" class="text-danger" style="margin-bottom: 10px;">
                                NENHUMA PESSOA FOI SELECIONADA COMO MEMBRO AINDA.
                                </div>
                                
                                <!-- DIV QUE ENGLOBA AS CAIXAS DE MEMBROS -->
                                <div id="espaco_caixa_membros" style="margin-bottom: 10px;">
                                    
                                    <!-- DIV ONDE SERÃO CARREGADAS DINAMICAMENTE AS CAIXAS DE MEMBROS -->
                                    <div class="row row_espaco_caixa_membros"></div>

                                </div>

                                <div class="clearfix"></div>

                                <!-- INICIO PANEL BUSCAR PESSOAS -->
                                <div class="panel panel-info">
                                    <div class="panel-heading" data-toggle="collapse" href="#collapse1">
                                        <span data-toggle="collapse" href="#collapse1">Buscar Pessoa <small>(Clique para expandir)</small></span>
                                        <span class="pull-right">
                                            <a data-toggle="collapse" href="#collapse1">
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                        </span>
                                    </div>

                                    <div id="collapse1" class="panel-collapse collapse muda-collapse">

                                        <div class="panel-body">

                                            <!-- INICIO LINHA -->
                                            <div class="row">
                                                
                                                <div class="form-group col-md-2 col-xs-12">
                                                
                                                    <label class="control-label">CPF</label>
                                                    <input type="text" id="cpf_busca" name="cpf_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o CPF" />
                                                                                                                  
                                                </div>

                                                <div class="form-group col-md-8 col-xs-12">
                                                
                                                    <label class="control-label">Nome</label>
                                                    <input type="text" id="nome_busca" name="nome_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o Nome" />
                                                                                                                  
                                                </div>

                                                <div class="form-group col-md-2 col-xs-12">
                                                    
                                                    <label class="control-label">Data de Nascimento</label>
                                                    <input type="text" id="data_nascimento_busca" name="data_nascimento_busca" class="form-control input-sm" autocomplete="off" placeholder="00/00/0000" />
                                                                                                                  
                                                </div>

                                            </div>
                                            <!-- FIM LINHA -->

                                            <!-- INICIO LINHA -->
                                            <div class="row">

                                                <div class="form-group col-xs-12">
                                                
                                                    <a href="javascript:void(null);" class="btn btn-info pull-right btn_buscar_pf">
                                                        <i class="fas fa-search"></i> Buscar
                                                    </a>

                                                </div>

                                            </div>
                                            <!-- FIM LINHA -->

                                            <!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                                            <div class="box_alerta_carregando" style="display: none;">
                                                Processando...
                                            </div>
                                            <!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->

                                            <!-- INICIO CAIXA DE ALERTA DE ERRO -->
                                            <div class="box_alerta_erro" style="display: none;">

                                                <h4>Atenção</h4>

                                                Não foi possivel localizar uma pessoa com as informações fornecidas. 

                                                <div class="clearfix"></div>

                                            </div>
                                            <!-- FIM CAIXA DE ALERTA DE ERRO -->

                                            <!-- INICIO PANEL RESULTADO DA BUSCA -->
                                            <div class="panel panel-default panel-resultado-busca-pf" style="display: none;">
                                                <div class="panel-heading">Resultado da Busca</div>
                                                <div class="panel-body">
                                                
                                                    <!-- INICIO DIV.TABLE-RESPONSIVE -->
                                                    <div class="table-responsive">
                                                            
                                                        <table class="minha_datatable_pf table table-striped table-hover table-bordered tabela">
                                                        <thead>
                                                        <tr>
                                                            <th>CPF</th>
                                                            <th>Nome</th>
                                                            <th>Data Nascimento</th>
                                                            <th>Contrato Atual</th>
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

                                    </div>
                                </div>
                                <!-- FIM PANEL BUSCAR PESSOAS -->


                                <!-- INICIO PANEL CADASTRAR PESSOAS -->
                                <div class="panel panel-info panel_cadastrar_pessoas">
                                    <div class="panel-heading" data-toggle="collapse" href="#collapse2">
                                        <span data-toggle="collapse" href="#collapse2">Cadastrar Pessoa <small>(Clique para expandir)</small></span>
                                        <span class="pull-right">
                                            <a data-toggle="collapse" href="#collapse2">
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                        </span>
                                    </div>
                                    
                                    <div id="collapse2" class="panel-collapse collapse muda-collapse">
                                        <div class="panel-body">
                                            
                                            <!-- Renderizo View Component -->
                                            @render(drclub\Http\ViewComponents\CadastrarPessoaFisicaComponent::class, 'cadastrarcontrato')

                                        </div>
                                    </div>
                                </div>
                                <!-- FIM PANEL CADASTRAR PESSOAS -->

                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA MEMBROS DO CONTRATO ##################### -->

                <br />

                <hr />
                
                <!-- BOTÃO PARA SALVAR FORMULARIO -->
                <a class="btn btn-md btn-success pull-right" id="btn_salvar_contrato" href="javascript:void(null);">
                    <i class="fa fa-save"></i> Salvar
                </a>

                <!-- BOTÃO PARA VOLTAR -->
                <a href="<?php echo url(app('prefixo') . '/painel/clientes'); ?>" class="btn btn-default pull-right">
                    <i class="fas fa-arrow-circle-left"></i> Voltar
                </a>
                
                <!-- DIV DA MENSAGEM 'PROCESSANDO' -->
                <div id="msg_processando_contrato">
                    <div id="loading_spinner_processando_contrato">
                        <img src="<?php echo asset('images/loading_spinner.gif'); ?>" alt="processando" />
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>



<!-- *************************************
 #
 # INICIO MODAL VER PESSOA FISICA RÁPIDO
 # 
****************************************** -->
<div class="modal fade modal_verpf_rapido" id="modal-verpf-rapido" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title">Visualizar Cliente Pessoa Física</h2>
            </div>
                                                                            
            <div class="modal-body"></div>  

            <div class="modal-footer">
                <a href="javascript:void(null);" class="btn btn-md btn-default" data-dismiss="modal">Fechar</a>
            </div>
      
        </div>
    </div>
</div>
<!-- **********************************
 #
 # FIM MODAL VER PESSOA FISICA RÁPIDO
 # 
*************************************** -->

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativação de máscaras de campos 
    $('#cpf_busca').mask('000.000.000-00');

    // Garante que apenas números sejam digitados no campo cpf_busca
    $(document).on('keyup', '#cpf_busca', function() {
        this.value = this.value.replace(/[^0-9]/g,'');
    });

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




    /*********************************************
     #
     # Modifica o icone dos paineis .muda-collapse de acordo com o status atual deles
     # 
    **********************************************/ 
    $('.muda-collapse').on('show.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    });

    $('.muda-collapse').on('hide.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    });




    // Defino verificação de tecla apertada quando o foco estiver dentro de um input de busca de pessoas. Caso a tecla apertada seja ENTER, executar ação padrão do botão '.btn_buscar_pf'
    $(document).on('keypress', '#cpf_busca, #nome_busca, #data_nascimento_busca', function(event) {

        // Checa se a tecla apertada foi a ENTER
        if (event.which == 13) {

            // Simulo o evento 'click' no botão 'buscar' para que a busca por dados seja iniciada
            $('.btn_buscar_pf').trigger('click');

        }

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #cod_convenio
     # Ao selecionar um convênio, carrega os planos relacionados no combobox #cod_plano
     # 
    *************************************/ 
    $(document).on('change', '#cod_convenio', function() { 
        
        // Limpo conteúdo do input hidden
        $('#servicos_do_plano').val('');

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
     # Aplicando função ao evento change do combobox #cod_plano
     # Ao selecionar um plano, guarda os serviços relacionados a ele num input hidden
     # 
    *************************************/ 
    $(document).on('change', '#cod_plano', function() { 

        // Capto valor selecionado
        var valor_selecionado = $(this).find(':selected').val();

        // Checo se algo foi selecionado no elemento
        if (valor_selecionado > 0) {

            $.ajax({
                cache: false,
                type: 'POST',
                url: "<?php echo url(app('prefixo') . '/painel/planos/listar-servicos-plano'); ?>",
                data: { 'cod_plano': valor_selecionado },        
                dataType: 'json',
                beforeSend: function() { 
                    // Nothing here
                },
                complete: function(response) {
                    // Nothing here
                },
                success: function(result) {

                    // Checo informações retornadas
                    if (result == 'nada-encontrado') {

                        //console.log('Nenhum plano encontrado');

                    } else if (result == 'cod-plano-vazio') {

                        //console.log('Codigo do plano vazio');

                    } else {

                        // Limpo conteúdo do input hidden
                        $('#servicos_do_plano').val('');

                        // Guardo JSON de serviços dentro de input hidden para uso posterior
                        $('#servicos_do_plano').val( JSON.stringify(result) );

                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //console.log(xhr.responseText);
                }
            });

        } else {

            // Limpo conteúdo do input hidden
            $('#servicos_do_plano').val('');

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

        // Checo se o valor selecionado foi 'cobrador'
        if (valor_selecionado == 'cobrador') {

            // Exibo linhas secretas do formulario
            $('.hiddenrow_cobrador_1').fadeIn("slow");

            // Oculto linhas secretas do formulario
            $('.hiddenrow_boleto_1').hide();

        } else if (valor_selecionado == 'boleto') { // Checo se o valor selecionado foi 'boleto'

            // Exibo linhas secretas do formulario
            $('.hiddenrow_boleto_1').fadeIn("slow");

            // Oculto linhas secretas do formulario
            $('.hiddenrow_cobrador_1').hide();

        } else {

            // Oculto linhas secretas do formulario
            $('.hiddenrow_cobrador_1').hide();
            $('.hiddenrow_boleto_1').hide();

        }

    });




    /************************************
     #
     # Aplicando função no botão BUSCAR PESSOA
     # Busca pessoa através dos parametros informados e exibe resultado numa datatable gerada dinamicamente
     # 
    *************************************/ 
    $(document).on('click', '.btn_buscar_pf', function(event) {

        event.preventDefault();

        // Capto valores dos campos
        var cpf_busca = $('#cpf_busca').val();
        var nome_busca = $('#nome_busca').val();
        var data_nascimento_busca = $('#data_nascimento_busca').val();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/buscar-para-contrato'); ?>",
            data: { 
                "cpf_busca": cpf_busca,
                "nome_busca": nome_busca,
                "data_nascimento_busca": data_nascimento_busca
            },
            beforeSend: function() { 

                // Oculta DIV
                $('.panel-resultado-busca-pf').hide();
                $('.box_alerta_erro').hide(); 

                // Revela DIV
                $('.box_alerta_carregando').show(); 

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV
                    $('.box_alerta_erro').show();                     

                } else {
                
                    // Tabela de dados
                    tabela_pf = $('.minha_datatable_pf').DataTable({
                        destroy: true, // Apaga datatable atual, se existir
                        data: response,                                        
                        stateSave: false,
                        deferRender: false,
                        info: true,
                        ordering: false,
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
                            { "data": "cpf", "name": "cpf", "width": "10%", "searchable": true, "sortable": true },
                            { "data": "nome", "name": "nome", "width": "33%", "searchable": true, "sortable": true },
                            { "data": "data_nascimento", "name": "data_nascimento", "width": "10%", "searchable": false, "sortable": true },
                            { "data": "situacao_contrato", "name": "situacao_contrato", "width": "13%", "searchable": true, "sortable": true },
                            { "data": "btn_ver_pessoa", "name": "btn_ver_pessoa", "width": "2%", "searchable": false, "sortable": false },
                            { "data": "btn_add_membro", "name": "btn_add_membro", "width": "2%", "searchable": false, "sortable": false }
                        ],
                        "fnDrawCallback": function(oSettings) { 

                            // Ativação de TOOLTIPS, se existirem
                            $('[data-toggle="tooltip"]').tooltip({ container: 'body' });

                        } 
                    });

                    // Revela DIV
                    $('.panel-resultado-busca-pf').show();

                }

            },
            complete: function(response) {
                // Oculta DIV
                $('.box_alerta_carregando').hide(); 
            },
            error: function(response, thrownError) {
                // Nothing here
            }
        });

    });

    // Aplicando função no evento KEYPRESS do botão BUSCAR PESSOA
    $(document).on('keypress', '.btn_buscar_pf', function(event) {

        // Verificamos se foi apertada a tecla ENTER através do keycode
        if (event.keyCode == 13) {

            // Indico que deve ser iniciada a função aplicada no evento CLICK
            $(this).trigger('click');

        }

    });



    
    /************************************
     #
     # Aplicando função no botão VER PESSOA FISICA
     # Carrego JANELA MODAL de visualização rápida de pessoa
     # Obs: Para habilitar esta função, descomente este código e então vá até o PessoaFisicaController. No método postBuscarPessoaFisicaParaContrato() deixe descomentado apenas o $btn_ver_pessoa referente a janela modal, comentando o que não for ser utilizado.
     # 
    *************************************/
    /*$(document).on('click', '.btn_ver_pessoa', function(e) {

        e.preventDefault();

        // Resetando todos os possiveis Toast
        $.toast().reset('all');

        // Recupero CODIGO DA PESSOA através de data-attribute no botão
        var codigo_pessoa_crypt = $(this).data('codigo-pessoa-crypt'); 

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "GET",
            url: "<?php //echo url(app("prefixo") . '/painel/clientes/pessoafisica/visualizar-rapido'); ?>/" + codigo_pessoa_crypt,
            beforeSend: function() { 
                // Nothing here
            },
            success: function(result_page) {
                
                // Carrega conteúdo dentro do HTML do modal
                $('#modal-verpf-rapido div.modal-body').html(result_page);

                // Abre modal
                $('#modal-verpf-rapido').modal('toggle');

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Não foi possivel visualizar esta pessoa.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 2000, // em milisegundos
                    allowToastClose: true
                }); 

                return false; 

            }
        });

    });*/




    /************************************
     #
     # Aplicando função no botão ADICIONAR PESSOA COMO MEMBRO
     # Busca no banco os dados da pessoa selecionada e cria uma DIV .caixa_membro para esta pessoa dentro da lista de membros
     # 
    *************************************/ 
    $(document).on('click', '.btn_add_membro', function(e) {

        e.preventDefault();

        // Limpa valor da DIV
        $('.msg_erro').html('');

        // Oculta DIV
        $('.msg_erro').hide();

        // Resetando todos os possiveis Toast
        $.toast().reset('all');

        // Recupero CODIGO DA PESSOA através de data-attribute no botão
        var codigo_pessoa = $(this).data('codigo-pessoa'); 

        // Procuro serviços possiveis dentro de input hidden #servicos_do_plano (as informações foram salvas dentro dele previamente)
        var servicos_possiveis = $('#servicos_do_plano').val();

        // Checo se foi retornado / localizado um código de pessoa
        if (codigo_pessoa == '') {

            // Mostra mensagem de erro
            $.toast({
                heading: 'Erro',
                text: 'Não foi possivel selecionar esta pessoa como membro. Aguarde alguns instantes e tente novamente ou atualize a página.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: 2000, // em milisegundos
                allowToastClose: true,
                loaderBg: '#7c0000'
            });

            return false;

        }

        // Checo se já existe uma caixa para esta pessoa na lista de membros
        if ($('#espaco_caixa_membros > .row').children('div[data-codigo-pessoa="' + codigo_pessoa + '"]').length > 0) {  
            
            // Mostra mensagem de erro
            $.toast({
                heading: 'Erro',
                text: 'Esta pessoa já foi inserida na lista de membros do contrato.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: 2000, // em milisegundos
                allowToastClose: true,
                loaderBg: '#7c0000'
            });

            return false;

        }

        // Checo se existem serviços possiveis para listar
        /*if (servicos_possiveis == '') {

            // Coloco mensagem dentro da div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('Antes de selecionar os membros, você deve definir o plano que será utilizado.');

            // Exibo div de erros
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }*/
        if(servicos_possiveis != ''){
            
            // Tento efetuar conversão de JSON
            try {

                // Converto dados para objeto javascript
                servicos_possiveis = JSON.parse(servicos_possiveis);

            } catch (err) {

                // Coloco mensagem dentro da div de erros
                $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro').append('Antes de selecionar os membros, você deve definir o plano que será utilizado.');

                // Exibo div de erros
                $('.msg_erro').show();

                // Volto até o topo da tela para chamar a atenção
                $('html, body').animate({ scrollTop: 0 }, 'fast'); 

                return false;

            }       

            // Checo se a variavel é um array
            if ($.isArray(servicos_possiveis) == false) {

                // Coloco mensagem dentro da div de erros
                $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro').append('Antes de selecionar os membros, você deve definir o plano que será utilizado.');

                // Exibo div de erros
                $('.msg_erro').show();

                // Volto até o topo da tela para chamar a atenção
                $('html, body').animate({ scrollTop: 0 }, 'fast'); 

                return false;

            }
            
            
        }
        

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/buscar-por-codigo'); ?>",
            data: { 
                "codigo_pessoa": codigo_pessoa
            },
            beforeSend: function() { 
                // Nothing here
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
                        hideAfter: 5000, // em milisegundos
                        allowToastClose: true,
                        loaderBg: '#7c0000'
                    }); 

                    return false;              

                } else if (response.status == 'sucesso') {

                    // Preenchendo variável de conteúdo dinâmico
                    var conteudo_caixa_membro = '';
                    conteudo_caixa_membro += '<div class="col-md-4 col-sm-4 col-xs-12 caixa_membro" data-codigo-pessoa="' + codigo_pessoa + '" style="display: none;">';
                    conteudo_caixa_membro += '<div class="x_panel tile" style="border-color: #73879C;">';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<div class="form-group">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">CPF: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12">' + response.cpf_pessoa + '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<div class="form-group">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Nome: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12"><span class="membro_nome">' + response.nome_pessoa + '</span></div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<div class="form-group">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Data Nasc.: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12">' + response.data_nascimento_pessoa + '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<div class="form-group">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Vínculo:</label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12">';
                    conteudo_caixa_membro += '<select class="form-control input-sm" name="vinculo" id="vinculo">';
                    conteudo_caixa_membro += '<option value="">Selecione</option>';

                    if (response.opcoes_vinculo == 'apenas_rf') {

                        conteudo_caixa_membro += '<option value="3">Resp. Financeiro</option>';

                    } else if (response.opcoes_vinculo == 'apenas_membro') {

                        conteudo_caixa_membro += '<option value="1">Membro</option>';

                    } else {

                        conteudo_caixa_membro += '<option value="1">Membro</option>';
                        conteudo_caixa_membro += '<option value="2">Membro e Resp. Financeiro</option>';
                        conteudo_caixa_membro += '<option value="3">Resp. Financeiro</option>';

                    }

                    conteudo_caixa_membro += '</select>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-3 col-xs-12">Serviços:</label>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<div class="col-md-12 col-xs-12">';

                    if(servicos_possiveis != ''){
                        
                        // Faço loop pelos serviços possiveis
                        $.each(servicos_possiveis, function(index, value) {

                            conteudo_caixa_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + value['cod_servico'] + '">';
                            conteudo_caixa_membro += ' ' + value['nome_servico'] + ' <br />';

                        });
                    }
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<a class="btn btn-sm btn-danger pull-right" id="btn_remove_membro" style="margin-top: 5px;" href="javascript:void(null);">';
                    conteudo_caixa_membro += '<i class="fa fa-times-circle"></i> Remover';
                    conteudo_caixa_membro += '</a>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';

                    // Oculta mensagem de lista de membros vazia
                    $('#texto_sem_pessoas').hide();

                    // Adiciona nova caixa de membro (e uma pequena animação de fade)
                    //$(conteudo_caixa_membro).appendTo('#espaco_caixa_membros > .row').fadeIn('slow');
                    $(conteudo_caixa_membro).appendTo('.row_espaco_caixa_membros').fadeIn('slow');

                    // Rola a página até o elemento criado
                    $('html, body').animate({
                        scrollTop: $('#espaco_caixa_membros .caixa_membro:last').offset().top
                    }, 50);

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Não foi possivel selecionar esta pessoa como membro.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 2000, // em milisegundos
                    allowToastClose: true,
                    loaderBg: '#7c0000'
                }); 

                return false; 

            }
        });
        
    }); 




    /************************************
     #
     # Aplicando função no botão REMOVER MEMBRO
     # Remove DIV .caixa_membro da lista de membros do contrato
     # 
    *************************************/ 
    $(document).on('click', '#btn_remove_membro', function(e) {

        e.preventDefault(); 

        // Remove caixa de membro
        $(this).closest('.caixa_membro').remove();

        // Conto o total atual de caixas de membros
        var total_caixas_membros = $('#espaco_caixa_membros > .row').children().size(); 

        if (total_caixas_membros < 1) {

            // Exibe mensagem de lista de membros vazia
            $('#texto_sem_pessoas').show();

        }

    });




    /************************************
     #
     # Aplicando função no botão SALVAR CONTRATO
     # 
    *************************************/ 
    $(document).on('click', '#btn_salvar_contrato', function(e) {

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
        var numero_contrato_pf = $('#numero_contrato_pf').val();
        var data_inclusao = $('#data_inclusao').val();
        var primeiro_vencimento = $('#primeiro_vencimento').val();
        var cod_vendedor = $('#cod_vendedor option:selected').val();
        var tipo_cobranca = $('#tipo_cobranca option:selected').val();
        var cobrar_taxa_boleto = $('#cobrar_taxa_boleto:checked').val();
        var cod_cobrador = $('#cod_cobrador option:selected').val();
        var cobrar_inclusao_dependente = $('#cobrar_inclusao_dependente:checked').val();
        var cobrar_taxa_consulta = $('#cobrar_taxa_consulta:checked').val();
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

        if (numero_contrato_pf == '') {
            
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

        } else if (tipo_cobranca == 'cobrador') {

            if (cod_cobrador == '') {
            
                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro').append('O campo COBRADOR não foi preenchido corretamente.');
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

        if (cobrar_taxa_consulta == '') {
            
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('É necessário definir se haverá COBRANÇA de taxa por consulta.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast'); 

            return false;

        }

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

        // Declaração de variaveis
        var form_contrato_valido = true;
        var msg_erro_contrato;
        var ja_existe_rf = false;
        var membros_pai = new Array; // Crio um array
        var membros_filho = {}; // Crio um objeto
        var servicos_selecionados = new Array; // Crio um array

        // Loop por todas as CAIXAS DE MEMBROS
        $('.row_espaco_caixa_membros').children('.caixa_membro').each(function(i, v) {

            // Reuno os dados da caixa atual do loop e coloco num objeto javascript
            membros_filho['cod_pessoa'] = $(v).data('codigo-pessoa'); // Recupero CODIGO DA PESSOA através de data-attribute na div
            membros_filho['vinculo'] = $('#vinculo option:selected', this).val();

            // Faço loop por possiveis checkboxes marcados
            $(this).find('input[name="servicos_membro[]"]:checked').each(function() {
                servicos_selecionados.push($(this).val());
            });

            membros_filho['servicos_selecionados'] = (servicos_selecionados.length == 0) ? '' : servicos_selecionados; // Checo tamanho do array de serviços com o length

            /*
             ###########################################
             # INICIO VALIDAÇÃO EXTRA
             ###########################################
            */
            if (membros_filho['vinculo'].length === 0) {
                // Sinaliza erro
                form_contrato_valido = false;
                // Monto mensagem de erro
                msg_erro_contrato = 'É necessário informar o VÍNCULO desejado para o membro <i>' + $(this).find('.membro_nome').html() + '</i>.';
                // Sai do loop
                return false;
            }

            if ((ja_existe_rf) && (membros_filho['vinculo'] == 2 || membros_filho['vinculo'] == 3)) {
                // Sinaliza erro
                form_contrato_valido = false;
                // Monto mensagem de erro
                msg_erro_contrato = 'Mais de um membro foi selecionado como RESPONSÁVEL FINANCEIRO. Reveja os vínculos selecionados na lista de membros.';
                // Sai do loop
                return false;
            }

            /*if (membros_filho['servicos_selecionados'].length === 0 && membros_filho['vinculo'] != 3) {
                // Sinaliza erro
                form_contrato_valido = false;
                // Monto mensagem de erro
                msg_erro_contrato = '- É necessário informar os SERVIÇOS DESEJADOS para o membro <i>' + $(this).find('.membro_nome').html() + '</i>.';
                // Sai do loop
                return false;
            }*/
            /*
             ###########################################
             # FIM VALIDAÇÃO EXTRA
             ###########################################
            */

            // Coloco o Objeto filho dentro do Array pai
            membros_pai.push(membros_filho);

            // Checo se foi escolhido uma das duas opções envolvendo 'responsável financeiro'
            if (membros_filho['vinculo'] == 2 || membros_filho['vinculo'] == 3) {

                // Sinalizo que alguém foi escolhido como responsável financeiro
                ja_existe_rf = true;

            }

            // Limpo variaveis para futuras utilizações
            membros_filho = {};
            servicos_selecionados = new Array;

        }); // Fecho loop pelas caixas de membros

        // Checo se houve erro no preenchimento dos campos dos MEMBROS
        if (form_contrato_valido == false) {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append(msg_erro_contrato);
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast');  

            // Travo execução do resto da função
            return false;

        }

        // Checo se a lista de membros foi definida
        if (membros_pai.length === 0) {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('Antes de prosseguir, você precisa definir a lista de MEMBROS DO CONTRATO.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast');  

            // Travo execução do resto da função
            return false;

        }

        // Checo se pelo menos 1 pessoa foi definida como responsável financeiro
        if (ja_existe_rf == false) {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro').append('Antes de prosseguir, você precisa definir um RESPONSÁVEL FINANCEIRO na lista de MEMBROS DO CONTRATO.');
            $('.msg_erro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast');  

            // Travo execução do resto da função
            return false;

        }

        // Converto Array para JSON
        membros_em_json = JSON.stringify(membros_pai, null, 2); 

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/cadastrar'); ?>",
            data: { 
                "cod_convenio": cod_convenio,
                "cod_plano": cod_plano,
                "numero_contrato_pf": numero_contrato_pf,
                "data_inclusao": data_inclusao,
                "primeiro_vencimento": primeiro_vencimento,
                "cod_vendedor": cod_vendedor,
                "tipo_cobranca": tipo_cobranca,
                "cobrar_taxa_boleto": cobrar_taxa_boleto,
                "cod_cobrador": cod_cobrador,
                "cobrar_inclusao_dependente": cobrar_inclusao_dependente,
                "cobrar_taxa_consulta": cobrar_taxa_consulta,
                "validade_contratual_meses": validade_contratual_meses,
                "membros_em_json": membros_em_json
            },
            beforeSend: function() { 

                // Limpa valor da DIV
                $('.msg_erro').html('');

                // Oculta DIV
                $('.msg_erro').hide();

                // Mostra mensagem processando...
                $('#msg_processando_contrato').show();

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando_contrato').hide();

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
                        text: 'Cadastrado com sucesso.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 2500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() { // Evento após o alert desaparecer
                            
                            // Redireciona
                            window.location.replace("<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/visualizar'); ?>/" + response.cod_contrato);

                        }
                    });

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Oculta mensagem 'processando...
                $('#msg_processando_contrato').hide();

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