@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categorias Financeira | Cadastrar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('css/admin/administracao/categoriasfinanceiras/categoria-financeira-cadastrar.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('categorias-financeiras-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Categoria Financeira</h3>
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
                                    <div class="panel-heading"><i class="fas fa-dollar-sign"></i> Categoria Financeira</div>                                
                                    <div class="panel-body">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Nome da Categoria Financeira <span class="required-red">*</span></label>
                                                        <input type="text" class="form-control" name="nome_categoria_financeira" id="nome_categoria_financeira" placeholder="Nome da Categoria" autocomplete="off" <?php if (!empty(old('nome_categoria_financeira'))) { ?>value="<?php echo old('nome_categoria_financeira'); ?>"<?php } ?>>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-xs-12">
                                                    <div class="form-group col-lg-1">
                                                        <span class="text-success"> Entrada </span><br/>
                                                        <input type="radio" name="tipo_categoria_financeira" class="tipo_categoria_financeira" value="1"/>
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-1">
                                                        <span class="text-danger"> Saída </span><br/>
                                                        <input type="radio" name="tipo_categoria_financeira"  class="tipo_categoria_financeira" value="2"/>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group col-lg-2">
                                                        <span> É do tipo consulta? </span><br/>
                                                        <input type="checkbox" name="tipo_subcategoria"  class="tipo_subcategoria" value="1"/>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>    
                                    </div>

                                    <br/>

                                </div>
                            </div>
                            <div class="row">
                                <!-- INICIO PANEL-DEFAULT -->						
                                <div class="panel panel-default">
                                    <div class="panel-heading"><i class="fas fa-bars"></i> Sub Categoria Financeira</div>
                                    <!-- INICIO PANEL-BODY -->							
                                    <div class="panel-body">
                                        <!-- DIV ONDE APARECE FORM DE SUB CATEGORIA FINANCEIRA -->
                                        <div class="col-sm-6 div_sub_categoria_financeira"></div> 
                                        <div class="clearfix"></div>
                                        <button id="btn_add_sub_categoria_financeira" type="button" class="btn btn-info btn-lg">
                                            <i class="fa fa-plus-circle"></i> Adicionar Sub categoria
                                        </button>
                                    </div>
                                    <!-- FIM PANEL-BODY -->
                                </div>
                                <!-- FIM PANEL-DEFAULT -->
                            </div>
                            <!-- ::: NO FORGET OF TO DELETE ::: -->
                            <div id="teste"></div>
                            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" id="salvar" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                <a class="btn btn-default pull-right" href="{{ url('admin/painel/categoriasfinanceiras/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
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
<script type="text/javascript">

// Abre $(document).ready     
$(document).ready(function () {

    /*::: AÇÃO NO BOTÃO ADICIONAR SERVIÇOS (APPEND) :::*/
    $('#btn_add_sub_categoria_financeira').click(function () {

        // Prenchendo variável de conteúdo dinâmico
        var conteudo = '';
        conteudo += '<div class="row div_sub_categoria_financeira_add">'; // Inicio linha global (row)        
        conteudo += '<div class="row">'; // Inicio primeira linha row        
        conteudo += '<div class="col-md-10 col-xs-12">'; // Inicio primeira coluna
        conteudo += '<label class="control-label">Nome sub categoria <span class="required-red">*</span></label>';
        conteudo += '<div class="input-group">'; // Inicio input-group
        conteudo += '<input type="text" name="nome_sub_categoria_financeira[]" class="form-control nome_sub_categoria_financeira" min="1" id="nome_sub_categoria_financeira" autocomplete="off" />';
        conteudo += '<span class="input-group-btn">'; // Inicio tag span
        conteudo += '<button id="remover_sub_categoria_financeira" type="button" class="deletar_sub_categoria_financeira btn btn-danger"><i class="fa fa-times-circle"></i> Remover</button>';
        conteudo += '</span>'; // Fim tag span
        conteudo += '</div>'; // Fim input-group
        conteudo += '</div>'; // Fim primeira coluna
        conteudo += '</div>'; // Fim primeira linha (row)
        conteudo += '</div>'; // Fim linha global (row)
        // Adiciono conteúdo dinâmico
        $(conteudo).appendTo('.div_sub_categoria_financeira');

    });

    /*::: AÇÃO NO BOTÃO REMOVER SERVIÇO :::*/
    $('.div_sub_categoria_financeira').on('click', '.deletar_sub_categoria_financeira', function () {
        // Remove elemento table mais próximo do botão
        $(this).closest('.div_sub_categoria_financeira_add').remove();
    });
    
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
        var nome_categoria_financeira = $('#nome_categoria_financeira').val();
        var tipo_categoria_financeira = $('.tipo_categoria_financeira:checked').val();        
        var tipo_subcategoria = $('.tipo_subcategoria:checked').val();  
        
        // tipo_subcategoria = 1, Subcategoria do tipo consulta
        // tipo_subcategoria = 2, Subcategoria que não é uma consulta
        if(tipo_subcategoria != 1){
            tipo_subcategoria = 2;
        } 
        
        // Part. Arrays
        var sub_categorias_pai = new Array();
        var sub_categorias_filho;
        var sub_categorias_em_json;

        // Loop por todas as caixas de informações 
        $('div.div_sub_categoria_financeira > div.div_sub_categoria_financeira_add').each(function () {

            // Reuno os dados da caixa atual do loop e coloco num Array
            sub_categorias_filho = new Array(
                    $('#nome_sub_categoria_financeira', this).val()
                    );

            // Coloco o Array gerado agora dentro do Array pai
            sub_categorias_pai.push(sub_categorias_filho);

            // Limpo variavel para futuras utilizações
            sub_categorias_filho = null;

        });

        // Apos converto Array para JSON
        sub_categorias_em_json = JSON.stringify(sub_categorias_pai);

        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/categoriasfinanceiras/cadastrar-categoria-financeira') }}",
            data: {
                "nome_categoria_financeira": nome_categoria_financeira,
                "tipo_categoria_financeira": tipo_categoria_financeira,
                "tipo_subcategoria": tipo_subcategoria,
                "sub_categorias_em_json": sub_categorias_em_json
                
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
                if (response.status == 'nome_categoria_financeira_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o nome da categoria financeira!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }

                if (response.status == 'tipo_categoria_financeira_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, marque se a categoria pertence ao rol de entrada ou saída',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'sub_categorias_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe ao menos uma sub categoria!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'nome_categoria_financeira_ja_existente') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'O nome da categoria financeira que você está tentando cadastrar já existe!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'nome_sub_categoria_financeira_ja_existente') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'O nome da da sub categoria financeira que você está tentando cadastrar já existe!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }

                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A Categoria financeira foi salva com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/categoriasfinanceiras")}}';
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
    
    
    
}); // FECHA $(document).ready
</script>
@stop
