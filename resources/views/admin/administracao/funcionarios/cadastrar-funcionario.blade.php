@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Funcionários | Cadastrar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/select2/dist/css/select2.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('css/administracao/medicos/medicos-cadastrar.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('funcionarios-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Funcionário</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <form method="POST" action="<?php echo url('admin/painel/funcionarios/cadastrar-funcionario'); ?>" enctype="multipart/form-data">
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

                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fas fa-user"></i> Dados pessoais</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <!-- Inicio Coluna da Foto -->
                                                    <div class="col-sm-4 col-xs-12 coluna_foto">

                                                        <label class="control-label">Foto (<span data-tooltip="tooltip" data-placement="right" title="Restrições: Apenas arquivos com extensões JPG, JPEG ou PNG." class="yellow-tooltip"><span class="required-red">?</span></span>)</label>

                                                        <div class="webcam-grid">
                                                            <a class="btn btn-primary gray-tooltip webcam" data-tooltip="tooltip" data-placement="bottom" title="Tire uma foto com a Webcam"><span><i class="fas fa-camera-retro" aria-hidden="true"></i></span></a>
                                                            <a class="btn btn-danger clear-foto" title="Limpar Foto"><span><i class="fas fa-trash-alt" aria-hidden="true"></i></span></a>
                                                        </div>

                                                        <div id="imagem" class="thumbnail preview-imagem">
                                                            <img id="thumb" class="img-responsive lightblue-tooltip foto_thumb" data-tooltip="tooltip" data-placement="bottom" title="Upload de arquivo de imagem" src="<?php echo asset('images/sem_foto.jpg'); ?>" />
                                                        </div>

                                                        <!-- *******************
                                                         #
                                                         # INICIO MODAL UPLOAD
                                                         # 
                                                        ************************ -->
                                                        <div class="modal fade modal_upload" id="modal-upload">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h2 class="modal-title">Upload de Foto</h2>
                                                                    </div>

                                                                    <div class="modal-body">

                                                                        <div class="row">

                                                                            <!-- Espaço para exibição de erros de validação -->
                                                                            <div id="avisoValidacao">
                                                                                <div class="col-xs-12">
                                                                                    <div class="alert alert-danger msg_erro_modal" style="display: none;"></div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="form-group col-md-12">

                                                                                <div class="box_alerta_amarelo">

                                                                                    <h4 style="margin-top: 0px;">Restrições</h4>

                                                                                    - Apenas arquivo com extensão JPG, PNG ou GIF. 

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label class="control-label">Arquivo</label>
                                                                                <input type="file" name="foto" id="foto" class="form-control foto_pessoa" /> 
                                                                            </div>
                                                                        </div>

                                                                    </div>  
                                                                    <div class="modal-footer">
                                                                        <a href="javascript:void(null);" class="btn btn-md btn-success" id="btn_salvar_imagem">Enviar Arquivo</a>
                                                                        <a href="javascript:void(null);" class="btn btn-md btn-danger " id="btn_cancelar_imagem">Cancelar</a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- *******************
                                                         #
                                                         # FIM MODAL UPLOAD
                                                         # 
                                                        ************************ -->

                                                        <!-- *******************
                                                         #
                                                         # INICIO MODAL WEBCAM
                                                         # 
                                                        ************************ -->
                                                        <div class="modal fade modal_webcam" id="modal-webcam" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <button onclick="close_snapshot();" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                        <h2 class="modal-title"><strong>Tire a foto com a Webcam</strong></h2>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div id="my_camera" class="center-block"><!-- ESPAÇO ONDE APARECERÁ A FOTO --></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="margin-top: 10px;">
                                                                            <div class="col-md-12">
                                                                                <div align="center">
                                                                                    <a href="javascript:void(null);" class="btn btn-sm btn-primary btn_tirar_foto">Tirar Foto</a>
                                                                                    <a href="javascript:void(null);" class="btn btn-sm btn-info btn_nova_foto">Nova Foto</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_foto">Salvar Foto</a>
                                                                        <a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_foto">Cancelar</a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- *****************
                                                         #
                                                         # FIM MODAL WEBCAM
                                                         # 
                                                        ********************** -->

                                                    </div>
                                                    <!-- Fim Coluna da Foto -->

                                                    <div class="col">
                                                        <div class="col-lg-8 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Nome <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control" name="nome_funcionario" id="nome_funcionario" placeholder="Nome" <?php if (!empty(old('nome_funcionario'))) { ?>value="<?php echo old('nome_funcionario'); ?>"<?php } ?>  minlength="8" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">

                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">CPF <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="000.000.000-00" <?php if (!empty(old('cpf'))) { ?>value="<?php echo old('cpf'); ?>"<?php } ?> minlength="14" autocomplete="off" onblur="return validaCampos()">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Data de Nascimento </label>
                                                                <input type="text" class="form-control datepicker" name="data_nascimento" id="data_nascimento" placeholder="00/00/0000" autocomplete="off" <?php if (!empty(old('data_nascimento'))) { ?>value="<?php echo old('data_nascimento'); ?>"<?php } ?>>
                                                            </div>
                                                        </div>                                                        

                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Sexo <span class="required-red">*</span></label>
                                                                <select class="form-control" name="sexo" id="sexo">
                                                                    <option value="">Selecione</option>
                                                                    <option value="2" <?php if (old('sexo') == 2) { echo "selected";} ?>>Feminino</option>
                                                                    <option value="1" <?php if (old('sexo') == 1) { echo "selected"; } ?>>Masculino</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                              <label class="control-label">Estado Civil</label>
                                                                  <select class="form-control" name="estado_civil" id="estado_civil">
                                                                      <option value="">Selecione..</option>
                                                                      <option value="2" <?php if (old('estado_civil') == 2) { echo "selected";} ?>>Casado (a)</option>
                                                                      <option value="4" <?php if (old('estado_civil') == 4) { echo "selected";} ?>>Divorciado (a)</option>
                                                                      <option value="1" <?php if (old('estado_civil') == 1) { echo "selected";} ?>>Solteiro (a)</option>
                                                                      <option value="3" <?php if (old('estado_civil') == 3) { echo "selected";} ?>>Viúvo (a)</option>
                                                                  </select>
                                                            </div>
                                                        </div>

                                                    </div>                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> <!-- INICIO DIV INFORMAÇÕES DE CONTATO -->

                            <div class="panel panel-default">

                                <div class="panel-heading"><i class="fas fa-phone-volume"></i> Informações de contato </div>

                                <div class="panel-body">   
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">E-mail</label>
                                                <input type="email" autocomplete="off" class="form-control caixa_baixa" name="email" id="email" placeholder="exemplo@exemplo.com" <?php if (!empty(old('email'))) { ?>value="<?php echo old('email'); ?>"<?php } ?>>
                                            </div>
                                        </div>                          
                                    </div>  
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Telefone</label>
                                                <input type="tel" autocomplete="off" class="form-control telefone" name="telefone" id="telefone" placeholder="(00) 0000-0000" <?php if (!empty(old('telefone'))) { ?>value="<?php echo old('telefone'); ?>"<?php } ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Celular</label>
                                                <input type="tel" autocomplete="off" class="form-control celular" name="celular" id="celular" placeholder="(00) 0000-0000" <?php if (!empty(old('telefone'))) { ?>value="<?php echo old('celular'); ?>"<?php } ?>>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">CEP</label>
                                                <input type="text" autocomplete="off" class="form-control cep" name="cep" id="cep" placeholder="00000-000"  <?php if (!empty(old('cep'))) { ?> value="<?php echo old('cep'); ?>" <?php } ?>>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Estado</label>
                                                <select class="form-control estado" name="estado" id="estado" tabindex="37">
                                                    <option value="">Selecione</option>
                                                    <?php
                                                    foreach ($estados as $estado) :
                                                        ?>
                                                        <option value="{{ $estado->cod_estado }}" <?php if (old('estado') == $estado->cod_estado) {
                                                            echo "selected";
                                                        } ?>>{{ $estado->nome_estado }}</option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>                                            
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Cidade</label>
                                                <select class="form-control cidade" name="cidade" id="cidade" tabindex="38">
                                                    <option value="">Selecione um estado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Bairro</label>
                                                <input type="text" autocomplete="off" class="form-control" name="bairro" id="bairro" placeholder="Bairro" <?php if (!empty(old('bairro'))) { ?>value="<?php echo old('bairro'); ?>"<?php } ?>>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-lg-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Logradouro</label>
                                                <input type="text" autocomplete="off" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" <?php if (!empty(old('logradouro'))) { ?>value="<?php echo old('logradouro'); ?>"<?php } ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">  
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Complemento</label>
                                                <input type="text" autocomplete="off" class="form-control" name="complemento" id="complemento" placeholder="Complemento" <?php if (!empty(old('complemento'))) { ?>value="<?php echo old('complemento'); ?>"<?php } ?>>
                                            </div>
                                        </div>    
                                        <div class="col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Número</label>
                                                <input type="text" autocomplete="off" class="form-control" name="numero" id="numero" placeholder="Número ou lote e quadra" <?php if (!empty(old('numero'))) { ?>value="<?php echo old('numero'); ?>"<?php } ?> onkeypress="return event.charCode >= 48" min="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        </div> <!-- FIM DIV INFORMAÇÕES DE CONTATO  -->
                    
                    
                    <div class="col-xs-12"> <!-- INICIO DIV PAGAMENTOS -->

                        <div class="panel panel-default"> <!-- INICIO PANEL PAGAMENTOS -->
                            <div class="panel-heading"><i class="fa fa-laptop"></i> Informações de Pagamento</div>
                            <div class="panel-body">                                
                               
                                <!--PAGAMENTO SALÁRIO-->
                                
                                <div class="col-xs-5 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Salário</label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_salario" id="valor_salario" placeholder="Valor em R$ do Salário" <?php if (!empty(old('valor_salario'))) { ?>value="<?php echo old('valor_salario'); ?>"<?php } ?>>
                                    </div>
                                </div>  

                                <div class="col-xs-3 col-sm-4">                                
                                    <div class="form-group">
                                        <label class="control-label">Tipo</label>
                                        <select class="form-control" name="tipo_salario" id="tipo_salario">  
                                            <option value="">Selecione a opção</option>
                                            <option value="1" <?php if(old('tipo_salario') == 1){ echo "selected"; }?>>Diário</option>
                                            <option value="2" <?php if(old('tipo_salario') == 2){ echo "selected"; }?>>Semanal</option>
                                            <option value="3" <?php if(old('tipo_salario') == 3){ echo "selected"; }?>>Quinzenal</option>
                                            <option value="4" <?php if(old('tipo_salario') == 4){ echo "selected"; }?>>Mensal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-4">                                     
                                    <div class="form-group">
                                        <label class="control-label">Período</label>
                                        <select class="form-control" name="periodo_salario" id="periodo_salario">  
                                            <option value="">Selecione a opção</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!--FIM PAGAMENTO SALÁRIO-->
                                
                                <!--PAGAMENTO TRANSPORTE-->
                                
                                <div class="col-xs-5 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Valor de Transporte</label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_transporte" id="valor_transporte" placeholder="Valor gasto em R$ Transporte" <?php if (!empty(old('valor_transporte'))) { ?>value="<?php echo old('valor_transporte'); ?>"<?php } ?>>
                                    </div>
                                </div>  

                                <div class="col-xs-3 col-sm-4">                                
                                    <div class="form-group">
                                        <label class="control-label">Tipo</label>
                                        <select class="form-control" name="tipo_transporte" id="tipo_transporte">  
                                            <option value="">Selecione a opção</option>
                                            <option value="1" <?php if(old('tipo_transporte') == 1){ echo "selected"; }?>>Diário</option>
                                            <option value="2" <?php if(old('tipo_transporte') == 2){ echo "selected"; }?>>Semanal</option>
                                            <option value="3" <?php if(old('tipo_transporte') == 3){ echo "selected"; }?>>Quinzenal</option>
                                            <option value="4" <?php if(old('tipo_transporte') == 4){ echo "selected"; }?>>Mensal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-4">                                     
                                    <div class="form-group">
                                        <label class="control-label">Período</label>
                                        <select class="form-control" name="periodo_transporte" id="periodo_transporte">  
                                            <option value="">Selecione a opção</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!--FIM PAGAMENTO TRANSPORTE-->
                                
                                <!--PAGAMENTO ALIMENTAÇÃO-->
                                
                                <div class="col-xs-5 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Valor da Alimentação</label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_alimentacao" id="valor_alimentacao" placeholder="Valor gasto em R$ Alimentação" <?php if (!empty(old('valor_alimentacao'))) { ?>value="<?php echo old('valor_alimentacao'); ?>"<?php } ?>>
                                    </div>
                                </div>  

                                <div class="col-xs-3 col-sm-4">                                
                                    <div class="form-group">
                                        <label class="control-label">Tipo</label>
                                        <select class="form-control" name="tipo_alimentacao" id="tipo_alimentacao">  
                                            <option value="">Selecione a opção</option>
                                            <option value="1" <?php if(old('tipo_alimentacao') == 1){ echo "selected"; }?>>Diário</option>
                                            <option value="2" <?php if(old('tipo_alimentacao') == 2){ echo "selected"; }?>>Semanal</option>
                                            <option value="3" <?php if(old('tipo_alimentacao') == 3){ echo "selected"; }?>>Quinzenal</option>
                                            <option value="4" <?php if(old('tipo_alimentacao') == 4){ echo "selected"; }?>>Mensal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-4">                                     
                                    <div class="form-group">
                                        <label class="control-label">Período</label>
                                        <select class="form-control" name="periodo_alimentacao" id="periodo_alimentacao">  
                                            <option value="">Selecione a opção</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!--FIM PAGAMENTO ALIMENTAÇÃO--> 
                                
                                <!---->
                                
                                <div class="col-xs-5 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">INSS</label>
                                        <div class="input-group">
                                            <input type="text" autocomplete="off" class="form-control" name="percentual_inss" id="percentual_inss" placeholder="Percentual INSS" <?php if (!empty(old('percentual_inss'))) { ?>value="<?php echo old('percentual_inss'); ?>"<?php } ?>>
                                            <span class="input-group-addon">
                                                <label class="control-label">%</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>  

                                <div class="col-xs-3 col-sm-4">                                
                                    <div class="form-group">
                                        <label class="control-label">IR </label>
                                        <div class="input-group">
                                            <input type="text" autocomplete="off" class="form-control" name="percentual_ir" id="percentual_ir" placeholder="Percentual IR" <?php if (!empty(old('percentual_ir'))) { ?>value="<?php echo old('percentual_ir'); ?>"<?php } ?>>
                                            <span class="input-group-addon">
                                                <label class="control-label">%</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">                                     
                                    <div class="form-group">
                                        <label class="control-label">Vale Transporte</label>
                                        <div class="input-group">
                                            <input type="text" autocomplete="off" class="form-control" name="percentual_vale_transporte" id="percentual_vale_transporte" placeholder="Percentual Vale Transporte" <?php if (!empty(old('percentual_vale_transporte'))) { ?>value="<?php echo old('percentual_vale_transporte'); ?>"<?php } ?>>
                                            <span class="input-group-addon">
                                                <label class="control-label">%</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!---->
                                
                                <!---->
                                
                                <div class="col-xs-5 col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Adiantamento</label>
                                        <div class="input-group">
                                        <input type="text" autocomplete="off" class="form-control" name="percentual_adiantamento" id="percentual_adiantamento" placeholder="Percentual Adiantamento" <?php if (!empty(old('percentual_adiantamento'))) { ?>value="<?php echo old('percentual_adiantamento'); ?>"<?php } ?>>
                                            <span class="input-group-addon">
                                                <label class="control-label">%</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>  

                                <div class="col-xs-4">                                     
                                    <div class="form-group">
                                        <label class="control-label">Valor de Insalubridade</label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_insalubridade" id="valor_insalubridade" placeholder="Valor gasto em Insalubridade" <?php if (!empty(old('valor_insalubridade'))) { ?>value="<?php echo old('valor_insalubridade'); ?>"<?php } ?>>
                                    </div>
                                </div>
                                                                
                                <div class="col-xs-3 col-sm-4">                                
                                    <div class="form-group">
                                        <label class="control-label">Pagamento no caixa?</label>
                                        <input class="form-check-input" type="checkbox" name="pagamento_no_caixa" id="pagamento_no_caixa" value="1"  <?php if (old('pagamento_no_caixa') == "1") { echo "checked";} ?> >
                                    </div>
                                </div>
                                
                                <!---->
                                                                
                            </div> <!-- FIM PANEL PAGAMENTOS -->    
                        </div>
                    </div>     
                        
                        
                    <div class="col-xs-12"> <!-- INICIO DIV LOGIN -->

                        <div class="panel panel-default"> <!-- INICIO PANEL LOGIN -->
                            <div class="panel-heading"><i class="fa fa-laptop"></i> Informações de Login</div>
                            <div class="panel-body">
                    
                                <div class="row">

                                    <div class="col-lg-12">    
                                        <div class="form-group">
                                            <label class="control-label">Unidades <span class="required-red">*</span></label>
                                            <select class="form-control unidades" name="unidades[]" id="unidades" style="width:100%" multiple>
                                                @foreach ($unidades as $unidade)
                                                    <option value="{{ $unidade->cod_unidade }}" <?php if (old('unidades') && in_array($unidade->cod_unidade, old('unidades'))) { echo "selected"; }?>>{{ $unidade->nome_unidade }}</option>
                                                @endforeach
                                            </select>
                                        </div>    
                                    </div>

                                </div>

                                <div class="row"> 

                                    <div class="col-lg-6">    
                                        <div class="form-group">
                                            <label class="control-label">Usuário <span class="required-red">*</span></label>
                                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" value="{{ old('usuario') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">    
                                        <div class="form-group">
                                            <label class="control-label">Senha <span class="required-red">*</span></label>
                                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="{{ old('senha') }}" minlength="6" maxlength="30">
                                        </div>  
                                    </div>

                                </div>
                                <div class="row"> 

                                    <div class="col-lg-6">    
                                        <div class="form-group">
                                            <label class="control-label">Painéis de acesso <span class="required-red">*</span></label>
                                            <select class="form-control input-sm paineis" name="paineis[]" id="paineis" style="width:100%" multiple>
                                                @foreach ($paineis as $painel)
                                                    <option value="{{ $painel->cod_painel }}" <?php if (old('paineis') && in_array($painel->cod_painel, old('paineis'))) { echo "selected"; }?>>{{ $painel->nome_painel }}</option>
                                                @endforeach
                                            </select>
                                        </div>    
                                    </div>
                                    <div class="col-lg-6">    
                                        <div class="form-group">
                                            <label class="control-label">Perfil de acesso <span class="required-red">*</span></label>
                                            <select class="form-control" name="cod_perfil" id="cod_perfil" onchange="verificaPermissao()">
                                                <option value="">Selecione</option>
                                                @if(count($perfis) > 0)

                                                    @foreach($perfis as $perfil)

                                                        <option value="{{ $perfil->id }}" <?php if (old('cod_perfil') == $perfil->id) { echo "selected"; } ?>>{{ $perfil->display_name }}</option>
                                                    
                                                    @endforeach

                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div> <!-- FIM PANEL LOGIN -->    
                        </div>

                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/funcionarios/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
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

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.form.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/valida_cpf_cnpj.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/webcamjs/webcam.min.js'); ?>"></script>

<script type="text/javascript">
// Não é possivel utilizar comandos do Laravel dentro de um arquivo JS externo, então guardamos a URL numa variavel JS global
// Estas variaveis tem que ser declaradas antes do arquivo JS que irá utilizá-las
var UrlListarCidadesEstado = '<?php echo url('admin/painel/listar-cidades-estado'); ?>';
var UrlBuscarEstadoPorUf = '<?php echo url('admin/painel/buscar-estado-por-uf'); ?>';
var UrlBuscarCidadePorNomeEstado = '<?php echo url('admin/painel/buscar-cidade-por-nome-estado'); ?>';
</script>

<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/combos_estados_cidades.js'); ?>"></script> <!-- Arquivo responsável pelo preenchimento dinâmico dos comboboxes de estado/cidade -->
<script type="text/javascript" src="<?php echo asset('js/preenche_endereco.js'); ?>"></script> <!-- Arquivo responsável pelo preenchimento dinâmico dos campos de endereço utilizando o CEP digitado -->
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>
<script type="text/javascript">


// Ativa máscara de dinheiro em campos
$('#valor_salario').maskMoney();
$('#valor_transporte').maskMoney();
$('#valor_alimentacao').maskMoney();
$('#valor_insalubridade').maskMoney();

$('#percentual_inss').maskMoney();
$('#percentual_ir').maskMoney();
$('#percentual_transporte').maskMoney();
$('#percentual_adiantamento').maskMoney();
$('#percentual_vale_transporte').maskMoney();
    
/*****************************************************
     ::: VERIFICAR SE O CPF E/OU CNPJ É VÁLIDO  :::
******************************************************/   
    function validaCampos() {
        var cpf_cnpj = $("#cpf").val();

       $("#alert-validacao").remove();

        if (cpf_cnpj != "") {
          if (!valida_cpf_cnpj(cpf_cnpj)){
            $('html,body').scrollTop(0);
            $("#avisoValidacao").append("<div class='col-xs-12' id='alert-validacao'><div class='alert alert-danger'><ul><li>CPF inválido.</li></ul></div></div>");
            return false;
          }
        };
    }    
    
/*****************************************************
     ::: MULTI SELECT :::
******************************************************/   

 $(".unidades").select2({
    placeholder: "Selecione as unidades",
    allowClear: true
});

$("#paineis").select2({
    placeholder: "Paineis",
    allowClear: true
});


/*
 # FUNÇÃO PARA VIZUALIZAR PREVIEW DA IMAGEM (UPLOAD) 
 */
$(document).on('click', '#close-preview', function () {
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
            },
            function () {
                $('.image-preview').popover('hide');
            }
    );
});

$(document).ready(function () {
    
    <?php if (!empty(old('estado'))) { ?>
        atualizaComboCidade($('.estado'), $('.estado').find('option:selected').val(), <?php echo old('cidade'); ?>);
    <?php } ?>

    // Create the close button
    var closebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class", "close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
        content: "Não há imagem",
        placement: 'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function () {
        $('.image-preview').attr("data-content", "").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Procurar");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function () {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 150,
            height: 150
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Alterar");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });
});

/*****************************************************
 ::: MÁSCARAS INPUTS :::
 ******************************************************/

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    weekStart: 0,
    startDate: '-117y',
    todayHighlight: true
});

// Mascaras     
$(".cep").mask('00000-000');
$(".celular").mask('(00) 00000-0000');
$(".telefone").mask('(00) 0000-00000');
$(".cpf").mask('000.000.000-00');

// Variavel de controle do multiplos usos da webcam
var origem_camera = null;

/*******************************
 #
 # Funções para uso da Webcam
 # PARA TIRAR FOTOS DAS PESSOAS
 # 
 ********************************/
// Predefinições da Webcam na tela
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

// Mensagem customizada para sinalizar que camera está pronta para uso
Webcam.on('live', function () {
    //console.log('Camera is alive!');
});

// Mensagem customizada em caso de erro de webcam
Webcam.on('error', function () {
    alert('Atenção! A Webcam não foi encontrada.');
});

// Pausar Câmera para captura
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

// Aplicando função no botão WEBCAM (Abre modal para tirar foto com a Webcam)
$(document).on('click', '.webcam', function () {

    var elemento = $(this);

    Webcam.attach('#my_camera');

    $(elemento).closest('.coluna_foto').find('.modal_webcam').modal('show');

});

// Aplicando função no botão de LIMPAR campo de Foto
$(document).on('click', '.clear-foto', function () {

    $(this).closest('.coluna_foto').find('#thumb').attr('src', "<?php echo asset('images/pessoa/sem_foto.jpg'); ?>");
    $(this).closest('.coluna_foto').find('#foto_webcam').remove();
    $(this).closest('.coluna_foto').find('.clear-foto').hide();

});

// Aplicando função no botão TIRAR FOTO
$(document).on('click', '.btn_tirar_foto', function () {

    take_snapshot();

});

// Aplicando função no botão NOVA FOTO
$(document).on('click', '.btn_nova_foto', function () {

    clear_snapshot();

});

// Aplicando função no botão SALVAR FOTO (Realizar o salvamento da imagem via ajax e retorna preview da mesma na tela)
$(document).on('click', '.btn_salvar_foto', function () {

    var elemento = $(this);
    origem_camera = 'foto_pessoa';

    if (origem_camera == 'foto_pessoa') {

        Webcam.snap(function (data_uri) {

            $.ajax({
                url: "<?php echo url('admin/painel/funcionarios/foto-funcionario-webcam'); ?>",
                data: {'data_uri': data_uri},
                type: 'POST',
                dataType: 'json',
                success: function (response) {

                    if (response != false) {

                        $(elemento).closest('.coluna_foto').find('#thumb').attr('src', '<?php echo URL::asset('arquivos-temporarios/funcionarios') . "/"; ?>' + response.name_file);
                        $(elemento).closest('.coluna_foto').find('#imagem').append("<input type='hidden' id='foto_webcam' name='foto_webcam' value='" + response.name_file + "' />");
                        $(elemento).closest('.coluna_foto').find('.clear-foto').show();

                    }

                    close_snapshot();

                },
                error: function () {
                    alert('Erro! A foto não pôde ser processada. Tente novamente.');
                }
            });

        });

        origem_camera = null;

        $(elemento).closest('.coluna_foto').find('.modal_webcam').modal('hide');

    }

});

// Aplicando função no botão CANCELAR FOTO
$(document).on('click', '.btn_cancelar_foto', function () {

    var elemento = $(this);
    close_snapshot();
    $(elemento).closest('.coluna_foto').find('.modal_webcam').modal('hide');

});



/**************************************************************
 #
 # Atribui função ao evento blur dos inputs com a classe .cep
 # Utiliza funções presentes no arquivo preenche_endereco.js
 # 
 ***************************************************************/
$(document).on('blur', '.cep', function () {
    puxaEndereco(this);
});


/***********************************************************************
 #
 # Atribui função ao evento change dos comboboxes com a classe .estado
 # Utiliza funções presentes no arquivo combos_estados_cidades.js
 # 
 ************************************************************************/
$(document).on('change', '.estado', function () {
    atualizaComboCidade(this, $(this).find('option:selected').val());
});

/**************************************************************
 #
 # Atribui função ao evento click da div .preview-imagem
 # Ao clicar na div abre um modal para escolher/selecionar a imagem no seu PC
 # 
 ***************************************************************/
$(document).on('click', '.preview-imagem', function () {
    $(this).closest('.coluna_foto').find('.modal_upload').modal('show');
});

/***********************************************
 #
 # Aplicando função no botão SALVAR IMAGEM
 # Para upload de imagem (foto) dentro de Modal
 # 
 ************************************************/
$(document).on('click', '#btn_salvar_imagem', function (e) {

    // Cancela o evento se for cancelavel, sem parar a propagação do mesmo.
    e.preventDefault();

    // Guardo instância do elemento
    var elemento = $(this);

    //cria um objeto FormData vazio
    var form_data = new FormData();
    var foto_selecionada = $(this).closest('.coluna_foto').find('#foto')[0].files[0];

    //adiciona novo valor dentro de um chave existente dentro  da FormData object, 
    //ou adiciona a chave caso ainda não exista.
    form_data.append('foto_upload', foto_selecionada);

    // Requisição ajax
    $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        type: "POST",
        url: "<?php echo url('admin/painel/funcionarios/foto-funcionario-upload'); ?>",
        data: form_data,
        beforeSend: function () {

            // Exibo div de erros
            elemento.closest('.coluna_foto').find('.msg_erro_modal').hide();

            // Limpo div de mensagens de erro
            elemento.closest('.coluna_foto').find('.msg_erro_modal').html('');

        },
        success: function (response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo retorno
            if (response.status == 'erro') {

                // Coloco mensagem dentro da div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_modal').append('<h4 class="pt-0">Alerta</h4>');
                elemento.closest('.coluna_foto').find('.msg_erro_modal').append(response.erro);

                // Exibo div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_modal').show();

            } else if (response.status == 'sucesso') {

                // Atualiza preview 
                elemento.closest('.coluna_foto').find('.foto_thumb').attr('src', response.caminho_completo_foto);

                // Remove possiveis INPUT HIDDEN criados anteriormente
                elemento.closest('.coluna_foto').find('#foto_upload').remove();

                // Coloca nome da foto dentro de INPUT HIDDEN
                elemento.closest('.coluna_foto').find('#imagem').append("<input type='hidden' id='foto_upload' name='foto_upload' value='" + response.nome_foto + "' />");

                // Fecha o modal
                elemento.closest('.coluna_foto').find('.modal_upload').modal('hide');

            }

        },
        complete: function (response) {
            // Nothing here
        },
        error: function (response, thrownError) {

            // Coloco mensagem dentro da div de erros
            elemento.closest('.coluna_foto').find('.msg_erro_modal').append('<h4 class="pt-0">Alerta</h4>');
            elemento.closest('.coluna_foto').find('.msg_erro_modal').append('Falha ao fazer upload da foto.');

            // Exibo div de erros
            elemento.closest('.coluna_foto').find('.msg_erro_modal').show();

        }
    });

});

/******************************************************************************
#Inicio -> Estrutura para manter valor carregado caso, der algum erro da página
*******************************************************************************/
$(document).ready(function () {
        
    //Ao carregar a página verifico se tem valor
    var tipo_salario = $("#tipo_salario").val();
    var tipo_transporte = $("#tipo_transporte").val();
    var tipo_alimentacao = $("#tipo_alimentacao").val();
    
    
    //se tipo_salario não tiver valor não entra 
    if(tipo_salario != ""){ 
                
        switch(tipo_salario){

            //Caso seja diário
            case "1":               
                $("#periodo_salario").append("<option value='1' <?php if(old('periodo_salario') == 1){ echo "selected"; }?>>Segunda-feira à Sexta-feira</option>");
                $("#periodo_salario").append("<option value='2' <?php if(old('periodo_salario') == 2){ echo "selected"; }?>>Segunda-feira à Sábado</option>");
                $("#periodo_salario").append("<option value='3' <?php if(old('periodo_salario') == 3){ echo "selected"; }?>>Todos os dias</option>");
            break;

            //Caso seja semanal
            case "2":                    
                $("#periodo_salario").append("<option value='1' <?php if(old('periodo_salario') == 1){ echo "selected"; }?>>Domingo</option>");
                $("#periodo_salario").append("<option value='2' <?php if(old('periodo_salario') == 2){ echo "selected"; }?>>Segunda-feira</option>");
                $("#periodo_salario").append("<option value='3' <?php if(old('periodo_salario') == 3){ echo "selected"; }?>>Terça-feira</option>");
                $("#periodo_salario").append("<option value='4' <?php if(old('periodo_salario') == 4){ echo "selected"; }?>>Quarta-feira</option>");
                $("#periodo_salario").append("<option value='5' <?php if(old('periodo_salario') == 5){ echo "selected"; }?>>Quinta-feira</option>");
                $("#periodo_salario").append("<option value='6' <?php if(old('periodo_salario') == 6){ echo "selected"; }?>>Sexta-feira</option>");
                $("#periodo_salario").append("<option value='7' <?php if(old('periodo_salario') == 7){ echo "selected"; }?>>Sábado</option>");
            break;

            //Caso seja quinzenal
            case "3":
                $("#periodo_salario").append("<option value='1' <?php if(old('periodo_salario') == 1){ echo "selected"; }?>>1ª Quinzena</option>");
                $("#periodo_salario").append("<option value='2' <?php if(old('periodo_salario') == 2){ echo "selected"; }?>>2ª Quinzena</option>");
            break; 
            
            //Caso seja mensal
            case "4":
                $("#periodo_salario").append("<option value='1' <?php if(old('periodo_salario') == 1){ echo "selected"; }?>>1º dia útil</option>");
                $("#periodo_salario").append("<option value='2' <?php if(old('periodo_salario') == 2){ echo "selected"; }?>>2º dia útil</option>");
                $("#periodo_salario").append("<option value='3' <?php if(old('periodo_salario') == 3){ echo "selected"; }?>>3º dia útil</option>");
                $("#periodo_salario").append("<option value='4' <?php if(old('periodo_salario') == 4){ echo "selected"; }?>>4º dia útil</option>");
                $("#periodo_salario").append("<option value='5' <?php if(old('periodo_salario') == 5){ echo "selected"; }?>>5º dia útil</option>");
            break;

        }
    } 
    
    //se tipo_transporte não tiver valor não entra 
    if(tipo_transporte != ""){
    
        switch (tipo_transporte) {
            
            //Caso seja diário
            case "1":
                $("#periodo_transporte").append("<option value='1' <?php if(old('periodo_transporte') == 1){ echo "selected"; }?>>Segunda-feira à Sexta-feira</option>");
                $("#periodo_transporte").append("<option value='2' <?php if(old('periodo_transporte') == 2){ echo "selected"; }?>>Segunda-feira à Sábado</option>");
                $("#periodo_transporte").append("<option value='3' <?php if(old('periodo_transporte') == 3){ echo "selected"; }?>>Todos os dias</option>");
            break;

            case "2":
                $("#periodo_transporte").append("<option value='1' <?php if(old('periodo_transporte') == 1){ echo "selected"; }?>>Domingo</option>");
                $("#periodo_transporte").append("<option value='2' <?php if(old('periodo_transporte') == 2){ echo "selected"; }?>>Segunda-feira</option>");
                $("#periodo_transporte").append("<option value='3' <?php if(old('periodo_transporte') == 3){ echo "selected"; }?>>Terça-feira</option>");
                $("#periodo_transporte").append("<option value='4' <?php if(old('periodo_transporte') == 4){ echo "selected"; }?>>Quarta-feira</option>");
                $("#periodo_transporte").append("<option value='5' <?php if(old('periodo_transporte') == 5){ echo "selected"; }?>>Quinta-feira</option>");
                $("#periodo_transporte").append("<option value='6' <?php if(old('periodo_transporte') == 6){ echo "selected"; }?>>Sexta-feira</option>");
                $("#periodo_transporte").append("<option value='7' <?php if(old('periodo_transporte') == 7){ echo "selected"; }?>>Sábado</option>");
            break;
            
            case "3":
                $("#periodo_transporte").append("<option value='1' <?php if(old('periodo_transporte') == 1){ echo "selected"; }?>>1ª Quinzena</option>");
                $("#periodo_transporte").append("<option value='2' <?php if(old('periodo_transporte') == 2){ echo "selected"; }?>>2ª Quinzena</option>");
            break;
            
            case "4":
                $("#periodo_transporte").append("<option value='1' <?php if(old('periodo_transporte') == 1){ echo "selected"; }?>>1º dia útil</option>");
                $("#periodo_transporte").append("<option value='2' <?php if(old('periodo_transporte') == 2){ echo "selected"; }?>>2º dia útil</option>");
                $("#periodo_transporte").append("<option value='3' <?php if(old('periodo_transporte') == 3){ echo "selected"; }?>>3º dia útil</option>");
                $("#periodo_transporte").append("<option value='4' <?php if(old('periodo_transporte') == 4){ echo "selected"; }?>>4º dia útil</option>");
                $("#periodo_transporte").append("<option value='5' <?php if(old('periodo_transporte') == 5){ echo "selected"; }?>>5º dia útil</option>");
            break;    
        }
    
    }
    
    //se tipo_alimentacao não tiver valor não entra 
    if(tipo_alimentacao != ""){
    
        switch (tipo_alimentacao) {
            
            //Caso seja diário
            case "1":
                $("#periodo_alimentacao").append("<option value='1' <?php if(old('periodo_alimentacao') == 1){ echo "selected"; }?>>Segunda-feira à Sexta-feira</option>");
                $("#periodo_alimentacao").append("<option value='2' <?php if(old('periodo_alimentacao') == 2){ echo "selected"; }?>>Segunda-feira à Sábado</option>");
                $("#periodo_alimentacao").append("<option value='3' <?php if(old('periodo_alimentacao') == 3){ echo "selected"; }?>>Todos os dias</option>");
            break;

            //Caso seja semanal
            case "2":
                $("#periodo_alimentacao").append("<option value='1' <?php if(old('periodo_alimentacao') == 1){ echo "selected"; }?>>Domingo</option>");
                $("#periodo_alimentacao").append("<option value='2' <?php if(old('periodo_alimentacao') == 2){ echo "selected"; }?>>Segunda-feira</option>");
                $("#periodo_alimentacao").append("<option value='3' <?php if(old('periodo_alimentacao') == 3){ echo "selected"; }?>>Terça-feira</option>");
                $("#periodo_alimentacao").append("<option value='4' <?php if(old('periodo_alimentacao') == 4){ echo "selected"; }?>>Quarta-feira</option>");
                $("#periodo_alimentacao").append("<option value='5' <?php if(old('periodo_alimentacao') == 5){ echo "selected"; }?>>Quinta-feira</option>");
                $("#periodo_alimentacao").append("<option value='6' <?php if(old('periodo_alimentacao') == 6){ echo "selected"; }?>>Sexta-feira</option>");
                $("#periodo_alimentacao").append("<option value='7' <?php if(old('periodo_alimentacao') == 7){ echo "selected"; }?>>Sábado</option>");
            break;
            
            //Caso seja quinzenal
            case "3":
                $("#periodo_alimentacao").append("<option value='1' <?php if(old('periodo_alimentacao') == 1){ echo "selected"; }?>>1ª Quinzena</option>");
                $("#periodo_alimentacao").append("<option value='2' <?php if(old('periodo_alimentacao') == 2){ echo "selected"; }?>>2ª Quinzena</option>");
            break;
            
            //Caso seja mensal
            case "4":
                $("#periodo_alimentacao").append("<option value='1' <?php if(old('periodo_alimentacao') == 1){ echo "selected"; }?>>1º dia útil</option>");
                $("#periodo_alimentacao").append("<option value='2' <?php if(old('periodo_alimentacao') == 2){ echo "selected"; }?>>2º dia útil</option>");
                $("#periodo_alimentacao").append("<option value='3' <?php if(old('periodo_alimentacao') == 3){ echo "selected"; }?>>3º dia útil</option>");
                $("#periodo_alimentacao").append("<option value='4' <?php if(old('periodo_alimentacao') == 4){ echo "selected"; }?>>4º dia útil</option>");
                $("#periodo_alimentacao").append("<option value='5' <?php if(old('periodo_alimentacao') == 5){ echo "selected"; }?>>5º dia útil</option>");
            break;
        }
    
    }
    
});    
/******************************************************************************
#Fim -> Estrutura para manter valor carregado caso, der algum erro da página
*******************************************************************************/
    
/***********************************************
 #
 # Aplicando função no botão CANCELAR
 # Para fechar Modal de upload de imagem (foto)
 # 
 ************************************************/
$(document).on('click', '#btn_cancelar_imagem', function (e) {
    e.preventDefault();
    $(this).closest('.coluna_foto').find('.modal_upload').modal('hide');
});


    /***********************************************************************************************
     #
     # Aplicando função ao evento change do combobox #tipo_salario
     # Ao selecionar um tipo_salario, carrega os periodos relacionados no combobox #periodo_salario
     # 
    ************************************************************************************************/ 
    $(document).on('change', '#tipo_salario', function() { 
        
        // Capto valor selecionado
        var valor_selecionado = $(this).find(':selected').val();

        // Combobox de periodo salário
        var combo_tipo_salario = $('#periodo_salario');
        
        // Limpo opções atuais do combo
        combo_tipo_salario.empty();
        
        // Adiciono opção padrão
        combo_tipo_salario.append("<option value=''>Selecione uma opção</option>");
        
        if (valor_selecionado > 0) {
            
            // Caso seja diário
            if (valor_selecionado == 1) {
                                           
                combo_tipo_salario.append("<option value='1'>Segunda-feira à Sexta-feira</option>");
                combo_tipo_salario.append("<option value='2'>Segunda-feira à Sábado</option>");
                combo_tipo_salario.append("<option value='3'>Todos os dias</option>");
                                        
            //Caso seja semanal
            }else if (valor_selecionado == 2){
                
                combo_tipo_salario.append("<option value='1'>Domingo</option>");
                combo_tipo_salario.append("<option value='2'>Segunda-feira</option>");
                combo_tipo_salario.append("<option value='3'>Terça-feira</option>");
                combo_tipo_salario.append("<option value='4'>Quarta-feira</option>");
                combo_tipo_salario.append("<option value='5'>Quinta-feira</option>");
                combo_tipo_salario.append("<option value='6'>Sexta-feira</option>");
                combo_tipo_salario.append("<option value='7'>Sábado</option>");
            
            //Caso seja quinzenal
            }else if (valor_selecionado == 3){
             
                combo_tipo_salario.append("<option value='1'>1ª Quinzena</option>");
                combo_tipo_salario.append("<option value='2'>2ª Quinzena</option>");
             
            //caso seja mensal 
            }else if (valor_selecionado == 4){
             
                combo_tipo_salario.append("<option value='1'>1º dia útil</option>");
                combo_tipo_salario.append("<option value='2'>2º dia útil</option>");
                combo_tipo_salario.append("<option value='3'>3º dia útil</option>");
                combo_tipo_salario.append("<option value='4'>4º dia útil</option>");
                combo_tipo_salario.append("<option value='5'>5º dia útil</option>");
             
            }    
            
        } else {
        
            // Limpo opções atuais do combo
            combo_tipo_salario.empty();

            // Adiciono opção padrão
            combo_tipo_salario.append("<option value=''>Selecione uma opção</option>");
        
        }    
                      
    });
    
    
    /**************************************************************************************************
    #
    # Aplicando função ao evento change do combobox #tipo_transporte
    # Ao selecionar um tipo_transporte, carrega os periodos relacionados no combobox #periodo_transporte
    # 
    ***************************************************************************************************/ 
    $(document).on('change', '#tipo_transporte', function() { 

       // Capto valor selecionado
       var valor_selecionado = $(this).find(':selected').val();

       // Combobox de periodo transporte
       var combo_tipo_transporte = $('#periodo_transporte');

       // Limpo opções atuais do combo
       combo_tipo_transporte.empty();

       // Adiciono opção padrão
       combo_tipo_transporte.append("<option value=''>Selecione uma opção</option>");

       if (valor_selecionado > 0) {
        
            //caso seja diário
            if(valor_selecionado == 1){
                
                combo_tipo_transporte.append("<option value='1'>Segunda-feira à Sexta-feira</option>");
                combo_tipo_transporte.append("<option value='2'>Segunda-feira à Sábado</option>");
                combo_tipo_transporte.append("<option value='3'>Todos os dias</option>");
            
            //caso seja semanal
            }else if (valor_selecionado == 2){
                
                combo_tipo_transporte.append("<option value='1'>Domingo</option>");
                combo_tipo_transporte.append("<option value='2'>Segunda-feira</option>");
                combo_tipo_transporte.append("<option value='3'>Terça-feira</option>");
                combo_tipo_transporte.append("<option value='4'>Quarta-feira</option>");
                combo_tipo_transporte.append("<option value='5'>Quinta-feira</option>");
                combo_tipo_transporte.append("<option value='6'>Sexta-feira</option>");
                combo_tipo_transporte.append("<option value='7'>Sábado</option>");
                
            //caso seja quinzenal    
            }else if(valor_selecionado == 3){
                
                combo_tipo_transporte.append("<option value='1'>1ª Quinzena</option>");
                combo_tipo_transporte.append("<option value='2'>2ª Quinzena</option>");
            
            //caso seja mensal
            }else if(valor_selecionado == 4){
                
                combo_tipo_transporte.append("<option value='1'>1º dia útil</option>");
                combo_tipo_transporte.append("<option value='2'>2º dia útil</option>");
                combo_tipo_transporte.append("<option value='3'>3º dia útil</option>");
                combo_tipo_transporte.append("<option value='4'>4º dia útil</option>");
                combo_tipo_transporte.append("<option value='5'>5º dia útil</option>");                
                
            }
            
       }else{
           
            // Limpo opções atuais do combo
            combo_tipo_transporte.empty();

            // Adiciono opção padrão
            combo_tipo_transporte.append("<option value=''>Selecione uma opção</option>");
           
       }
       
    });
    
    
    
    /***********************************************************************************************
    #
    # Aplicando função ao evento change do combobox #tipo_alimentacao
    # Ao selecionar um tipo_alimentacao, carrega os periodos relacionados no combobox #periodo_alimentacao
    # 
    ************************************************************************************************/ 
    $(document).on('change', '#tipo_alimentacao', function() {
        
        // Capto valor selecionado
       var valor_selecionado = $(this).find(':selected').val();

       // Combobox de periodo alimentação
       var combo_tipo_alimentacao = $('#periodo_alimentacao');

       // Limpo opções atuais do combo
       combo_tipo_alimentacao.empty();

       // Adiciono opção padrão
       combo_tipo_alimentacao.append("<option value=''>Selecione uma opção</option>");
       
       if(valor_selecionado > 0){
           
           //Caso seja diário
           if(valor_selecionado == 1){
           
                combo_tipo_alimentacao.append("<option value='1'>Segunda-feira à Sexta-feira</option>");
                combo_tipo_alimentacao.append("<option value='2'>Segunda-feira à Sábado</option>");
                combo_tipo_alimentacao.append("<option value='3'>Todos os dias</option>");
           
           //caso seja semanal
           }else if(valor_selecionado == 2){
               
                combo_tipo_alimentacao.append("<option value='1'>Domingo</option>");
                combo_tipo_alimentacao.append("<option value='2'>Segunda-feira</option>");
                combo_tipo_alimentacao.append("<option value='3'>Terça-feira</option>");
                combo_tipo_alimentacao.append("<option value='4'>Quarta-feira</option>");
                combo_tipo_alimentacao.append("<option value='5'>Quinta-feira</option>");
                combo_tipo_alimentacao.append("<option value='6'>Sexta-feira</option>");
                combo_tipo_alimentacao.append("<option value='7'>Sábado</option>");
           
           //caso seja quinzenal
           }else if(valor_selecionado == 3){
               
                combo_tipo_alimentacao.append("<option value='1'>1ª Quinzena</option>");
                combo_tipo_alimentacao.append("<option value='2'>2ª Quinzena</option>");
           
           //caso seja mensal
           }else if(valor_selecionado == 4){
               
                combo_tipo_alimentacao.append("<option value='1'>1º dia útil</option>");
                combo_tipo_alimentacao.append("<option value='2'>2º dia útil</option>");
                combo_tipo_alimentacao.append("<option value='3'>3º dia útil</option>");
                combo_tipo_alimentacao.append("<option value='4'>4º dia útil</option>");
                combo_tipo_alimentacao.append("<option value='5'>5º dia útil</option>");
               
           }    
           
       }else{
           
            // Limpo opções atuais do combo
            combo_tipo_alimentacao.empty();

            // Adiciono opção padrão
            combo_tipo_alimentacao.append("<option value=''>Selecione uma opção</option>");
           
       }
        
    });

</script>
@stop
