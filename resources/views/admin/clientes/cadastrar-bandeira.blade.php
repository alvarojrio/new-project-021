@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Bandeiras | Cadastrar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('css/administracao/categoriasfinanceiras/categoria-financeira-cadastrar.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('bandeiras-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Bandeira</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <form method="POST" id="cadastro" name="cadastro" enctype="multipart/form-data">
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

                        <div class="col-xs-12">
                            
                            <div class="row">
                                
                                <div class="panel panel-default"> 
                                    
                                    <div class="panel-heading"><i class="far fa-flag"></i> Dados da bandeira</div>                                
                                    
                                    <div class="panel-body">
                                       
                                        <div class="col-xs-12">
                                            
                                            <div class="row">
                                                
                                                <div class="col-sm-6 col-xs-12">
                                                    
                                                    <div class="form-group">
                                                        
                                                        <label class="control-label">Nome da Bandeira <span class="required-red">*</span></label>
                                                        
                                                        <input type="text" class="form-control" name="nome_bandeira" id="nome_bandeira" placeholder="Nome da Bandeira" autocomplete="off" <?php if (!empty(old('nome_bandeira'))) { ?>value="<?php echo old('nome_bandeira'); ?>"<?php } ?>>
                                                    
                                                    </div>
                                                
                                                </div>
                                                
                                                <div class="col-sm-6 col-xs-12">
                                                    
                                                    <div class="form-group">
                                                        
                                                        <label class="control-label">Operadora</label>
                                                        
                                                        <select class="form-control" name="cod_operadora" id="cod_operadora">
                                                            
                                                            <option value="0">Selecione</option>
                                                            <?php foreach($operadoras as $o): ?>
                                                            
                                                                <option value="<?php echo $o->cod_operadora_cartao ?>"><?php echo $o->nome_operadora_cartao ?></option>
                                                                
                                                            <?php endforeach; ?>
                                                        </select>
                                                        
                                                    </div>
                                                
                                                </div>
                                            
                                            </div>
                                            
                                            <div class="row">
                                                
                                                <div class="col-xs-12">
                                                    
                                                    <div class="form-group col-lg-1">
                                                        
                                                        <input type="radio" name="tipo_bandeira"  class="tipo_bandeira" id="radio_debito" value="1"/> <span class="text-dark-blue"> DÉBITO </span><br/>
                                                    
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-1">
                                                        
                                                        <input type="radio" name="tipo_bandeira" class="tipo_bandeira" id="radio_credito" value="2"/> <span class="text-dark-blue"> CRÉDITO </span><br/>
                                                    
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-1">
                                                        
                                                        <input type="radio" name="tipo_bandeira"  class="tipo_bandeira" id="radio_ambos" value="3"/> <span class="text-dark-blue"> AMBOS</span><br/>
                                                    
                                                    </div>
                                                
                                                </div>                                              
                                            
                                            </div>
                                        
                                        </div>    
                                    
                                    </div>

                                    <br/>

                                </div>
                                
                            </div>
                            
                            <div class="row" id="credito">
                                
                                <!-- INICIO PANEL-DEFAULT -->						
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading"><i class="far fa-credit-card"></i> Configurações de crédito</div>
                                    <!-- INICIO PANEL-BODY -->							
                                    
                                    <div class="panel-body">                                        
                                        
                                        <div class="row">
                                            
                                            <div class="col-xs-12">
                                                
                                                <!-- <label class="control-label">Possui taxa de abatimento para crédito ? <span class="required-red">*</span></label> -->
                                                
                                                <div class="col-xs-12 hidden">
 
                                                    <div class="form-group col-lg-1">
                                                        <input type="radio" name="possui_taxa_abatimento_credito" class="possui_taxa_abatimento_credito" id="possui_taxa_abatimento_credito_sim" value="1" checked="checked"/> <span class="text-dark-blue"> SIM </span><br/>
                                                    </div>
                                                        
                                                    <div class="form-group col-lg-1">
                                                        <input type="radio" name="possui_taxa_abatimento_credito"  class="possui_taxa_abatimento_credito" id="possui_taxa_abatimento_credito_nao" value="0"/> <span class="text-dark-blue"> NÃO </span><br/>
                                                    </div>
                                                    
                                                </div> 
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <!-- DIV ONDE APARECE FORM DE SUB CATEGORIA FINANCEIRA -->
                                        <div class="col-sm-6 div_parcelas_credito"></div>
                                        
                                        <div class="clearfix"></div>
                                        
                                        <!-- 
                                        <div class="col-md-12 col-xs-12" id="aviso_btn">
                                            
                                            <ul class="list-group">
                                                
                                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                    Para habilitar o botão e adicionar taxa de abatimento em cada parcela será necessário marcar no campo possui taxa de abatimento? como SIM.
                                                </li>
                                            
                                            </ul>                        
                                        
                                        </div> 
                                        -->
                                        <br/>
                                        
                                        <div class="clearfix"></div>
                                        
                                        <button id="btn_add_parcela_credito" type="button" class="btn btn-info btn-lg pull-left">
                                            <i class="fa fa-plus-circle"></i> Adicionar Parcela
                                        </button>
                                        
                                        <button id="btn_remover" type="button" class="btn btn-danger btn-lg pull-left" disabled="">
                                            <i class="fa fa-times-circle"></i> Remover
                                        </button>
                                       
                                       
                                        
                                    </div>
                                    <!-- FIM PANEL-BODY -->
                                    
                                </div>
                                <!-- FIM PANEL-DEFAULT -->
                                
                            </div>
                            
                            <div class="row" id="debito">
                                
                                <!-- INICIO PANEL-DEFAULT -->						
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading"><i class="far fa-credit-card"></i> Configurações de débito</div>
                                    
                                    <!-- INICIO PANEL-BODY -->							
                                    <div class="panel-body">
                                        
                                        <div class="row">
                                        
                                            <div class="col-xs-12">
                                            
                                                    
                                                <!-- <label class="control-label">Possui taxa de abatimento para débito? <span class="required-red">*</span></label> -->
                                            
                                                <div class="col-xs-12 hidden">
                                                
                                                    <div class="form-group col-lg-1">
                                                    
                                                        <input type="radio" name="possui_taxa_abatimento_debito" class="possui_taxa_abatimento_debito" id="possui_taxa_abatimento_debito_sim" value="1" checked="checked"/> <span class="text-dark-blue"> SIM </span><br/>
                                                
                                                    </div>
                                                
                                                    <div class="form-group col-lg-1">
                                                    
                                                        <input type="radio" name="possui_taxa_abatimento_debito"  class="possui_taxa_abatimento_debito" id="possui_taxa_abatimento_debito_nao" value="0"/> <span class="text-dark-blue"> NÃO </span><br/>
                                                
                                                    </div>
                                            
                                                </div>
                                        
                                            </div>
                                            
                                            <div class="col-sm-2 col-xs-12">
                                                
                                                <div class="form-group">
                                                    
                                                    <label class="control-label">Taxa de abatimento (%) <span class="required-red">*</span></label>
                                                    
                                                    <input type="text" class="form-control parcela"  name="valor_taxa_abatimento_debito" id="valor_taxa_abatimento_debito" placeholder="" autocomplete="off" <?php if (!empty(old('valor_taxa_abatimento_debito'))) { ?>value="<?php echo old('valor_taxa_abatimento_debito'); ?>"<?php } ?>>
                                                
                                                </div>
                                            
                                            </div>
                                        
                                        </div>
                                    
                                    </div>
                                    <!-- FIM PANEL-BODY -->
                                
                                </div>
                                <!-- FIM PANEL-DEFAULT -->
                            
                            </div>
                            
                            <!-- ::: NO FORGET OF TO DELETE ::: -->
                            <div id="teste"></div>
                            
                            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                
                                <button type="submit" id="salvar" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                
                                <a class="btn btn-default pull-right" href="{{ url('admin/painel/bandeiras/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                            
                            </div>                            
                            
                            <!-- LINHA -->
                            <div id="msg_processando">
                                
                                <div id="txt_msg_processando">
                                    
                                    <i class="fa fa-exchange"></i> PROCESSANDO...
                                </div>
                                
                            </div>
                        
                        </div>
               
                    </form>        
            
                </div>
        
            </div>
    
        </div>

    </div> 

</div>   


@stop

@section('includes_no_body')
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>
<script type="text/javascript">

// Abre $(document).ready     
$(document).ready(function () {
    
    // Colocando mask
    $('.parcela').maskMoney();

    /*::: AÇÃO NO BOTÃO ADICIONAR SERVIÇOS (APPEND) :::*/
    $('#btn_add_parcela_credito').click(function () {
        
        var numero_parcela = $(".div_parcelas_credito_add").length;
        
        numero_parcela = numero_parcela + 1;
   
        // Prenchendo variável de conteúdo dinâmico
        var conteudo = '';
        conteudo += '<div class="row div_parcelas_credito_add">'; // Inicio linha global (row)        
        conteudo += '<div class="row">'; // Inicio primeira linha row        
        conteudo += '<div class="col-md-10 col-xs-12">'; // Inicio primeira coluna
        conteudo += '<label class="control-label">Taxa do parcelamento em '+numero_parcela+'x <span class="required-red">*</span></label>';
        conteudo += '<div class="input-group">'; // Inicio input-group
        conteudo += '<input type="text" name="parcela[]" class="form-control parcela" min="1" id="parcela" autocomplete="off" placeholder="Informe a taxa (%)" />';
        conteudo += '</div>'; // Fim input-group
        conteudo += '</div>'; // Fim primeira coluna
        conteudo += '</div>'; // Fim primeira linha (row)
        conteudo += '</div>'; // Fim linha global (row)
        // Adiciono conteúdo dinâmico
        $(conteudo).appendTo('.div_parcelas_credito');
        
        // Colocando mask
        $('.parcela').maskMoney();
        $('#btn_remover').prop("disabled", false);

    });
    
    /*::: AÇÃO NO BOTÃO ADICIONAR SERVIÇOS (APPEND) :::*/
    $('#btn_remover').on('click', function () { 
        // funcionando solução 1 
        // limpa tudo  
        // $('.div_parcelas_credito').empty().append();
       
        // funcionando solução 2 
        // Remove elemento 
        $('div.div_parcelas_credito > div.div_parcelas_credito_add').last().remove();
        
    });
        
        
   
    /*::: AÇÃO NO BOTÃO REMOVER  :::*/
    /*$('.div_parcelas_credito').on('click', '#deletar', function () {
        // Remove elemento table mais próximo do botão
        $(this).closest('.div_parcelas_credito_add').remove();
    });*/
    
    /*::: NEUTRALIZAÇÃO DA FUNÇÃO SUBMIT DO FORM :::*/
    $('#cadastro').submit(function () {
        return false;
    });

    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR :::
     ******************************************************/

    $('#salvar').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var nome_bandeira = $('#nome_bandeira').val();
        var cod_operadora = $('#cod_operadora').val();
        var tipo_bandeira = $('.tipo_bandeira:checked').val();        
        var possui_taxa_abatimento_credito = $('.possui_taxa_abatimento_credito:checked').val();        
        var possui_taxa_abatimento_debito = $('.possui_taxa_abatimento_debito:checked').val();        
        var valor_taxa_abatimento_debito = $('#valor_taxa_abatimento_debito').val();
        // Part. Arrays
        var parcela_pai = new Array();
        var parcela_filho;
        var parcela_em_json;

        // Loop por todas as caixas de informações 
        $('div.div_parcelas_credito > div.div_parcelas_credito_add').each(function () {

            // Reuno os dados da caixa atual do loop e coloco num Array
            parcela_filho = new Array(
                $('#parcela', this).val()
            );

            // Coloco o Array gerado agora dentro do Array pai
            parcela_pai.push(parcela_filho);

            // Limpo variavel para futuras utilizações
            parcela_filho = null;

        });

        // Apos converto Array para JSON
        parcela_em_json = JSON.stringify(parcela_pai);

        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/bandeiras/cadastrar-bandeira') }}",
            data: {
                "nome_bandeira": nome_bandeira,
                "cod_operadora": cod_operadora,
                "tipo_bandeira": tipo_bandeira,
                "possui_taxa_abatimento_debito": possui_taxa_abatimento_debito,
                "valor_taxa_abatimento_debito": valor_taxa_abatimento_debito,
                "possui_taxa_abatimento_credito": possui_taxa_abatimento_credito,
                "parcela_em_json": parcela_em_json
                
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // ::: Checagem de retorno :::
                if (response.status == 'nome_bandeira_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o nome da bandeira!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'cod_operadora_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, marque a qual operadora a bandeira pertence!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'tipo_bandeira_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, marque se bandeira pertence ao rol de crédito, débito ou ambos!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'possui_taxa_abatimento_credito_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, marque se possui ou não uma taxa de abatimento em crédito',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'possui_taxa_abatimento_debito_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, marque se possui ou não uma taxa de abatimento em debito!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'valor_taxa_abatimento_debito_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, na seção débito, informe o valor da taxa de abatimento!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'parcela_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe ao menos uma parcela!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'nome_bandeira_ja_existente') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Essa bandeira já está cadastrada para operadora informada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
               
                 if (response.status == 'error') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'error',
                        text: 'Erro, ocorreu um problema, favor tente novamente!',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/bandeiras")}}';
                        }
                    });                    

                }
                
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A Bandeira foi salva com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/bandeiras")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível prosseguir. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR 
    



    /***********************************************************************************************
     ::: FUNÇÃO PARA HABILITAR/DESABILITAR SEGUNDO OPÇÕES SELECIONADAS NO RADIO BUTTON :::
     **********************************************************************************************/
    
    /*::: FUNÇÃO PARA ESCONDER SEÇÃO :::*/
    function esconder() {
        $('#credito').hide();
        $('#debito').hide();
    }
    
    /*::: Inicia a página com seção debito/credito escondida :::*/
    esconder();
    
    // Estrutura para crédito .. 
    
    $('#radio_credito').click(function() {

            $('#credito').show('fast');
            $('#debito').hide('fast');
            
            $('#possui_taxa_abatimento_credito_sim').click(function() {
                
                $('#btn_add_parcela_credito').prop("disabled", false);
                $('#aviso_btn').hide();
                
                
            });
            
            $('#possui_taxa_abatimento_credito_nao').click(function() {
                
                $('#aviso_btn').show('fast');
                $('.div_parcelas_credito').empty().append();
                $('#btn_add_parcela_credito').prop("disabled", true);
                
            });
            
    });
    
    // Estrutura para débito ...
    
    $('#radio_debito').click(function() {

            $('#debito').show('fast');
            $('#credito').hide('fast');
            
            $('#possui_taxa_abatimento_debito_sim').click(function() {
                
                $('#valor_taxa_abatimento_debito').maskMoney();
                $('#valor_taxa_abatimento_debito').prop("disabled", false);
                
            });
            
            $('#possui_taxa_abatimento_debito_nao').click(function() {
                $('#valor_taxa_abatimento_debito').val('');
                $('#valor_taxa_abatimento_debito').prop("disabled", true);
                
            });
            
    });
    $('#radio_ambos').click(function() {
            
            $('#debito').show('fast');
            $('#credito').show('fast');
            
            // Crédito
            $('#possui_taxa_abatimento_credito_sim').click(function() {
                
                $('#btn_add_parcela_credito').prop("disabled", false);
                $('#aviso_btn').hide();
                
            });
            
            $('#possui_taxa_abatimento_credito_nao').click(function() {
                
                $('#aviso_btn').show('fast');
                $('.div_parcelas_credito').empty().append();
                $('#btn_add_parcela_credito').prop("disabled", true);
                
            });
            
            // debito 
            
            $('#possui_taxa_abatimento_debito_sim').click(function() {
                
                $('#valor_taxa_abatimento_debito').maskMoney();
                $('#valor_taxa_abatimento_debito').prop("disabled", false);
                
            });
            
            $('#possui_taxa_abatimento_debito_nao').click(function() {
                $('#valor_taxa_abatimento_debito').val('');
                $('#valor_taxa_abatimento_debito').prop("disabled", true);
                
            });
             
            
    });
    
}); // FECHA $(document).ready


</script>
@stop
