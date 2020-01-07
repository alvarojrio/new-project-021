@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Médicos | Cadastrar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/select2/dist/css/select2.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo  asset('css/admin/administracao/medicos/medicos-cadastrar.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('medicos-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Médico</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <form method="POST" action="<?php echo url('admin/painel/medicos/cadastrar-medico'); ?>" enctype="multipart/form-data">
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
                                <div class="panel-heading"><i class="fas fa-user-md"></i> Dados pessoais</div>
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
                                                                <input type="text" class="form-control" name="nome_medico" id="nome_medico" placeholder="Nome" <?php if (!empty(old('nome_medico'))) { ?>value="<?php echo old('nome_medico'); ?>"<?php } ?>  minlength="8" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        
                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">CPF</label>
                                                                <input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="000.000.000-00" <?php if (!empty(old('cpf'))) { ?>value="<?php echo old('cpf'); ?>"<?php } ?> minlength="14" autocomplete="off" onblur="return validaCampos()">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">RG</label>
                                                                <input type="text" class="form-control" name="rg" id="rg" placeholder="0000000-0" autocomplete="off" value="{{ old('rg') }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Data de Nascimento </label>
                                                                <input type="text" class="form-control datepicker" name="data_nascimento" id="data_nascimento" placeholder="00/00/0000" autocomplete="off" value="{{ old('data_nascimento') }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Sexo</label>
                                                                <select class="form-control" name="sexo" id="sexo">
                                                                    <option value="">Selecione</option>
                                                                    <option value="2" <?php if (old('sexo') == 2) { echo "selected"; } ?>>Feminino</option>
                                                                    <option value="1" <?php if (old('sexo') == 1) { echo "selected"; } ?>>Masculino</option>
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

                        <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12">

                            <div class="panel panel-default">

                                <div class="panel-heading"><i class="fas fa-briefcase-medical"></i> Dados profissionais</div>

                                <div class="panel-body"> 

                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-9 col-md-10">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label">Tipo de Conselho <span class="required-red">*</span></label>
                                                        <select type="text" class="form-control" name="cod_conselho" id="cod_conselho" onchange="buscarConselhosAjax()">
                                                            <option value="">Selecione..</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">&nbsp</label><br>
                                                    <button class="btn btn-success pull-right" type="button" data-toggle="modal" data-target="#modal_conselho"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label">Número do conselho <span class="required-red">*</span></label>
                                                        <input type="text" autocomplete="off" class="form-control" name="numero_conselho" id="numero_conselho" placeholder="nº conselho" value="{{ old('numero_conselho') }}">
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label">Estado conselho:</label>
                                                <select class="form-control" name="cod_estado_conselho" id="cod_estado_conselho">
                                                    <option value="">Selecione..</option>
                                                    @foreach($estados as $estado)
                                                        <option value="{{ $estado->cod_estado }}" <?php if (old('cod_estado_conselho') == $estado->cod_estado) { echo "selected"; } ?>>{{ $estado->nome_estado }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label">Especialidades <span class="required-red">*</span></label>
                                                <select class="form-control" name="cod_especialidade[]" id="cod_especialidade" multiple="multiple">
                                                    <option value="">Selecione..</option>
                                                    @foreach($especialidades as $especialide)
                                                        <option value="{{ $especialide->cod_especialidade }}" <?php if (old('cod_especialidade') != null && in_array($especialide->cod_especialidade, old('cod_especialidade'))) { echo "selected";} ?>>{{ $especialide->nome_especialidade }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                           <!-- <div class="form-group">
                                                <label class="control-label">Carteira do conselho</label>
                                                <input type="file" name="carteira_conselho" id="carteira_conselho" class="form-group" />
                                            </div> -->
                                            
                                            <div class="form-group">
                                            <label class="control-label">Carteira do conselho</label>
                                            <div class="row">    
                                                    <div class="col-md-12">  
                                                      <!-- image-preview-filename input [CUT FROM HERE]-->
                                                      <div class="input-group image-preview">
                                                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                                            <span class="input-group-btn">
                                                              <!-- image-preview-clear button -->
                                                              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                                    <span class="glyphicon glyphicon-remove"></span> Remover
                                                              </button>
                                                              <!-- image-preview-input -->
                                                              <div class="btn btn-default image-preview-input">
                                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                                    <span class="image-preview-input-title">Procurar</span>
                                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="carteira_conselho"/> <!-- rename it -->
                                                              </div>
                                                            </span>
                                                      </div><!-- /input-group image-preview [TO HERE]--> 
                                                    </div>
                                              </div>
                                            </div>
                                            
                                        </div> 
                                    </div>

                                </div>    

                            </div>    
                        </div>
                        
                    <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12"> <!-- INICIO DIV INFORMAÇÕES DE CONTATO -->
                        
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
                                                    <option value="{{ $estado->cod_estado }}" <?php if (old('estado') == $estado->cod_estado) { echo "selected"; } ?>>{{ $estado->nome_estado }}</option>
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
                                            <input type="text" autocomplete="off" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ old('bairro') }}">
                                        </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label">Logradouro</label>
                                            <input type="text" autocomplete="off" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="{{ old('logradouro') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">  
                                    <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label">Complemento</label>
                                            <input type="text" autocomplete="off" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{ old('complemento') }}">
                                        </div>
                                    </div>    
                                    <div class="col-lg-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label">Número</label>
                                            <input type="text" autocomplete="off" class="form-control" name="numero" id="numero" placeholder="Número ou lote e quadra" value="{{ old('numero') }}" onkeypress="return event.charCode >= 48" min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div> 
                
                    <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12">
                                
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fas fa-paperclip"></i> Anexar documentos </div>
				<div class="panel-body">
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label">Arquivo</label>
                                                <input type="file" name="arquivo_medico" id="arquivo_medico" class="form-group" />
                                            </div>
                                            
                                        </div> 
                                    </div>
                                    
				</div>
			</div>    
                    </div>
                        
               
                        <div class="col-xs-12"> <!-- INICIO DIV LOGIN -->
                                
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading"><i class="fa fa-laptop"></i> Informações de Login</div>
                                    
                                    <div class="panel-body"> 
                                        
                                        <div class="row">  
                                            
                                            <div class="col-lg-6">    
                                               <div class="form-group">
                                                    <label class="control-label">Usuário <span class="required-red">*</span></label>
                                                    <input type="text" autocomplete="off" class="form-control" name="usuario" id="usuario" placeholder="Usuário de login" value="{{ old('usuario') }}" minlength="5" maxlength="30">
                                               </div>
                                            </div>
                                            
                                            <div class="col-lg-6">    
                                               <div class="form-group">
                                                    <label class="control-label">Senha <span class="required-red">*</span></label>
                                                    <input type="password" autocomplete="off" class="form-control" name="senha" id="senha" placeholder="Senha de login" value="{{ old('senha') }}" minlength="6" maxlength="30">
                                               </div>  
                                            </div>
                                        </div> 
                                        
                                    </div>    
                                    
                                </div>    
                        </div>
                        
                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/medicos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                        </div>
                        
                </form>        
                </div>        
                </div>
            </div>
        </div>
    </div>
</div>    

<div class="modal fade" id="modal_conselho" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title">Cadastro de Conselhos</h4>
            </div>
            
            <div class="modal-body">                 
                <form method="POST" id="form_modal_cadatrar_conselho">
                    <div class="form-group">                        
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label">Nome do conselho:</label>
                                <input type="text" class="form-control" id="nome_conselho" name="nome_conselho" placeholder="Nome do Conselho">
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-success pull-right" id="btn_cadastrar_conselho"><i class="far fa-save"></i> Cadastrar</button>
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  asset('js/jquery.form.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  asset('plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  asset('js/valida_cpf_cnpj.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  asset('plugins/webcamjs/webcam.min.js'); ?>"></script>

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
<script type="text/javascript">
    
/*****************************************************
     ::: MULTI SELECT :::
******************************************************/   

$("#cod_especialidade").select2({
    placeholder: "Especialidades",
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

$(document).ready(function() {

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
    
    // Inicializo trazendo uma listagem de conselhos 
    $(document).ready(function () {

        buscarConselhosAjax();

    }); // FECHA $(document).ready
    

    /*****************************************
     # FUNÇÃO PARA BUSCAR LISTAGEM DE CONSELHOS VIA AJAX 
    *****************************************/
    
    if ("{{ old('cod_conselho') }}" != "") {
       var old_cod_conselho = "{{ old('cod_conselho') }}";
     }
    function buscarConselhosAjax() {
        // :: Reset Toast :: 
        $.toast().reset('all');

        $.ajax({
            url: "{{ url('admin/painel/medicos/buscar-conselhos-ajax') }}",
            // data: {'cod_tabela': cod_tabela},
            type: 'POST',
            dataType: 'json',
            success: function (response) {

                if(Object.keys(response).length > 0 ){                

                    $(response).each(function (index, value) {
                        
                        if (old_cod_conselho) {
                            
                            // 1º Carregando listagem  .. 
                            $("#cod_conselho").append("<option value='" + value.cod_conselho + "'>" + value.nome_conselho + "</option>");
                            
                            if (old_cod_conselho == value.cod_conselho) {
                                // 2º selecionar .. 
                                $("#cod_conselho option[value='" + old_cod_conselho + "']").prop('selected', true);
                            }
                        }else{
                                // Apenas popule (carregue a listagem ..) 
                                $("#cod_conselho").append("<option value='" + value.cod_conselho + "'>" + value.nome_conselho + "</option>");
                            
                        }


                    });

                }else{
                    $.toast({
                        heading: 'Não há conselhos no sistema!',
                        text: 'Por favor, primeiro cadastre um conselho no sistema!.',
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

            }
        });
    }


/*****************************************************
     ::: AÇÃO NO BOTÃO CADASTRAR CONSELHO (MODAL) :::
******************************************************/

/*::: NEUTRALIZAÇÃO DA FUNÇÃO SUBMIT DO FORM :::*/

    $('#form_modal_cadatrar_conselho').submit(function () {
        return false;
    });

    $(document).on('click', '#btn_cadastrar_conselho', function() {
            
            // Apaga Toast que estejam abertos
            $.toast().reset('all');

            // Part. variáveis 
            var nome_conselho = $('#nome_conselho').val();

            // Envio informações via ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/medicos/cadastrar-conselho'); ?>",
                data: {
                    "nome_conselho": nome_conselho
                },
                //dataType: 'json',
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
                    if (response.status == 'nome_conselho_vazio') {

                        // Oculta mensagem 'processando...
                        $('#msg_processando').hide();

                        // Mostra mensagem de erro
                        $.toast({
                            heading: 'Por favor, informe o nome do conselho!',
                            text: response.erro,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: false,
                            allowToastClose: true
                        });

                    }
                    
                    if (response.status == 'conselho_ja_existente') {

                        // Oculta mensagem 'processando...
                        $('#msg_processando').hide();

                        // Mostra mensagem de erro
                        $.toast({
                            heading: 'Já existe um conselho com este nome!',
                            text: response.erro,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: false,
                            allowToastClose: true
                        });

                    }

                    if (response.status == 'sucesso') {

                        $("#modal_conselho").modal('hide');
                        buscarConselhosAjax();

                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Conselho salvo com sucesso!',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 1500, // em milisegundos
                            allowToastClose: true
                            /*afterHidden: function() {
                                window.location.href = '{{url("admin/painel/convenios/visualizar-convenio/". Crypt::encrypt($convenio->cod_convenio))}}';
                            }*/
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
    });


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
    Webcam.on('live', function() {
        //console.log('Camera is alive!');
    });

    // Mensagem customizada em caso de erro de webcam
    Webcam.on('error', function() {
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
    $(document).on('click', '.webcam', function() {

        var elemento = $(this);

        Webcam.attach('#my_camera');

        $(elemento).closest('.coluna_foto').find('.modal_webcam').modal('show');

    });

    // Aplicando função no botão de LIMPAR campo de Foto
    $(document).on('click', '.clear-foto', function() {

        $(this).closest('.coluna_foto').find('#thumb').attr('src', "<?php echo asset('images/pessoa/sem_foto.jpg'); ?>");
        $(this).closest('.coluna_foto').find('#foto_webcam').remove();
        $(this).closest('.coluna_foto').find('.clear-foto').hide();

    });

    // Aplicando função no botão TIRAR FOTO
    $(document).on('click', '.btn_tirar_foto', function() {

        take_snapshot();

    });

    // Aplicando função no botão NOVA FOTO
    $(document).on('click', '.btn_nova_foto', function() {

        clear_snapshot();

    });

    // Aplicando função no botão SALVAR FOTO (Realizar o salvamento da imagem via ajax e retorna preview da mesma na tela)
    $(document).on('click', '.btn_salvar_foto', function() {

        var elemento = $(this);
        origem_camera = 'foto_pessoa';

        if (origem_camera == 'foto_pessoa') {

            Webcam.snap(function(data_uri) {

                $.ajax({
                    url: "<?php echo url('admin/painel/medicos/foto-medico-webcam'); ?>",
                    data: { 'data_uri': data_uri },
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {

                        if (response != false) {

                            $(elemento).closest('.coluna_foto').find('#thumb').attr('src', '<?php echo URL::asset('arquivos-temporarios/medicos') . "/"; ?>' + response.name_file);
                            $(elemento).closest('.coluna_foto').find('#imagem').append("<input type='hidden' id='foto_webcam' name='foto_webcam' value='" + response.name_file + "' />");
                            $(elemento).closest('.coluna_foto').find('.clear-foto').show();

                        }

                        close_snapshot();

                    },
                    error: function() {
                        alert('Erro! A foto não pôde ser processada. Tente novamente.');
                    }
                });

            });

            origem_camera = null;

            $(elemento).closest('.coluna_foto').find('.modal_webcam').modal('hide');

        }

    });

    // Aplicando função no botão CANCELAR FOTO
    $(document).on('click', '.btn_cancelar_foto', function() {

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
    $(document).on('blur', '.cep', function() { 
        puxaEndereco(this);
    });

 
    /***********************************************************************
     #
     # Atribui função ao evento change dos comboboxes com a classe .estado
     # Utiliza funções presentes no arquivo combos_estados_cidades.js
     # 
    ************************************************************************/ 
    $(document).on('change', '.estado', function() { 
        atualizaComboCidade(this, $(this).find('option:selected').val());
    });
    
    /**************************************************************
     #
     # Atribui função ao evento click da div .preview-imagem
     # Ao clicar na div abre um modal para escolher/selecionar a imagem no seu PC
     # 
    ***************************************************************/ 
    $(document).on('click', '.preview-imagem', function() { 
        $(this).closest('.coluna_foto').find('.modal_upload').modal('show');
    });
    
    /***********************************************
     #
     # Aplicando função no botão SALVAR IMAGEM
     # Para upload de imagem (foto) dentro de Modal
     # 
    ************************************************/ 
    $(document).on('click', '#btn_salvar_imagem', function(e) {
        
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
            url: "<?php echo url('admin/painel/medicos/foto-medico-upload'); ?>",
            data: form_data,
            beforeSend: function() { 

                // Exibo div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_modal').hide();

                // Limpo div de mensagens de erro
                elemento.closest('.coluna_foto').find('.msg_erro_modal').html('');

            },
            success: function(response) {
                
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
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {
                
                // Coloco mensagem dentro da div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_modal').append('<h4 class="pt-0">Alerta</h4>');
                elemento.closest('.coluna_foto').find('.msg_erro_modal').append('Falha ao fazer upload da foto.');  

                // Exibo div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_modal').show();

            }
        });

    }); 
    
    /***********************************************
     #
     # Aplicando função no botão CANCELAR
     # Para fechar Modal de upload de imagem (foto)
     # 
    ************************************************/ 
    $(document).on('click', '#btn_cancelar_imagem', function(e) {
        e.preventDefault(); 
        $(this).closest('.coluna_foto').find('.modal_upload').modal('hide');
    }); 

</script>
@stop
