@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Editar 
@stop

@section('includes_no_head')

<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/administracao/planos/planos-cadastrar.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('css/select2.customizado.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('convenios-cadastrar-plano', $convenio) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Plano Auto Gestão</h3>
    </div>
</div>

<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
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
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#dadoscadastrais" id="tab_dadoscadastrais">Dados cadastrais</a></li>
                            <li><a data-toggle="tab" href="#servicos" id="tab_servicos">Serviços</a></li>
                            <li><a data-toggle="tab" href="#carencias" id="tab_carencias">Carências</a></li>
                            <li><a data-toggle="tab" href="#modeloscarteirinhas" id="tab_modeloscarteirinhas">Modelo de Carteirinha</a></li>
                        </ul>
                        
                        <div class="clearfix" style="margin-bottom:20px"></div>

                        <!-- DIV ONDE SÃO CARREGADOS AVISOS DE VALIDAÇÃO -->
                        <div id="avisoValidacao"></div>    

                        <form method="POST" id="cadastro" name="cadastro" enctype="multipart/form-data">

                            <div class="tab-content">

                                <div id="dadoscadastrais" class="tab-pane fade in active">

                                    <div class="row">
                                        <h2><i class="fas fa-briefcase-medical"></i> Dados cadastrais:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <!-- INICIO DIV DADOS CADASTRAIS -->					
                                        <div class="col-xs-12"> 
                                            <!-- INICIO PANEL-DEFAULT -->						
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fas fa-briefcase-medical"></i> DADOS CADASTRAIS</div>

                                                <!-- INICIO PANEL-BODY -->							
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Convênio <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $convenio->nome_convenio }}" name="nome_convenio" readonly="readonly" />
                                                            </div>                                                                
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Tabela <span class="required-red">*</span></label>
                                                                <select class="form-control" name="cod_tabela" id="cod_tabela" onchange="buscarProcedimentosPorTabelaAjax()">
                                                                    <option value="">Selecione ..</option>
                                                                    @foreach($tabelas as $tabela)
																		<option value="{{ Crypt::encrypt($tabela->cod_tabela) }}" <?php if (old('cod_tabela') == $tabela->cod_tabela) { echo "selected";} ?>>{{ $tabela->nome_tabela }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Faturado ? <span class="required-red">*</span></label>
                                                                <select class="form-control" name="faturado" id="faturado">
                                                                    <option value="1" <?php if (old('faturado') === "1" || old('faturado') == NULL) { echo "selected";} ?>>Sim</option>
                                                                    <option value="0" <?php if (old('faturado') === "0") { echo "selected"; } ?>>Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Nome do plano <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control" name="nome_plano" id="nome_plano" placeholder="Nome do plano" value="{{ old('nome_plano') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Código</label>
                                                                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="{{ old('codigo') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Data Inicio <span class="required-red">*</span></label></label>
                                                                <input type="text" class="form-control datepicker" name="data_inicio" id="data_inicio" placeholder="Data Inicial da vigência Plano" value="{{ old('data_inicio') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-12">
                                                            <label class="control-label">Valor do plano <span class="required-red">*</span></label>
                                                            <div class="form-inline">
                                                                <input type="text" name="valor_plano_individual" id="valor_plano_individual" class="form-control pull-left money" placeholder="Individual" size="14">
                                                                <input type="text" name="valor_plano_grupo" id="valor_plano_grupo" class="form-control pull-right money" placeholder="Grupo" size="14" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <label class="control-label">Tipo do plano <span class="required-red">*</span></label>
                                                            <div class="form-inline">
                                                                <input type="radio" name="tipo_plano" class="tipo_plano" id="tipo_plano_pessoa_fisica" value="1">
                                                                <label class="control-label">Pessoa Física</label>

                                                                <input type="radio" name="tipo_plano" class="tipo_plano" id="tipo_plano_pessoa_juridica" value="2">
                                                                <label class="control-label">Pessoa Jurídica</label>
                                                            </div>

                                                        </div>
                                                    </div>        

                                                </div>
                                                <!-- FIM PANEL-BODY -->
                                            </div>
                                            <!-- FIM PANEL-DEFAULT -->  
                                            <div class="clearfix"></div>
                                            <a onclick="clickTabServicos()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                        <!-- FIM DIV DADOS CADASTRAIS -->
                                    </div>
                                </div>

                                <div id="servicos" class="tab-pane fade">

                                    <div class="row">                                        
                                        <h2><i class="fas fa-cubes"></i> Serviços:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>    
                                        <!-- INICIO DIV SERVIÇOS -->					
                                        <div class="col-xs-12"> 

                                            <!-- INICIO PANEL-DEFAULT -->						
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><i class="fas fa-gift"></i> SERVIÇOS</div>

                                                <!-- INICIO PANEL-BODY -->							
                                                <div class="panel-body">

                                                    <!-- DIV ONDE APARECE FORM DE SERVIÇO -->
                                                    <div class="col-sm-12 div_servico"></div> 
                                                    <div class="clearfix"></div>

                                                    <button id="btn_add_servico" type="button" class="btn btn-info btn-lg">
                                                        <i class="fa fa-plus-circle"></i> Adicionar nova faixa etária
                                                    </button>
                                                </div>
                                                <!-- FIM PANEL-BODY -->
                                            </div>
                                            <!-- FIM PANEL-DEFAULT -->  
                                        </div>
                                        <!-- FIM DIV SERVIÇOS -->

                                    </div>

                                    <div class="clearfix"></div>                                        
                                    <a onclick="clickTabCarencias()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                    <a onclick="clickTabDadosCadastrais()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                                </div>

                                <div id="carencias" class="tab-pane fade">                                    

                                    <div class="row">

                                        <h2>
                                            <i class="fas fa-gift"></i> Carências:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <!-- INICIO DIV CARÊNCIAS -->					
                                        <div class="col-xs-12"> 
                                            <!-- INICIO PANEL-DEFAULT -->						
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><i class="fas fa-gift"></i> CARÊNCIAS</div>
                                                <!-- INICIO PANEL-BODY -->							
                                                <div class="panel-body">
                                                    <!-- DIV ONDE APARECE FORM DE CARÊNCIA -->
                                                    <div class="col-sm-12 div_carencia"></div> 

                                                    <div class="clearfix"></div>

                                                    <h2 id="aviso_carencia">
                                                        <label class="label label-primary label-big-text">Para habilitar, selecione uma tabela na aba dados cadastrais.</label>
                                                    </h2>

                                                    <br/>
                                                    <div class="clearfix"></div>

                                                    <button id="btn_add_carencia" type="button" class="btn btn-info btn-lg" disabled>
                                                        <i class="fa fa-plus-circle"></i> Adicionar nova regra
                                                    </button>

                                                </div>
                                                <!-- FIM PANEL-BODY -->
                                            </div>
                                            <!-- FIM PANEL-DEFAULT -->  
                                        </div>
                                        <!-- FIM DIV DADOS CARÊNCIAS -->

                                    </div>

                                    <div class="clearfix"></div>                                        
                                    <a onclick="clickTabModelosCarteirinhas()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                    <a onclick="clickTabServicos()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                                </div>

                                <div id="modeloscarteirinhas" class="tab-pane fade">
                                    <h4 id="aviso_carteirinha">
                                        <label class="label label-primary label-big-text">Para visualizar os modelos de carteirinha, primeiro vá na aba dados cadastrais e marque o tipo do plano, ou seja, se o mesmo é do tipo PESSOA FÍSICA ou JURÍDICA.</label>
                                    </h4>
                                    <br/>

                                    <div class="card pf" id="modelo_carteirinha_pessoa_fisica">

                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 1  <input type="radio" class="form-group" name="card" id="card" value="1"/>
                                            </div>

                                            <div class="card1">

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/pessoa/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small>Plano</small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>    

                                        <!-- Fim modelo card 1 -->

                                        <!-- Inicio modelo card 2 -->

                                        <div class="caixa-modelo">
                                            <div class="caixa-opcao">
                                                Modelo 2 <input type="radio" class="form-group" name="card" id="card" value="2"/>
                                            </div>
                                            <div class="card2">

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 2 -->

                                        <!-- Inicio modelo card 3 -->
                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 3 <input type="radio" class="form-group" name="card" id="card" value="3"/>
                                            </div>

                                            <div class="card3">

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/pessoa/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 3 -->

                                    </div>

                                    <div class="card pj" id="modelo_carteirinha_pessoa_juridica">
                                        <!-- Inicio modelo de card 1 -->

                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 1  <input type="radio" class="form-group" name="card" id="card" value="1"/>
                                            </div>

                                            <div class="card1">

                                                <div class="caixa-empresa font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            REDE DE MERCADOS GUANABARA<br/><small><b>Empresa</b></small>
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/pessoa/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>    

                                        <!-- Fim modelo card 1 -->

                                        <!-- Inicio modelo card 2 -->

                                        <div class="caixa-modelo">
                                            <div class="caixa-opcao">
                                                Modelo 2 <input type="radio" class="form-group" name="card" id="card" value="2"/>
                                            </div>
                                            <div class="card2">

                                                <div class="caixa-empresa font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            REDE DE MERCADOS GUANABARA<br/><small><b>Empresa</b></small>
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 2 -->

                                        <!-- Inicio modelo card 3 -->
                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 3 <input type="radio" class="form-group" name="card" id="card" value="3"/>
                                            </div>

                                            <div class="card3">

                                                <div class="caixa-empresa font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            REDE DE MERCADOS GUANABARA<br/><small><b>Empresa</b></small>
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/pessoa/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 3 -->

                                    </div>


                                    <div class="clearfix"></div>                                        

                                    <!-- ::: ESTRUTURA PARA HISTORICO ::: -->
                                    <input type="hidden" id="cod_convenio" name="cod_convenio" value="<?php echo $codigo_convenio; ?>" />
                                    <!-- ::: NO FORGET OF TO DELETE ::: -->
                                    <button type="submit" id="salvar" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                    <a onclick="clickTabCarencias()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                    
                                    <!-- LINHA -->
                                    <div id="msg_processando">
                                        <div id="loading_spinner_processando">
                                            <img src="<?php echo asset('images/loading_spinner.gif'); ?>" alt="processando" />
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('includes_no_body')
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>
<script type="text/javascript">

// Abre $(document).ready     
$(document).ready(function () {

    /*::: AÇÃO NO BOTÃO ADICIONAR SERVIÇOS (APPEND) :::*/
    $('#btn_add_servico').click(function () {

        // Prenchendo variável de conteúdo dinâmico
        var conteudo = '';
        conteudo += '<div class="row div_servico_add">'; // Inicio linha global (row)

        conteudo += '<div class="row">'; // Inicio primeira linha (row)

        conteudo += '<div class="col-md-4 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">De <span class="required-red">*</span></label>';
        conteudo += '<input type="number" name="faixa_etaria_de[]" class="form-control faixa_etaria_de" min="1" id="faixa_etaria_de" autocomplete="off"  />';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-4 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Até <span class="required-red">*</span></label>';
        conteudo += '<input type="number" name="faixa_etaria_ate[]" class="form-control faixa_etaria_ate" min="1" id="faixa_etaria_ate" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-4 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Data início <span class="required-red">*</span></label>';
        conteudo += '<input type="text" name="data_inicio_faixa[]" class="form-control datepicker" id="data_inicio_faixa"  placeholder="00/00/0000" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>'; // Fim primeira linha (row)

        conteudo += '<div class="row">'; // Inicio segunda linha (row)
        conteudo += '<?php echo $html_complementar; ?>';
        conteudo += '</div>'; // Fim segunda linha

        conteudo += '<button id="remover_servico" type="button" class="deletar_servico btn btn-danger btn-sm pull-right"><i class="fa fa-times-circle"></i> Remover</button>';
        conteudo += '</div>'; // Fim linha global (row)
        conteudo += '<br/>';
        // Adiciono conteúdo dinâmico
        $(conteudo).appendTo('.div_servico');

        // Função para append campo data 
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            weekStart: 0,
            startDate: 'today',
            todayHighlight: true
        });

    });

    /*::: AÇÃO NO BOTÃO REMOVER SERVIÇO :::*/
    $('.div_servico').on('click', '.deletar_servico', function () {
        // Remove elemento table mais próximo do botão
        $(this).closest('.div_servico_add').remove();
    });

    /******************************************************
     ::: AÇÃO NO BOTÃO ADICIONAR CARÊNCIA (APPEND) :::
    ******************************************************/
    $('#btn_add_carencia').click(function () {

        var conteudo = '';
        conteudo += '<div class="row div_carencia_add">'; // Inicio linha global (row)

        conteudo += '<div class="row">'; // Inicio primeira linha (row)
        conteudo += '<div class="col-md-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Procedimento: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control cod_procedimento" name="cod_procedimento[]" id="cod_procedimento" id="cod_procedimento" multiple></select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>'; // Fim primeira linha (row)

        conteudo += '<div class="row">'; // Inicio segunda linha (row)
        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Carência: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="carencia[]" id="carencia"><option value="">Selecione..</option> <option value="1">Imediato</option><option value="2">24h</option><option value="3">48h</option></select> ';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Data Inicio: <span class="required-red">*</span></label>';
        conteudo += '<input type="text" type="text" name="data_inicio_carencia[]" id="data_inicio_carencia" class="form-control datepicker" placeholder="00/00/0000">';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Tipo desconto: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="tipo_desconto[]" id="tipo_desconto"><option value="">..</option> <option value="1">%</option><option value="2">R$</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Valor desconto: <span class="required-red">*</span></label>';
        conteudo += '<input type="text" class="form-control valor_desconto" id="valor_desconto" name="valor_desconto[]" placeholder="0,00" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Periodicidade: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="periodicidade[]" id="periodicidade"><option value="">Selecione..</option><option value="1">Diário</option><option value="2">Semanal</option><option value="3">Quinzenal</option><option value="4">Mensal</option><option value="5">Trimestral</option><option value="6">Semestral</option><option value="7">Anual</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-3 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Qtd. parcelas quitadas: <span class="required-red">*</span></label>';
        conteudo += '<input type="number" min="1" class="form-control quantidade_parcelas_quitadas" id="quantidade_parcelas_quitadas" name="quantidade_parcelas_quitadas[]" placeholder="0" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Condição contratual: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="condicao_contratual[]" id="condicao_contratual"><option value="">Selecione..</option> <option value="1">1 pessoa em contrato</option><option value="2">2 pessoas em contrato</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Dias Inadimplente: <span class="required-red">*</span></label>';
        conteudo += '<input type="number" min="1" name="dias_inadimplente[]" id="dias_inadimplente" size="3" class="form-control dias_inadimplente" placeholder="0">';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-3 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Se estiver Inadimplente: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="configuracao_inadimplencia[]" id="configuracao_inadimplencia"><option value="">Selecione..</option> <option value="1">Anular desconto</option><option value="2">Manter desconto</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '</div>'; // Fim segunda linha (row)

        conteudo += '<button id="remover" type="button" class="deletar btn btn-danger btn-sm pull-right"><i class="fa fa-times-circle"></i> Remover</button>';
        conteudo += '</div>'; // Fim linha global (row)

        // Adiciono conteúdo dinâmico
        $(conteudo).appendTo('.div_carencia');

        // Função que não limmpa o append acima ao ser chamada 
        var cod_tabela = $("#cod_tabela option:selected").val();

        $.ajax({
            url: "{{ url('admin/painel/procedimentos/buscar-procedimentos-por-tabela-ajax') }}",
            data: {'cod_tabela': cod_tabela},
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                $(response).each(function (index, value) {

                    $(".cod_procedimento").append("<option value='" + value.cod_procedimento + "'>" + value.descricao + "</option>");

                });
            },
            error: function (response) {
                console.log(response);
            }
        });

        // Transformando selected in multiple select 
        $(".cod_procedimento").select2({
            placeholder: "Procedimentos",
            allowClear: true
        });

        // Função para append campo data 
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            weekStart: 0,
            startDate: 'today',
            todayHighlight: true
        });


    });

    /*::: AÇÃO NO BOTÃO REMOVER CARÊNCIA :::*/
    $('.div_carencia').on('click', '.deletar', function () {
        // Remove elemento table mais próximo do botão
        $(this).closest('.div_carencia_add').remove();
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

        // Declaração de variaveis
        var servicos_pai = new Array();
        var servicos_filho;
        var complemento_servicos_filho = new Array();
        var servicos_selecionados;
        var servicos_em_json;
        var servico_nao_preenchido = false; // variavel utilizada para checar se houve erros

        // Loop por todas as caixas de informações 
        $('div.div_servico > div.div_servico_add').each(function () {


            // Reuno os dados da caixa atual do loop e coloco num Array
            servicos_filho = new Array(
                    $('#faixa_etaria_de', this).val(),
                    $('#faixa_etaria_ate', this).val(),
                    $('#data_inicio_faixa', this).val()
                    );

            // Faço loop por possiveis checkboxes marcados
            $(this).find('input[name="servicos[]"]:checked').each(function () {

                if ($(this).closest('#srv').find('#valor_individual').val() == '' || $(this).closest('#srv').find('#valor_grupo').val() == '') {

                    // Troca valor de variavel
                    servico_nao_preenchido = true;

                    // Sai do loop
                    return false;

                }

                // Reuno os dados dos serviços selecionados e coloco num Array
                servicos_selecionados = new Array(
                        $(this).val(),
                        $(this).closest('#srv').find('#valor_individual').val(),
                        $(this).closest('#srv').find('#valor_grupo').val()
                        );

                // Coloco o Array gerado agora dentro do Array de complemento
                complemento_servicos_filho.push(servicos_selecionados);

                // Limpo variavel para futuras utilizações
                servicos_selecionados = null;

            });

            // Coloco o Array de complemento dentro do Array filho
            servicos_filho.push(complemento_servicos_filho);

            // Coloco o Array filho dentro do Array pai
            servicos_pai.push(servicos_filho);

            // Limpo variavel para futuras utilizações
            servicos_filho = null;
            complemento_servicos_filho = new Array();

        });

        // Checo se houve erro no preenchimento dos campos de valores de serviços
        if (servico_nao_preenchido) {

            // Mostra mensagem de erro
            $.toast({
                heading: 'Preenchimento incompleto!',
                text: 'Você deve informar o valor individual e o valor grupo de todos os serviços que selecionar.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });

            return false;

        }

        // Part. variáveis 
        var cod_convenio = $('#cod_convenio').val();
        var cod_tabela = $('#cod_tabela').val();
        var faturado = $('#faturado').val();
        var nome_plano = $('#nome_plano').val();
        var codigo = $('#codigo').val();
        var data_inicio = $('#data_inicio').val();
        var valor_plano_individual = $('#valor_plano_individual').val();
        var valor_plano_grupo = $('#valor_plano_grupo').val();
        var tipo_plano = $(".tipo_plano:checked").val();
        var card = $('#card').val();

        // Part. Arrays
        var carencias_pai = new Array();
        var carencias_filho;
        var carencias_em_json;

        // Loop por todas as caixas de informações 
        $('div.div_carencia > div.div_carencia_add').each(function () {

            // Reuno os dados da caixa atual do loop e coloco num Array
            carencias_filho = new Array(
                    $('#cod_procedimento', this).val(),
                    $('#carencia', this).val(),
                    $('#data_inicio_carencia', this).val(),
                    $('#tipo_desconto', this).val(),
                    $('#valor_desconto', this).val(),
                    $('#periodicidade', this).val(),
                    $('#quantidade_parcelas_quitadas', this).val(),
                    $('#condicao_contratual', this).val(),
                    $('#dias_inadimplente', this).val(),
                    $('#configuracao_inadimplencia', this).val()
                    );

            // Coloco o Array gerado agora dentro do Array pai
            carencias_pai.push(carencias_filho);

            // Limpo variavel para futuras utilizações
            carencias_filho = null;

        });

        // Converto Array para JSON
        servicos_em_json = JSON.stringify(servicos_pai);
        carencias_em_json = JSON.stringify(carencias_pai);

        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/planos/cadastrar-plano-ag-sequencial') }}",
            data: {
                "cod_convenio": cod_convenio,
                "cod_tabela": cod_tabela,
                "faturado": faturado,
                "nome_plano": nome_plano,
                "codigo": codigo,
                "data_inicio": data_inicio,
                "valor_plano_individual": valor_plano_individual,
                "valor_plano_grupo": valor_plano_grupo,
                "tipo_plano": tipo_plano,
                "carencias_em_json": carencias_em_json,
                "servicos_em_json": servicos_em_json,
                "card": card
            },
            beforeSend: function () {
                // Mostra mensagem processando...
                $('.msg_processando').show();
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // ::: Checagem de retorno :::
                if (response.status == 'cod_convenio_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'O Convênio não pode ser localizado!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }

                if (response.status == 'cod_tabela_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a tabela!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }

                if (response.status == 'faturado_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, preencha o campo faturado!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });
                }
                if (response.status == 'nome_plano_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o nome do plano!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });
                }

                if (response.status == 'data_inicio_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a data de inicio!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'valor_plano_individual_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o valor individual do plano!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'valor_plano_grupo_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o valor grupo do plano!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'tipo_plano_vazio') {
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe se o plano é do tipo PESSOA FÍSICA ou JURÍDICA!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }

                if (response.status == 'servico_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, selecione os serviços na aba serviços!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'faixa_etaria_atravessando') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor informe faixas etarias distintas, ou seja, sem que as mesmas a atravessem uma a outra!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'idade_inicial_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, preencha o campo idade inicial da faixa etária!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'idade_final_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, preencha o campo idade final da faixa etária!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'data_inicio_faixa_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a data início da faixa etária!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'cod_procedimento_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o código do procedimento!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'carencia_vazio') {

                    // Mostra mensagem de erro 
                    $.toast({
                        heading: 'Por favor, informe um valor no campo carência!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'data_inicio_carencia_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a data de início da carência',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'tipo_desconto_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o tipo de desconto!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'valor_desconto_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o valor do desconto!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'periodicidade_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a periodicidade!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'quantidade_parcelas_quitadas_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a quantidade de parcelas quitadas!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'condicao_contratual_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a condição contratual!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'dias_inadimplente_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe os dias inadimplente!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'configuracao_inadimplencia_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, preencha o campo se estiver inadimplente!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'modelo_carteirinha_vazio') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, na aba modelo de carteirinha escolha um modelo!',
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
                        text: 'Plano salvo com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1000, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/convenios/")}}';
                        }
                    });

                }
            },
            complete: function (response) {
                // Oculta mensagem 'processando...'
                $('.msg_processando').hide();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                alert('Não foi possível prosseguir. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO ENCOMENDAR

    /*****************************************************
     ::: FUNÇÃO PARA HABILITAR/DESABILITAR BTN_ADD :::
     ******************************************************/
    
    $('#cod_tabela').change(function () {

        if ($(this).val() != "") {

            $('#btn_add_carencia').prop("disabled", false);
            $('#aviso_carencia').hide();

        } else {

            $('#btn_add_carencia').prop("disabled", true);
            $('#aviso_carencia').show('fast');
            $('.div_carencia').empty().append();
        }
    });
    
    /*****************************************************
     ::: FUNÇÃO PARA ESCONDER DIV CARTEIRINHAS :::
     ******************************************************/
    function esconder() {

        $('#modelo_carteirinha_pessoa_juridica').hide();
        $('#modelo_carteirinha_pessoa_fisica').hide();
        $('#aviso_carteirinha').show();

    }

    /*::: Inicializa a página com carteirinha escondida :::*/
    esconder();
    
    /*::: ANIMAÇÃO DE EXIBIR/OCULTAR MODELOS DE CARTEIRINHAS (ATIVADAS ATRAVÉS DE RADIOBUTTONS) :::*/
    $('#tipo_plano_pessoa_fisica').click(function () {
        
        $('#modelo_carteirinha_pessoa_juridica').hide('fast');
        $('#modelo_carteirinha_pessoa_fisica').show('fast');
        $('#aviso_carteirinha').hide();
    });
    $('#tipo_plano_pessoa_juridica').click(function () {
        $('#modelo_carteirinha_pessoa_fisica').hide('fast');
        $('#modelo_carteirinha_pessoa_juridica').show('fast');
        $('#aviso_carteirinha').hide();
    });


}); // FECHA $(document).ready

/*****************************************
 ::: FUNÇÃO DATA :::
 *****************************************/
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    weekStart: 0,
    startDate: 'today',
    todayHighlight: true
});

/*****************************************
 # MUDANÇA DE ABA 
 *****************************************/

// Ativa máscara de dinheiro em campos
$('#valor_plano_individual').maskMoney();
$('#valor_plano_grupo').maskMoney();


/*****************************************
 # MUDANÇA DE ABA 
 *****************************************/

function clickTabDadosCadastrais() {
    $("#tab_dadoscadastrais").click();
}
function clickTabServicos() {
    $("#tab_servicos").click();
}
function clickTabCarencias() {
    $("#tab_carencias").click();
}
function clickTabModelosCarteirinhas() {
    $("#tab_modeloscarteirinhas").click();
}

/*****************************************
 # FUNÇÃO PARA BUSCAR PROCEDIMENTOS
*****************************************/
function buscarProcedimentosPorTabelaAjax() {
    // :: Reset Toast :: 
    $.toast().reset('all');
    
    var cod_tabela = $("#cod_tabela option:selected").val();
    $.ajax({
        url: "{{ url('admin/painel/procedimentos/buscar-procedimentos-por-tabela-ajax') }}",
        data: {'cod_tabela': cod_tabela},
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            // Limpando multiple selected 
            $(".cod_procedimento").html('');
            
            if(Object.keys(response).length > 0 ){                
                
                $(response).each(function (index, value) {

                    $(".cod_procedimento").append("<option value='" + value.cod_procedimento + "'>" + value.descricao + "</option>");

                });
            
            }else{
                
                    //$("#cod_tabela option[value='']").attr('selected', 'selected');
                    //$("#cod_tabela").change();
                    $("#cod_tabela").val('');
                    
                    $('#btn_add_carencia').prop("disabled", true);
                    $('#aviso_carencia').show('fast');
                    $('.div_carencia').empty().append();

                    //alert(Object.keys(response).length);
                    $.toast({
                        heading: 'Não há procedimentos nesta tabela!',
                        text: 'Por favor, selecione uma tabela que contenha ao menos um procedimento ativo.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });
                    return false;
                
            }    

        },
        error: function (response) {
            console.log(response);
        }
    });
}
 
/**********************************************
 # FUNÇÃO MÁSCARA EM INTEIROS NA DIV SERVIÇOS 
***********************************************/
$(document).on('change', 'div.div_servico > div.div_servico_add', function () {
    $(".faixa_etaria_de").keypress(function (e) {
        
        // :: Reset Toast :: 
        $.toast().reset('all');
    
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            // Mostra mensagem de erro
            $.toast({
                heading: 'Número inteiro!',
                text: 'Por favor, informe um número inteiro.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });
            return false;
        }
    });

    $(".faixa_etaria_ate").keypress(function (e) {
        
        // :: Reset Toast :: 
        $.toast().reset('all');
        
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            // Mostra mensagem de erro
            $.toast({
                heading: 'Número inteiro!',
                text: 'Por favor, informe um número inteiro.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });
            return false;
        }
    });


});

/**********************************************
 # FUNÇÃO MÁSCARA EM INTEIROS NA DIV CARÊNCIAS 
***********************************************/
$(document).on('change', 'div.div_carencia > div.div_carencia_add', function () {
    
    // Mascaras em todos os campos R$ 
    $('.valor_desconto').maskMoney();
        
    $(".dias_inadimplente").keypress(function (e) {
        
        // :: Reset Toast :: 
        $.toast().reset('all');
        
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            // Mostra mensagem de erro
            $.toast({
                heading: 'Número inteiro!',
                text: 'Por favor, informe um número inteiro.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });
            return false;
        }
    });

    $(".quantidade_parcelas_quitadas").keypress(function (e) {
        
        // :: Reset Toast :: 
        $.toast().reset('all');
        
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            // Mostra mensagem de erro
            $.toast({
                heading: 'Número inteiro!',
                text: 'Por favor, informe um número inteiro.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });
            return false;
        }
    });

});

/*****************************************************************************************
 # Função para habilitar MÁSCARA / HABILITAR/ DESABILITAR campos de valores de serviços  
*****************************************************************************************/
$(document).on('change', '.checkbox_servicos', function () {
    
    // Mascaras em todos os campos R$ 
    $('.valor_individual').maskMoney();
    $('.valor_grupo').maskMoney();

    // Verifico se o checkbox está marcado
    if (this.checked) {

        // Habilito campos valor_individual e valor_grupo
        $(this).closest('#srv').find('#valor_individual').removeAttr('disabled');
        $(this).closest('#srv').find('#valor_grupo').removeAttr('disabled');

    } else {

        // Limpo valores dos campos
        $(this).closest('#srv').find('#valor_individual').val('');
        $(this).closest('#srv').find('#valor_grupo').val('');

        // Desabilito campos valor_individual e valor_grupo
        $(this).closest('#srv').find('#valor_individual').attr('disabled', 'disabled');
        $(this).closest('#srv').find('#valor_grupo').attr('disabled', 'disabled');

    }

});
</script>
@stop