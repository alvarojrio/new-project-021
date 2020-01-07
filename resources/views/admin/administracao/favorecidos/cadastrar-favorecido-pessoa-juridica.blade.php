@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Favorecidos | Cadastrar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('favorecido-cadastrar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Cadastrar Favorecido Pessoa Jurídica</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
    
    <div class="col-xs-12">
      
        
        
                <!-- INICIO LINHA -->
                <div class="row">
            
                    
                    <form action="<?php echo url('admin/painel/favorecidos/cadastrar-favorecido-pessoa-juridica'); ?>" method="POST" enctype="multipart/form-data">
                
                        <!-- INICIO LINHA -->
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
                        
                        </div>
                        <!-- FIM LINHA -->
            
                        
                        <div class="row">
                         
                            <div class="col-xs-12">
        
                                <div class="x_panel">
            
                                    <div class="x_content">

                                        <!-- Renderizo View Component -->
                                        <!-- ### CONTEUDO DO COMPONENTE ### -->

                                        <!-- INICIO LINHA -->
                                        <div class="row row_msg_erro_cadastrar_pj">

                                            <!-- Espaço para exibição de erros de validação -->
                                            <div id="avisoValidacao" role="alert">
                                                <div class="col-xs-12">
                                                    <div class="alert alert-danger msg_erro_cadastrar_pj" style="display: none;"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->

                                        <!-- INICIO LINHA -->
                                        <div class="row">

                                            <!-- DIV DA MENSAGEM 'PROCESSANDO' -->
                                            <div id="msg_processando">
                                                <div id="txt_msg_processando">
                                                    <i class="fa fa-exchange"></i> PROCESSANDO...
                                                </div>
                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->



                                        <!-- ##################### INICIO CAIXA DADOS DA EMPRESA ##################### -->
                                        <div class="panel panel-primary">

                                            <div class="panel-heading heading_panel_pessoa">DADOS DA EMPRESA</div>

                                                <div class="panel-body">

                                                <!-- INICIO LINHA -->

                                                    <div class="row">

                                                        <!-- INICIO COLUNA ESQUERDA -->
                                                        <div class="col-md-6 col-xs-12">

                                                            <!-- INICIO PANEL -->
                                                            <div class="panel panel-default">
                                                                
                                                                <div class="panel-heading">INFORMAÇÕES BÁSICAS</div>
                                                                
                                                                <div class="panel-body">

                                                                    <!-- INICIO LINHA -->
                                                                    <div class="row">

                                                                        <!-- Inicio Coluna Dados Basicos -->
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                            <!-- Linha -->
                                                                            <div class="row">

                                                                                <!-- Coluna -->
                                                                                <div class="form-group col-md-6 col-xs-12">

                                                                                    <label class="control-label">CNPJ <span class="required-red">*</span></label>
                                                                                    <input type="text" id="cnpj" name="cnpj" <?php if (!empty(old('cnpj'))) { ?>value="<?php echo old('cnpj'); ?>"<?php } ?> class="form-control input-sm cnpj" autocomplete="off" autofocus="autofocus" placeholder="00.000.000/0000-00" onblur="return validaCampos()" tabindex="1" maxlength="18" required="required">

                                                                                </div>

                                                                           

                                                                                <!-- Coluna -->
                                                                                <div class="form-group col-md-6 col-xs-12">

                                                                                    <label class="control-label">Razão Social <span class="required-red">*</span></label>
                                                                                    <input type="text" id="razao_social" name="razao_social" <?php if (!empty(old('razao_social'))) { ?>value="<?php echo old('razao_social'); ?>"<?php } ?> class="form-control input-sm letra-maiuscula c_razao_social" autocomplete="off" tabindex="2" required="required">

                                                                                </div>

                                                                            </div>

                                                                            <!-- Linha -->
                                                                            <div class="row">

                                                                                <!-- Coluna -->
                                                                                <div class="form-group col-md-6 col-xs-12">

                                                                                    <label class="control-label">Nome Fantasia <span class="required-red">*</span></label>
                                                                                    <input type="text" id="nome_fantasia" name="nome_fantasia" <?php if (!empty(old('nome_fantasia'))) { ?>value="<?php echo old('nome_fantasia'); ?>"<?php } ?> class="form-control input-sm letra-maiuscula" autocomplete="off" autofocus="autofocus" tabindex="3" required="required">

                                                                                </div>
                                                                                
                                                                                <div class="form-group col-md-6 col-xs-12">

                                                                                    <label class="control-label">Segmento</label>
                                                                                    <input type="text" id="segmento" name="segmento" <?php if (!empty(old('segmento'))) { ?>value="<?php echo old('segmento'); ?>"<?php } ?> class="form-control input-sm" autocomplete="off" tabindex="4">

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <!-- Fim Coluna Dados Basicos -->

                                                                    </div>
                                                                    <!-- FIM LINHA -->

                                                                </div>
                                                                
                                                            </div>
                                                            <!-- FIM PANEL -->

                                                        </div>
                                                        <!-- FIM COLUNA ESQUERDA -->

                                                        <!-- INICIO COLUNA DIREITA -->
                                                        <div class="col-md-6 col-xs-12">
                                                            
                                                            <!-- INICIO PANEL -->
                                                            <div class="panel panel-default subpanel_pessoa_b">
                                                                
                                                                <div class="panel-heading">CONTATO DA EMPRESA</div>
                                                                
                                                                <div class="panel-body">

                                                                    <!-- Linha -->
                                                                    <div class="row">

                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-md-12 col-xs-12">

                                                                            <label class="control-label">Telefone <span class="required-red">*</span></label>
                                                                            <input type="text" id="telefone_empresa" name="telefone_empresa" <?php if (!empty(old('telefone_empresa'))) { ?>value="<?php echo old('telefone_empresa'); ?>"<?php } ?> class="form-control input-sm telefone" autocomplete="off" placeholder="(00) 0000-0000" tabindex="5" maxlength="14" required="required">

                                                                        </div>

                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-md-12 col-xs-12">

                                                                            <label class="control-label">E-mail <span class="required-red">*</span></label>
                                                                            <input type="email" id="email_empresa" name="email_empresa" <?php if (!empty(old('email_empresa'))) { ?>value="<?php echo old('email_empresa'); ?>"<?php } ?> class="form-control input-sm c_email" autocomplete="off" tabindex="6" required="required">

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                
                                                            </div>
                                                            <!-- FIM PANEL -->
                                                            

                                                        </div>
                                                        <!-- FIM COLUNA DIREITA -->

                                                    </div>
                                                    <!-- FIM LINHA -->
                                                    
                                                    <!-- INICIO LINHA -->
                                                    <div class="row">

                                                        <!-- INICIO COLUNA -->
                                                        <div class="col-md-12 col-xs-12">
                                                            
                                                            <!-- INICIO PANEL -->
                                                            <div class="panel panel-default">
                                                                
                                                                <div class="panel-heading">CATEGORIAS</div>
                                                                
                                                                <div class="panel-body">

                                                                    <!-- Linha -->
                                                                    <div class="row">
                                                                        
                                                                        <!-- INICIO DA COLUNA -->
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        
                                                                            <div class="form-group">


                                                                                    <label class="control-label">Categoria <span class="required-red">*</span></label>


                                                                                    <select class="form-control select2_multiple" name="cod_categoria[]" id="cod_categoria" style='width:100%' multiple tabindex="8" required='required'>

                                                                                            <?php foreach($obj_sub_categoria as $sub_cat): ?>

                                                                                                    <option value="<?php echo $sub_cat->cod_sub_categoria_financeira; ?>" <?php if(old('cod_categoria') && in_array($sub_cat->cod_sub_categoria_financeira, old('cod_categoria'))){ echo "selected"; }?>><?php echo $sub_cat->nome_sub_categoria_financeira ?></option>

                                                                                            <?php endforeach; ?>

                                                                                    </select>


                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <!-- FIM DA COLUNA -->
                                                                        
                                                                    </div>
                                                                    <!-- FIM LINHA -->

                                                                </div>
                                                                
                                                            </div>
                                                            <!-- FIM PANEL -->
                                                    
                                                        </div>
                                                        <!-- FIM COLUNA -->

                                                    </div>
                                                    <!-- FIM LINHA -->
                                                    
                                                    
                                                    <!-- INICIO LINHA -->
                                                    <div class="row">
                                                    
                                                        <!-- INICIO COLUNA DIREITA -->
                                                        <div class="col-md-12 col-xs-12">

                                                            <!-- INICIO PANEL -->
                                                            <div class="panel panel-default">

                                                                <div class="panel-heading">ENDEREÇO</div>

                                                                <div class="panel-body">

                                                                    <!-- Linha -->
                                                                    <div class="row">

                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                                            <label class="control-label">CEP <span class="required-red">*</span></label>
                                                                            <input type="text" id="cep_empresa" name="cep_empresa" <?php if (!empty(old('cep_empresa'))) { ?>value="<?php echo old('cep_empresa'); ?>"<?php } ?> class="form-control input-sm cep" autocomplete="off" placeholder="00000-000" onblur="puxaEndereco()" tabindex="9" maxlength="9">

                                                                        </div>

                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                                            <label class="control-label">Estado <span class="required-red">*</span></label>

                                                                            <select class="form-control input-sm estado" name="cod_estado" id="cod_estado" onchange="buscarCidades()" tabindex="10">
                                                                               <option value="">Selecione..</option>
                                                                               @foreach($estados as $estado)
                                                                                 <option value="{{ $estado->cod_estado }}" <?php if (old('cod_estado') == $estado->cod_estado) { echo "selected"; } ?>>{{ $estado->nome_estado }}</option>
                                                                               @endforeach
                                                                             </select>

                                                                        </div>
                                                                        
                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                                            <label class="control-label">Cidade <span class="required-red">*</span></label>
                                                                            
                                                                            <select class="form-control input-sm cidade" name="cod_cidade" id="cod_cidade" tabindex="11">

                                                                                <option value="">...</option>

                                                                            </select>

                                                                        </div>

                                                                    </div>

                                                                    <!-- Linha -->
                                                                    <div class="row">

                                                                        <!-- Coluna -->
                                                                         <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                                            <label class="control-label">Bairro</label>
                                                                            <input type="text" id="bairro_empresa" name="bairro_empresa" <?php if (!empty(old('bairro_empresa'))) { ?>value="<?php echo old('bairro_empresa'); ?>"<?php } ?> class="form-control input-sm bairro" autocomplete="off" tabindex="12">

                                                                        </div>

                                                                  
                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                                            <label class="control-label">Logradouro</label>
                                                                            <input type="text" id="logradouro_empresa" name="logradouro_empresa" <?php if (!empty(old('logradouro_empresa'))) { ?>value="<?php echo old('logradouro_empresa'); ?>"<?php } ?> class="form-control input-sm logradouro" autocomplete="off" tabindex="13">

                                                                        </div>
                                                                        
                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">

                                                                            <label class="control-label">Complemento</label>
                                                                            <input type="text" id="complemento_empresa" name="complemento_empresa" <?php if (!empty(old('complemento_empresa'))) { ?>value="<?php echo old('complemento_empresa'); ?>"<?php } ?> class="form-control input-sm" autocomplete="off" tabindex="14">

                                                                        </div>
                                                                        
                                                                        <!-- Coluna -->
                                                                        <div class="form-group col-lg-1 col-md-1 col-sm-12 col-xs-12">

                                                                            <label class="control-label">Número</label>
                                                                            <input type="text" id="numero_empresa" name="numero_empresa" <?php if (!empty(old('numero_empresa'))) { ?>value="<?php echo old('numero_empresa'); ?>"<?php } ?> class="form-control input-sm" autocomplete="off" tabindex="15">

                                                                        </div>

                                                                    </div>

                                                                    
                                                                </div>
                                                            </div>
                                                            <!-- FIM PANEL -->

                                                        </div>
                                                        <!-- FIM COLUNA DIREITA -->
                                                
                                                    </div>
                                                    <!-- FIM LINHA -->
                                                    
                                                    
                                                    <!-- INICIO LINHA --> 
                                                    <div class="row">

                                                        <!-- Início Div PANEL ARQUIVO -->
                                                        <div class="col-md-12 col-xs-12">

                                                            <!-- INICIO PANEL -->
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">PESSOAS DE CONTATO DA EMPRESA</div>
                                                                <div class="panel-body">

                                                                    Estas serão as pessoas responsáveis por centralizar o contato com a empresa. <br><br>

                                                                    <!-- Linha -->
                                                                    <div class="row">

                                                                        <!-- INICIO COLUNA ESQUERDA -->
                                                                        <div class="col-md-6 col-xs-12">

                                                                            <!-- INICIO PANEL -->
                                                                            <div class="panel panel-default">
                                                                                
                                                                                <div class="panel-heading"></div>
                                                                                
                                                                                <div class="panel-body">

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                         <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Nome</label>
                                                                                            <input type="text" id="nome_responsavel_1" name="nome_responsavel_1" <?php if (!empty(old('nome_responsavel_1'))) { ?>value="<?php echo old('nome_responsavel_1'); ?>"<?php } ?> class="form-control input-sm letra-maiuscula" autocomplete="off" autofocus="autofocus" tabindex="16">

                                                                                        </div>
                                                                                        <!-- Fim da coluna -->

                                                                                   
                                                                                        <!-- Coluna -->
                                                                                         <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Sexo </label>
                                                                                            <select class="form-control input-sm" name="sexo_responsavel_1"  id="sexo_responsavel_1" tabindex="17">
                                                                                                <option value="">Selecione</option>
                                                                                                <option value="2" <?php if (old('sexo_responsavel_1') == 2) { echo "selected";} ?>>Feminino</option>
                                                                                                <option value="1" <?php if (old('sexo_responsavel_1') == 1) { echo "selected";} ?>>Masculino</option>                                                
                                                                                            </select>

                                                                                        </div>

                                                                                    </div>

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                         <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Setor </label>
                                                                                            <input type="text" id="setor_responsavel_1" name="setor_responsavel_1" <?php if (!empty(old('setor_responsavel_1'))) { ?>value="<?php echo old('setor_responsavel_1'); ?>"<?php } ?> class="form-control input-sm" autocomplete="off" autofocus="autofocus" tabindex="18">

                                                                                        </div>

                                                                                    </div>

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">E-mail </label>
                                                                                            <input type="text" id="email_responsavel_1" name="email_responsavel_1" <?php if (!empty(old('email_responsavel_1'))) { ?>value="<?php echo old('email_responsavel_1'); ?>"<?php } ?> class="form-control input-sm" autocomplete="off" autofocus="autofocus" tabindex="19">

                                                                                        </div>

                                                                                    </div>

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Telefone 1</label>
                                                                                            <input type="text" id="telefone1_responsavel_1" name="telefone1_responsavel_1" <?php if (!empty(old('telefone1_responsavel_1'))) { ?>value="<?php echo old('telefone1_responsavel_1'); ?>"<?php } ?>  class="form-control input-sm telefone" autocomplete="off" autofocus="autofocus" maxlength="14" tabindex="20">

                                                                                        </div>

                                                                                   
                                                                                        <!-- Coluna -->
                                                                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Telefone 2 </label>
                                                                                            <input type="text" id="telefone2_responsavel_1" name="telefone2_responsavel_1" <?php if (!empty(old('telefone2_responsavel_1'))) { ?>value="<?php echo old('telefone2_responsavel_1'); ?>"<?php } ?> class="form-control input-sm telefone" autocomplete="off" autofocus="autofocus" maxlength="14" tabindex="21">

                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <!-- FIM PANEL -->

                                                                        </div>
                                                                        <!-- FIM COLUNA ESQUERDA -->

                                                                        <!-- INICIO COLUNA DIREITA -->
                                                                        <div class="col-md-6 col-xs-12">

                                                                            <!-- INICIO PANEL -->
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading"></div>
                                                                                <div class="panel-body">

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                        <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Nome </label>
                                                                                            <input type="text" id="nome_responsavel_2" name="nome_responsavel_2" <?php if (!empty(old('nome_responsavel_2'))) { ?>value="<?php echo old('nome_responsavel_2'); ?>"<?php } ?> class="form-control input-sm letra-maiuscula" autocomplete="off" autofocus="autofocus" tabindex="22">

                                                                                        </div>
                                                                                        <!-- FIM CLONUNA -->
                                                                                  
                                                                                        <!-- Coluna -->
                                                                                         <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Sexo </label>
                                                                                            <select class="form-control input-sm" name="sexo_responsavel_2" id="sexo_responsavel_2" tabindex="23">
                                                                                                <option value="">Selecione</option>
                                                                                                <option value="2" <?php if (old('sexo_responsavel_2') == 2) { echo "selected";} ?>>Feminino</option>
                                                                                                <option value="1" <?php if (old('sexo_responsavel_2') == 1) { echo "selected";} ?>>Masculino</option>                                                
                                                                                            </select>

                                                                                        </div>

                                                                                    </div>

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                        <div class="form-group col-md-12 col-xs-12">

                                                                                            <label class="control-label">Setor </label>
                                                                                            <input type="text" id="setor_responsavel_2" name="setor_responsavel_2" <?php if (!empty(old('setor_responsavel_2'))) { ?>value="<?php echo old('setor_responsavel_2'); ?>"<?php } ?> class="form-control input-sm" autocomplete="off" autofocus="autofocus" tabindex="24">

                                                                                        </div>

                                                                                    </div>

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                        <div class="form-group col-md-12 col-xs-12">

                                                                                            <label class="control-label">E-mail </label>
                                                                                            <input type="text" id="email_responsavel_2" name="email_responsavel_2" <?php if (!empty(old('email_responsavel_2'))) { ?>value="<?php echo old('email_responsavel_2'); ?>"<?php } ?> class="form-control input-sm" autocomplete="off" autofocus="autofocus" tabindex="25">

                                                                                        </div>

                                                                                    </div>

                                                                                    <!-- Linha -->
                                                                                    <div class="row">

                                                                                        <!-- Coluna -->
                                                                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Telefone 1 </label>
                                                                                            <input type="text" id="telefone1_responsavel_2" name="telefone1_responsavel_2" <?php if (!empty(old('telefone1_responsavel_2'))) { ?>value="<?php echo old('telefone1_responsavel_2'); ?>"<?php } ?> class="form-control input-sm telefone" autocomplete="off" autofocus="autofocus" maxlength="14" tabindex="26">

                                                                                        </div>
                                                                                        <!-- FIM COLUNA -->
                                                                                    

                                                                                        <!-- Coluna -->
                                                                                         <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                                                            <label class="control-label">Telefone 2 </label>
                                                                                            <input type="text" id="telefone2_responsavel_2" name="telefone2_responsavel_2" <?php if (!empty(old('telefone2_responsavel_2'))) { ?>value="<?php echo old('telefone2_responsavel_2'); ?>"<?php } ?> class="form-control input-sm telefone" autocomplete="off" autofocus="autofocus" maxlength="14" tabindex="27">

                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <!-- FIM PANEL -->

                                                                        </div>
                                                                        <!-- FIM COLUNA DIREITA -->

                                                                    </div>                                                                           

                                                                </div>
                                                            </div>
                                                            <!-- FIM PANEL -->

                                                        </div>
                                                        <!-- Fim Div PANEL ARQUIVO -->

                                                    </div> 
                                                    <!-- FIM LINHA -->
                                                    
                                                    <div class="row">
                                                 
                                                        <!-- Início Div PANEL ARQUIVO -->

                                                        <div class="col-md-12 col-xs-12 complemento_arquivo coluna_arquivo">

                                                            <a class="btn btn-md btn-info" id="btn_mostrar_arquivo" href="javascript:void(null);" tabindex="28">
                                                                <i class="fa fa-plus-circle"></i> Adicionar Arquivo
                                                            </a>

                                                            <input type="checkbox" name="check_add_arquivo" id="check_add_arquivo" value = "1" style="display:none"/>

                                                            <a class="btn btn-md btn-danger" id="btn_esconder_arquivo" href="javascript:void(null);" style="display:none" tabindex="29">
                                                                <i class="fa fa-plus-circle"></i> Remover Arquivo
                                                            </a>

                                                            <!-- INICIO PANEL -->
                                                            <div class="panel panel-default" id="caixa_arquivo" style="display:none">


                                                                <div class="panel-heading">ARQUIVOS</div>

                                                                <div class="panel-body">

                                                                    <div class="row">

                                                                        <div class="col-md-12 col-xs-12">
                                                                            Arquivos relacionados a pessoa jurídica. <br><br>
                                                                        </div>

                                                                    </div>

                                                                    <!-- Linha -->
                                                                    <div class="row">

                                                                        <!-- Coluna -->
                                                                        <div class="col-sm-6 col-xs-12">

                                                                            <label class="control-label">Documento com foto (<span data-tooltip="tooltip" data-placement="right" title="" class="yellow-tooltip" data-original-title="Restrições: Apenas arquivos com extensões PDF, JPG, JPEG ou PNG."><span class="required-red">?</span></span>)</label>

                                                                        </div>

                                                                    </div>
                                                                    <!-- Fim Linha -->

                                                                    <!-- Div com preview do arquivo selecionado via upload -->
                                                                    <div class="form-group col-md-5 col-xs-12 bg-info preview-documento-pj">

                                                                        <div class="row text-center">
                                                                            <div class="col-md-12 col-xs-12"><span style="font-size: 1.6em; color: #73879C;"><i class="fas fa-file-upload"></i></span></div>
                                                                        </div>

                                                                        <div class="row text-center">
                                                                            <div class="col-md-12 col-xs-12 txt-preview-documento-pj" style="padding-top: 5px;">Selecione um documento no seu computador</div>
                                                                        </div>

                                                                    </div>

                                                                    
                                                                    <!-- *******************
                                                                    #
                                                                    # INICIO MODAL UPLOAD DOCUMENTO
                                                                    # 
                                                                   ************************ -->
                                                                   <div class="modal fade modal_documento_pj" id="modal-documento-pj">
                                                                       <div class="modal-dialog modal-md">
                                                                           <div class="modal-content">

                                                                               <div class="modal-header">
                                                                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                   <h2 class="modal-title">Upload de Documento</h2>
                                                                               </div>
                                                                               <div class="modal-body">

                                                                                   <div class="row">

                                                                                       <!-- Espaço para exibição de erros de validação -->
                                                                                       <div id="avisoValidacao">
                                                                                           <div class="col-xs-12">
                                                                                               <div class="alert alert-danger msg_erro_documento_pj" style="display: none;"></div>
                                                                                           </div>
                                                                                       </div>

                                                                                   </div>

                                                                                   <div class="row">

                                                                                       <div class="form-group col-md-12">

                                                                                           <div class="box_alerta_amarelo">

                                                                                               <h4 style="margin-top: 0px;">Restrições</h4>

                                                                                               - Apenas arquivo com extensão PDF, JPG, JPEG ou PNG. 

                                                                                           </div>

                                                                                       </div>

                                                                                   </div>

                                                                                   <div class="row">
                                                                                       <div class="form-group col-md-12">

                                                                                           <label class="control-label">Descrição do documento</label>
                                                                                           <input type="text" class="form-control" name="descricao_arquivo_documento_pj" id="descricao_arquivo_documento_pj" maxlength="80" />

                                                                                       </div>
                                                                                   </div>

                                                                                   <div class="row">
                                                                                       <div class="col-md-12">
                                                                                           <label class="control-label">Arquivo</label>
                                                                                           <input type="file" name="arquivo_documento_pj" id="arquivo_documento_pj" class="form-control" />
                                                                                       </div>
                                                                                   </div>

                                                                               </div>  
                                                                               <div class="modal-footer">
                                                                                   <a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_documento">Enviar Arquivo</a>
                                                                                   <a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_documento">Cancelar</a>
                                                                               </div>

                                                                           </div>
                                                                       </div>
                                                                   </div>
                                                                   <!-- *******************
                                                                    #
                                                                    # FIM MODAL UPLOAD DOCUMENTO
                                                                    # 
                                                                   ************************ -->  


                                                                </div>
                                                                
                                                            </div>
                                                            <!-- FIM PANEL -->

                                                        </div>
                                                        <!-- Fim Div PANEL ARQUIVO -->
                                                        
                                                    </div>
                                                    <!-- FIM LINHA -->

                                                </div>


                                            </div>
                                            <!-- ##################### FIM CAIXA DADOS DA EMPRESA ##################### -->
   
                                            <hr>

                                            <!-- INICIO DA LINHA -->
                                            <div class="row">


                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>

                                                    <a class="btn btn-default pull-right" href="http://10.1.1.166/DR-CLUB/public/admin/painel/favorecidos"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                                                </div>


                                            </div>
                                            <!-- FIM DA LINHA -->
                                            
                                            <div class="clearfix"></div>            

                                    </div>
            
        
                                </div>
        
                            </div>

                            
                        </div>

                        
                    </form>

                    
                </div>
                <!-- FIM LINHA -->


           

        </div>


</div>

@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script src="{{ asset('plugins/webcamjs/webcam.min.js') }}"></script>

<script type="text/javascript">

// função para controlar data minima e maxima
$(function() {

   $("#data_nascimento").datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    startDate: '-120y',
    endDate: '0d',
    language: 'pt-BR'   
   });

});

// Exibir caixa de arquivo
$("#btn_mostrar_arquivo").on('click', function() {
  
    //$(this).closest("td").find("input#avaliacao_item_id")
    $("#check_add_arquivo").prop('checked', true);
    $(this).hide();
    $("#btn_esconder_arquivo").show();
    $("#caixa_arquivo").show();

});


// Escondo caixa de arquivo
$("#btn_esconder_arquivo").on('click', function() {
    
    // Limpo os campos de contato
    $("#check_add_arquivo").prop('checked', false);
    

    $(this).hide();
    $("#btn_mostrar_arquivo").show();
    $("#caixa_arquivo").hide();

});  

// função para permitir apenas caracter informado no regex
$('#nome').on('input blur keyup paste', function() {

    // Expressão regular. Permite letras e o caracter '-'
    var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\. ]/g;

    // Testo o valor digitado com a expressão
    if (this.value.match(regexp)) {

        $(this).val(this.value.replace(regexp,''));

    }

});

// função para permitir apenas caracter informado no regex
$("#email").on("input blur keyup paste", function(){
  var regexp = /[^a-zA-Z0-9-_.@]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

// funçao para permitir somente numero e virgula
function keypressed( obj , e ) {
    var tecla = ( window.event ) ? e.keyCode : e.which;
    var texto = document.getElementById("valor_comissao").value
    var indexvir = texto.indexOf(",")
    //var indexpon = texto.indexOf(".") se quiser permitir ponto é só descomentar
    
    if ( tecla == 8 || tecla == 0 )
        return true;
    if ( tecla != 44 /*&& tecla != 46*/ && tecla < 48 || tecla > 57 )
        return false;
    if (tecla == 44) { if (indexvir !== -1 || indexpon !== -1) {return false} }
    //if (tecla == 46) { if (indexvir !== -1 || indexpon !== -1) {return false} } se quiser permitit ponto é só descomentar
}
    
// Mascaras     
$(".cep").mask('00000-000');
$(".horario").mask('00:00:00');
$(".celular").mask('(00) 00000-0000');
$(".telefone").mask('(00) 0000-00000');
$(".cnpj").mask('00.000.000/0000-00');
$(".cpf").mask('000.000.000-00');

$(".select2_multiple").select2({
  placeholder: "Selecione as categorias",
  allowClear: true
});
                

// Verificando se havia um cep antes.. 
<?php if(!empty(old('cep_empresa'))) { ?> 
    // Chamo a função ..
    puxaEndereco();
    
<?php }elseif(empty(old('cep_empresa'))){ ?> 
    
    // Chamo a função caso tenha um id de estado  
    <?php if(!empty(old('cod_estado')) > 0){ ?>

          buscarCidades("{{ old('cod_estado') }}","{{ old('cod_cidade') }}");

    <?php } ?>
        
<?php } ?> 
    

/*
# FUNÇÃO PARA PUXAR ENDEREÇO VIA CEP - ESTADO, CIDADE ETC..
*/ 
function puxaEndereco() {
        var cep = "";
        var cod_estado = "";
        var cep = $("#cep_empresa").val();
        var cep = cep.replace(/\D/g, '');

        if (cep != "") {
          var validacep = /^[0-9]{8}$/;

          if (validacep.test(cep)) {

            $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
              if (!("erro" in dados)) {
                $.ajax({
                  url: "{{ url('admin/painel/buscar-estado-por-cep') }}",
                  data: {'uf': dados.uf},
                  type: 'POST',
                  dataType: 'json',
                  async: false,
                  success: function (response) {
                    $("#cod_estado option[value='" + response.cod_estado + "']").prop('selected', true);
                    cod_estado = response.cod_estado;
                    /*
                     * CÓDIGO PARA IMPRIMIR (DEPURAÇÃO) DO ARRAY
                     * document.getElementById('whereToPrint').innerHTML = JSON.stringify(dados ,null, 4);
                     */
                  }
                });

                $("#complemento_empresa").focus();

                if (dados.logradouro != "") {
                  $("#logradouro_empresa").val(dados.logradouro);
                } else {
                  $("#logradouro_empresa").focus();
                }
                /*if (dados.complemento != "") {
                  $("#complemento").val(dados.complemento);
                }*/
                if (dados.bairro != "") {
                  $("#bairro_empresa").val(dados.bairro);
                }

                $.ajax({
                  url: "{{ url('admin/painel/buscar-cidade-por-cep') }}",
                  data: {'cod_estado': cod_estado,'nome': dados.localidade},
                  type: 'POST',
                  dataType: 'json',
                  success: function (cidade) {
                    // Chamo a função de busca
                     buscarCidades(cod_estado, cidade.cod_cidade);
                     
                     /*
                     * CÓDIGO PARA IMPRIMIR (DEPURAÇÃO) DO ARRAY
                     * document.getElementById('whereToPrint').innerHTML = JSON.stringify(dados ,null, 4);
		     */
                  }
                });
              } else {               
                    alert('CEP não encontrado!');
              }
            });
          } else {
            alert('Formato de CEP inválido!');
          }
        }
    }
        
/*
 # FUNÇÃO PARA BUSCA CIDADES 
 */  

function buscarCidades(cod_estado, codCidadeSearch = null) {
 
    var cod_estado = $("#cod_estado option:selected").val();
    var cod_cidade_search = codCidadeSearch;

    if ("{{ old('cod_cidade') }}" != "") {
      var old_cidade = "{{ old('cod_cidade') }}";
    }

  $.ajax({
    url: "{{ url('admin/painel/buscar-cidades') }}",
    data: {'cod_estado': cod_estado},
    type: 'POST',
    dataType: 'json',
    success: function (response) {
      $("#cod_cidade").html('');
      $(response).each(function (index, value) {
        if (old_cidade) {
          $("#cod_cidade").append("<option value='" + value.cod_cidade + "'>" + value.nome_cidade + "</option>");
          if (old_cidade == value.cod_cidade) {
            $("#cod_cidade option[value='" + old_cidade + "']").prop('selected', true);
          }
        }else {
            if(cod_cidade_search === value.cod_cidade){
                
                $("#cod_cidade").append("<option value='" + value.cod_cidade + "' selected='selected'>" + value.nome_cidade + "</option>");
            }else{
                
                $("#cod_cidade").append("<option value='" + value.cod_cidade + "'>" + value.nome_cidade + "</option>");
            }
        }
      });
    },
    error: function (response) {
      // Alerta de erro
       alert('Falha! Atualize a página e tente novamente.');
    }
  });
}
 
/*
 # FUNÇÃO PARA VERIFICAR
 # SE O CNPJ É VÁLIDO
 */ 
function validaCampos() {
    var cpf_cnpj = $("#cnpj").val();

   $("#alert-validacao").remove();

    if (cpf_cnpj != "") {
      if (!valida_cpf_cnpj(cpf_cnpj)){
        $('html,body').scrollTop(0);
        $("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>CNPJ inválido.</li></ul></div></div>");
        return false;
      }
    };
}


/**************************************************************
#
# Atribui função ao evento click da div .preview-documento
# Ao clicar na div abre um modal para escolher/selecionar DOCUMENTO no seu PC
# 
***************************************************************/ 
$(document).on('click', '.preview-documento-pj', function() { 
   $(this).closest('.complemento_arquivo').find('.modal_documento_pj').modal('show');
});


/***********************************************
#
# Aplicando função no botão SALVAR DOCUMENTO
# Para upload de DOCUMENTO dentro de Modal
# 
************************************************/ 
$(document).on('click', '.btn_salvar_documento', function(e) {
   
   //Cancela o evento se for cancelavel, sem parar a propagação do mesmo.
   e.preventDefault(); 

   // Guardo instância do elemento
   var elemento = $(this);

   //cria um objeto FormData vazio
   var form_data = new FormData();
   var documento_selecionado_pj = $(this).closest('.complemento_arquivo').find('#arquivo_documento_pj')[0].files[0];        
   var descricao_documento_selecionado_pj = $(this).closest('.complemento_arquivo').find('#descricao_arquivo_documento_pj').val();  

   //validação
   if (descricao_documento_selecionado_pj == '') {

       alert('A escolha de uma descrição para o documento em questão é obrigatória.');

       return false;

   }

   //adiciona novo valor dentro de um chave existente dentro da FormData object, 
   //ou adiciona a chave caso ainda não exista.
   form_data.append('documento_upload', documento_selecionado_pj);
   form_data.append('descricao_documento_upload', descricao_documento_selecionado_pj);

   // Requisição ajax
   $.ajax({
       cache: false,
       contentType: false,
       processData: false,
       type: "POST",
       url: "<?php echo url('admin/painel/favorecidos/documento-favorecidos-pj-upload'); ?>",
       data: form_data,
       beforeSend: function() { 

           // Exibo div de erros
           elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').hide();

           // Limpo div de mensagens de erro
           elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').html('');

       },
       success: function(response) {

           // Convertendo resposta para objeto javascript
           var response = JSON.parse(response);

           // Checo retorno
           if (response.status == 'erro') {

               // Coloco mensagem dentro da div de erros
               elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').append('<h4 class="pt-0">Alerta</h4>');
               elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').append(response.erro);  

               // Exibo div de erros
               elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').show();            

           } else if (response.status == 'sucesso') {

               // Atualiza preview 
               elemento.closest('.complemento_arquivo').find('.txt-preview-documento-pj').html('<span style="color: #4286f4;">Arquivo selecionado: ' + documento_selecionado_pj.name + '</span>');

               // Remove possiveis INPUT HIDDEN criados anteriormente
               elemento.closest('.complemento_arquivo').find('#documento_foto_pj').remove();
               elemento.closest('.complemento_arquivo').find('#descricao_documento_foto_pj').remove();

               // Coloca dados do documento dentro de INPUT HIDDEN
               elemento.closest('.complemento_arquivo').find('.preview-documento-pj').append("<input type='hidden' id='documento_foto_pj' name='documento_foto_pj' value='" + response.nome_documento + "' />");
               elemento.closest('.complemento_arquivo').find('.preview-documento-pj').append("<input type='hidden' id='descricao_documento_foto_pj' name='descricao_documento_foto_pj' value='" + response.descricao_documento + "' />");

               // Fecha o modal
               elemento.closest('.complemento_arquivo').find('.modal_documento_pj').modal('hide');

           }

       },
       complete: function(response) {
           // Nothing here
       },
       error: function(response, thrownError) {

           // Coloco mensagem dentro da div de erros
           elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').append('<h4 class="pt-0">Alerta</h4>');
           elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').append('Falha ao fazer upload do documento.');  

           // Exibo div de erros
           elemento.closest('.coluna_arquivo').find('.msg_erro_documento_pj').show();

       }
   });

});



/***********************************************
#
# Aplicando função no botão CANCELAR
# Para fechar Modal de upload de DOCUMENTO
# 
************************************************/ 
$(document).on('click', '.btn_cancelar_documento', function(e) {
   e.preventDefault(); 
   $(this).closest('.complemento_arquivo').find('.modal_documento_pj').modal('hide');
});
 


/************************
 # FUNÇÃO PARA WEBCAM
 # --------------------
 */ 
function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#thumb').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    } else {
      $('#thumb').attr('src', '');
    }
  }

$('.webcam').click('click', function () {
  Webcam.attach('#my_camera');

  // Em caso de Erro
  Webcam.on('error', function () {
    alert('Ocorreu um Erro! A Webcam não foi encontrada.');
    $('.modal').modal('hide');
  });
});

//Limpar Campo de Foto
$('.clear-foto').click('click', function () {
  $('#thumb').removeAttr('src');
  $('#foto-webcam').remove();
  $('.clear-foto').hide();
});


// Predefinições da Webcam na Tela
Webcam.set({
  width: 326,
  height: 246,
  dest_width: 320,
  dest_height: 240,
  image_format: 'jpeg',
  jpeg_quality: 100,
  force_flash: false,
  flip_horiz: true,
  fps: 45
});

// Pausar Câmera para caprtura
function take_snapshot() {
  Webcam.freeze();
}

// Despausar Câmera para nova foto
function clear_snapshot() {
  Webcam.unfreeze();
}

// Desligar Câmera
function close_snapshot() {
  Webcam.reset();
}

// Realizar o salvamento da imagem via ajax e retorna a mesma na tela
function save_snapshot() {
  Webcam.snap(function (data_uri) {

    $.ajax({
      url: "{{ url('admin/painel/funcionarios/imagem_webcam') }}",
      data: {'data_uri': data_uri},
      type: "POST",
      dataType: 'json',
      success: function (imagem) {
        if (imagem != false) {
          $('#thumb').attr('src', '<?php echo URL::asset('images/funcionarios') . "/"; ?>' + imagem.name_file);
          document.getElementById('imagem').innerHTML += "<input id='foto-webcam' type='hidden' value='" + imagem.name_file + "' name='foto_webcam' />";
          $('.clear-foto').show();
        }
      },
      error: function () {
        alert("OPS! Ocorreu um erro.\n\nA foto não pode ser processada. Tente novamente!");
      }
    });
  });

  close_snapshot();
}
// Fim dos Parâmetros e Funções para Capturar foto da WebCam

</script>
@stop
