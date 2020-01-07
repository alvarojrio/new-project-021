@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/select2-4.0.6/dist/css/select2.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('css/select2.customizado.css'); ?>">

<style>
.select2 {
    /* Correção para largura do select multiple quando ele já vêm carregado com algumas opções */
    width: 100% !important; 
}
</style>

@stop



<!-- ### CONTEUDO DO COMPONENTE ### -->
               
<!-- INICIO LINHA -->
<div class="row row_msg_erro_cadastrar">
    
    <!-- Espaço para exibição de erros de validação -->
    <div id="avisoValidacao" role="alert">
        <div class="col-xs-12">
            <div class="alert alert-danger msg_erro_cadastrar" style="display: none;"></div>
        </div>
    </div>

</div>
<!-- FIM LINHA -->

<!-- INICIO LINHA -->
<div class="row">

    <!-- DIV DA MENSAGEM 'PROCESSANDO' -->
    <div id="msg_processando">
        <div id="loading_spinner_processando">
            <img src="<?php echo asset('images/loading_spinner.gif'); ?>" alt="processando" />
        </div>
    </div>

</div>
<!-- FIM LINHA -->

<!-- INICIO CAIXA-PAI QUE GUARDA TODOS OS PANELS DE PESSOA -->
<div id="caixas_de_pessoas">

    <!-- ##################### INICIO PRIMEIRA CAIXA PESSOA ##################### -->
    <div class="panel panel-primary panel_pessoa" id="primeira_caixa_pessoa">
        <div class="panel-heading heading_panel_pessoa">PESSOA 1</div>
        <div class="panel-body">

            <!-- INICIO LINHA -->
            <div class="row">
                
                <!-- INICIO COLUNA ESQUERDA -->
                <div class="col-md-6 col-xs-12">
                    
                    <!-- INICIO PANEL -->
                    <div class="panel panel-default subpanel_pessoa">
                        <div class="panel-heading">INFORMAÇÕES BÁSICAS</div>
                        <div class="panel-body">
                            
                            <!-- INICIO LINHA -->
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
                                                    <a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_imagem">Enviar Arquivo</a>
                                                    <a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_imagem">Cancelar</a>
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
                                    <div class="modal fade modal_webcam" id="modal-webcam">
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
                                
                                <!-- Inicio Coluna Dados Basicos -->
                                <div class="col-sm-8 col-xs-12">
                                    
                                    <!-- Linha -->
                                    <div class="row">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-md-12 col-xs-12">
                                    
                                            <label class="control-label">Nome <span class="required-red">*</span></label>
                                            <input type="text" id="nome" name="nome" class="form-control input-sm letra-maiuscula c_nome" autocomplete="off" autofocus="autofocus" tabindex="20" />
                                                                                                          
                                        </div>

                                    </div>
                                    
                                    <!-- Linha -->
                                    <div class="row">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-sm-6 col-xs-12"> 

                                            <label class="control-label">Data de Nasc. <span class="required-red">*</span></label>
                                            <input type="text" class="form-control input-sm data_nascimento" name="data_nascimento" id="data_nascimento" placeholder="00/00/0000" autocomplete="off" tabindex="21">
                                        
                                        </div>
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-sm-6 col-xs-12">

                                            <label class="control-label">Sexo </label>
                                            <select class="form-control input-sm" name="sexo" id="sexo" tabindex="22">
                                                <option value="">Selecione</option>
                                                <option value="2">Feminino</option>
                                                <option value="1">Masculino</option>                                                
                                            </select>
                                            
                                        </div>

                                    </div>

                                    <!-- Linha -->
                                    <div class="row">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-md-6 col-xs-12">
                                    
                                            <label class="control-label">CPF <span class="required-red">*</span></label>
                                            <input type="text" id="cpf" name="cpf" class="form-control input-sm cpf" autocomplete="off" placeholder="000.000.000-00" tabindex="23" />
                                                                                                          
                                        </div>
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-md-6 col-xs-12">
                                    
                                            <label class="control-label">RG</label>
                                            <input type="text" id="rg" name="rg" class="form-control input-sm" autocomplete="off" tabindex="24" />
                                                                                                          
                                        </div>

                                    </div>

                                </div>
                                <!-- Fim Coluna Dados Basicos -->
                            
                            </div>
                            <!-- FIM LINHA -->

                            <!-- INICIO LINHA -->
                            <div class="row">

                                <!-- Inicio Coluna Complemento Dados Basicos -->
                                <div class="col-sm-12 col-xs-12 complemento_dados_basicos">
                                    
                                    <!-- Linha -->
                                    <div class="row">
                                        
                                        <!-- Coluna -->
                                        <div class="col-sm-6 col-xs-12">
                                            
                                            <label class="control-label">Documento com foto (<span data-tooltip="tooltip" data-placement="right" title="Restrições: Apenas arquivos com extensões PDF, JPG, JPEG ou PNG." class="yellow-tooltip"><span class="required-red">?</span></span>)</label>

                                        </div>

                                    </div>
                                    
                                    <!-- Div com preview do arquivo selecionado via upload -->
                                    <div class="form-group col-md-5 col-xs-12 bg-info preview-documento">
                                        
                                        <div class="row text-center">
                                            <div class="col-md-12 col-xs-12"><span style="font-size: 1.6em; color: #73879C;"><i class="fas fa-file-upload"></i></span></div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-12 col-xs-12 txt-preview-documento" style="padding-top: 5px;">Selecione um documento no seu computador</div>
                                        </div>

                                    </div>
                                    
                                    <!-- Div com preview do arquivo selecionado via webcam -->
                                    <div class="form-group col-md-5 col-xs-12 col-md-offset-2 bg-info preview-documento-webcam">
                                        
                                        <div class="row text-center">
                                            <div class="col-md-12 col-xs-12"><span style="font-size: 1.6em; color: #73879C;"><i class="fas fa-camera-retro" aria-hidden="true"></i></span></div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-md-12 col-xs-12 txt-preview-documento" style="padding-top: 5px;">Tire uma foto do documento com a Webcam</div>
                                        </div>

                                    </div>

                                    <!-- *******************
                                     #
                                     # INICIO MODAL UPLOAD DOCUMENTO
                                     # 
                                    ************************ -->
                                    <div class="modal fade modal_documento" id="modal-documento">
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
                                                                <div class="alert alert-danger msg_erro_documento" style="display: none;"></div>
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
                                                            <select class="form-control input-sm" name="descricao_arquivo_documento" id="descricao_arquivo_documento">
                                                                <option value="">Selecione</option>
                                                                <option value="Carteira de Habilitação">Carteira de Habilitação (CNH)</option>
                                                                <option value="Carteira de Identidade">Carteira de Identidade (RG)</option>
                                                                <option value="Carteira de Trabalho">Carteira de Trabalho (CTPS)</option>
                                                                <option value="Passaporte">Passaporte</option>
                                                                <option value="Conselhos">Conselhos</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="control-label">Arquivo</label>
                                                            <input type="file" name="arquivo_documento" id="arquivo_documento" class="form-control" />
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

                                    <!-- *******************
                                     #
                                     # INICIO MODAL WEBCAM DOCUMENTO
                                     # 
                                    ************************ -->
                                    <div class="modal fade modal_webcam_documento" id="modal-webcam-documento">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header">
                                                    <button onclick="close_snapshot_documento();" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h2 class="modal-title"><strong>Fotografar documento com a Webcam</strong></h2>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="my_camera_documento" class="center-block"><!-- ESPAÇO ONDE APARECERÁ A FOTO --></div>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 10px;">
                                                        <div class="col-md-12">
                                                            <div align="center">
                                                                <a href="javascript:void(null);" class="btn btn-sm btn-primary btn_tirar_foto_documento">Tirar Foto</a>
                                                                <a href="javascript:void(null);" class="btn btn-sm btn-info btn_nova_foto_documento">Nova Foto</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label class="control-label">Descrição do documento</label>
                                                            <select class="form-control input-sm" name="descricao_arquivo_documento" id="descricao_arquivo_documento">
                                                                <option value="">Selecione</option>
                                                                <option value="Carteira de Habilitação">Carteira de Habilitação (CNH)</option>
                                                                <option value="Carteira de Identidade">Carteira de Identidade (RG)</option>
                                                                <option value="Carteira de Trabalho">Carteira de Trabalho (CTPS)</option>
                                                                <option value="Passaporte">Passaporte</option>
                                                                <option value="Conselhos">Conselhos</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_foto_documento">Salvar Foto</a>
                                                    <a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_foto_documento">Cancelar</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- *****************
                                     #
                                     # FIM MODAL WEBCAM DOCUMENTO
                                     # 
                                    ********************** -->

                                    <!-- Linha -->
                                    <div class="row">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-sm-6 col-xs-12">

                                            <label class="control-label">Estado Civil </label>
                                            <select class="form-control input-sm" name="estado_civil" id="estado_civil" tabindex="25">
                                                <option value="">Selecione</option>
                                                <option value="1">Solteiro(a)</option>
                                                <option value="2">Casado(a)</option>
                                                <option value="3">Viúvo(a)</option>
                                                <option value="4">Divorciado(a)</option>
                                            </select>

                                        </div>

                                        <!-- Coluna -->
                                        <div class="form-group col-md-6 col-xs-12">
                                    
                                            <label class="control-label">Certidão de Nascimento</label>
                                            <input type="text" id="matricula_certidao_nascimento" name="matricula_certidao_nascimento" class="form-control input-sm" autocomplete="off" tabindex="26" />
                                                                                                          
                                        </div>

                                    </div>
                                    
                                    <!-- Linha -->
                                    <div class="row">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-md-12 col-xs-12">
                                    
                                            <label class="control-label">Nome da Mãe</label>
                                            <input type="text" id="filiacao_mae" name="filiacao_mae" class="form-control input-sm letra-maiuscula c_filiacao_mae" autocomplete="off" tabindex="27" />
                                                                                                          
                                        </div>

                                    </div>
                                    
                                    <!-- Linha -->
                                    <div class="row">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-md-12 col-xs-12">
                                    
                                            <label class="control-label">Nome do Pai</label>
                                            <input type="text" id="filiacao_pai" name="filiacao_pai" class="form-control input-sm letra-maiuscula c_filiacao_pai" autocomplete="off" tabindex="28" />
                                                                                                          
                                        </div>

                                    </div>
                                    
                                    <!-- Linha -->
                                    <div class="row linha_deficiencia">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-md-4 col-xs-12">
                                            
                                            <label class="control-label">Deficiente ? <span class="required-red">*</span></label>
                                            
                                            <br />

                                            <input type="radio" name="deficiente[1]" id="deficiente" class="radio_deficiente" value="1" tabindex="29" />
                                            <label class="control-label">Sim</label>
                                        
                                            <input type="radio" name="deficiente[1]" id="deficiente" class="radio_deficiente" value="0" tabindex="30" checked="checked" />
                                            <label class="control-label">Não</label>

                                        </div>

                                    </div>

                                    <!-- Linha -->
                                    <div class="row linha_deficiencia hidden_linha_deficiencia" style="display: none;">
                                        
                                        <!-- Coluna -->
                                        <div class="form-group col-md-12 col-xs-12">
                                            
                                            <label class="control-label">Tipos de Deficiências</label>

                                            <br />  

                                            <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="1" tabindex="31">
                                            <label class="form-check-label" for="tipo_deficiencia">Auditiva</label>

                                            <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="2" tabindex="32">
                                            <label class="form-check-label" for="tipo_deficiencia">Física</label>

                                            <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="3" tabindex="33">
                                            <label class="form-check-label" for="tipo_deficiencia">Mental</label>

                                            <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="4" tabindex="34">
                                            <label class="form-check-label" for="tipo_deficiencia">Visual</label>

                                            <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="5" tabindex="35">
                                            <label class="form-check-label" for="tipo_deficiencia">Múltipla</label>

                                        </div>

                                    </div>

                                </div>
                                <!-- Fim Coluna Complemento Dados Basicos -->

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
                        <div class="panel-heading">ENDEREÇO</div>
                        <div class="panel-body">
                                                                        
                            <!-- Linha -->
                            <div class="row">
                                
                                <!-- Coluna -->
                                <div class="form-group col-md-6 col-xs-12">
                                
                                    <label class="control-label">CEP <span class="required-red">*</span></label>
                                    <input type="text" id="cep" name="cep" class="form-control input-sm cep" autocomplete="off" placeholder="00000-000" tabindex="36" />
                                                                                                  
                                </div>
                                
                                <!-- Coluna -->
                                <div class="form-group col-sm-6 col-xs-12">

                                    <label class="control-label">Estado <span class="required-red">*</span></label>
                                    <select class="form-control input-sm estado" name="estado" id="estado" tabindex="37">
                                        <option value="">Selecione</option>
                                        <?php
                                        foreach ($estados as $estado) :
                                        ?>
                                            <option value="{{ $estado->cod_estado }}">{{ $estado->nome_estado }}</option>
                                        <?php 
                                        endforeach;
                                        ?>
                                    </select>

                                </div>

                            </div>

                            <!-- Linha -->
                            <div class="row">
                                
                                <!-- Coluna -->
                                <div class="form-group col-sm-6 col-xs-12">

                                    <label class="control-label">Cidade <span class="required-red">*</span></label>
                                    <select class="form-control input-sm cidade" name="cidade" id="cidade" tabindex="38">
                                        <option value="">Selecione um estado</option>
                                    </select>

                                </div>

                                <!-- Coluna -->
                                <div class="form-group col-md-6 col-xs-12">
                                
                                    <label class="control-label">Bairro <span class="required-red">*</span></label>
                                    <input type="text" id="bairro" name="bairro" class="form-control input-sm bairro" autocomplete="off" tabindex="39" />
                                                                                                  
                                </div>

                            </div>

                            <!-- Linha -->
                            <div class="row">
                                
                                <!-- Coluna -->
                                <div class="form-group col-md-12 col-xs-12">
                                
                                    <label class="control-label">Logradouro <span class="required-red">*</span></label>
                                    <input type="text" id="logradouro" name="logradouro" class="form-control input-sm logradouro" autocomplete="off" tabindex="40" />
                                                                                                  
                                </div>

                            </div>

                            <!-- Linha -->
                            <div class="row">
                                
                                <!-- Coluna -->
                                <div class="form-group col-md-8 col-xs-12">
                                
                                    <label class="control-label">Complemento</label>
                                    <input type="text" id="complemento" name="complemento" class="form-control input-sm" autocomplete="off" tabindex="41" />
                                                                                                  
                                </div>

                                <!-- Coluna -->
                                <div class="form-group col-md-4 col-xs-12">
                                    
                                    <label class="control-label">Número <span class="required-red">*</span></label>
                                    <input type="text" id="numero" name="numero" class="form-control input-sm" autocomplete="off" tabindex="42" />

                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- FIM PANEL -->

                    <!-- INICIO PANEL -->
                    <div class="panel panel-default subpanel_pessoa_b">
                        <div class="panel-heading">CONTATO</div>
                        <div class="panel-body">
                            
                            <!-- Linha -->
                            <div class="row">
                                
                                <!-- Coluna -->
                                <div class="form-group col-md-12 col-xs-12">
                                    
                                    <label class="control-label">E-mail</label>
                                    <input type="text" id="email" name="email" class="form-control input-sm c_email" autocomplete="off" tabindex="43" />

                                </div>

                            </div>

                            <!-- Linha -->
                            <div class="row">
                                
                                <!-- Coluna -->
                                <div class="form-group col-md-4 col-xs-12">
                                    
                                    <label class="control-label">Telefone</label>
                                    <input type="text" id="telefone" name="telefone" class="form-control input-sm telefone" autocomplete="off" placeholder="(00) 0000-0000" tabindex="44" />

                                </div>

                                <!-- Coluna -->
                                <div class="form-group col-md-4 col-xs-12">
                                    
                                    <label class="control-label">Celular 1</label>
                                    <input type="text" id="celular" name="celular" class="form-control input-sm celular" autocomplete="off" placeholder="(00) 00000-0000" tabindex="45" />

                                </div>

                                <!-- Coluna -->
                                <div class="form-group col-md-4 col-xs-12">
                                    
                                    <label class="control-label">Celular 2</label>
                                    <input type="text" id="celular_2" name="celular_2" class="form-control input-sm celular" autocomplete="off" placeholder="(00) 00000-0000" tabindex="45" />

                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- FIM PANEL -->

                    <!-- INICIO PANEL -->
                    <div class="panel panel-default subpanel_pessoa">
                        <div class="panel-heading">INFORMAÇÕES DE LOGIN</div>
                        <div class="panel-body">
                            
                            <!-- Linha -->
                            <div class="row">
                                
                                <!-- Coluna -->
                                <div class="form-group col-md-6 col-xs-12">

                                    <label class="control-label">Usuário </label>
                                    <input type="text" id="usuario" name="usuario" class="form-control input-sm" autocomplete="off" placeholder="Usuário de acesso" minlength="5" maxlength="30" tabindex="46" />

                                </div>

                                <!-- Coluna -->
                                <div class="form-group col-md-6 col-xs-12">

                                    <label class="control-label">Senha (Min. 6 caracteres) </label>
                                    <input type="password" id="senha" name="senha" class="form-control input-sm" autocomplete="off" placeholder="Senha de acesso" minlength="6" maxlength="30" tabindex="47" />

                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- FIM PANEL -->

                </div>
                <!-- FIM COLUNA DIREITA -->

            </div>
            <!-- FIM LINHA -->
            
            <?php
            // Checo a origem de acesso do componente
            if ($origem == 'gerenciarmembros') { 
            ?>
            <!-- INICIO LINHA -->
            <div class="row" style="margin-top: 8px;">

                <!-- Coluna -->
                <div class="form-group col-md-12 col-xs-12">

                    <!-- INICIO PANEL -->
                    <div class="panel panel-default subpanel_pessoa">
                        <div class="panel-heading">INFORMAÇÕES PARA CONTRATO</div>
                        <div class="panel-body">
                            
                            <div class="row">
                                <label class="control-label col-md-12 col-xs-12">Vínculo <span class="required-red">*</span></label>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <select class="form-control input-sm" name="vinculo_para_contrato" id="vinculo_para_contrato">
                                        <option value="">Selecione</option>
                                        <option value="1">Membro</option>
                                        <option value="2">Membro e Resp. Financeiro</option>
                                        <option value="3">Resp. Financeiro</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- FIM PANEL -->

                </div>

            </div>
            <!-- FIM LINHA -->
            <?php
            }
            ?>

        </div>
    </div>
    <!-- ##################### FIM PRIMEIRA CAIXA PESSOA ##################### -->

</div>
<!-- FIM CAIXA-PAI QUE GUARDA TODOS OS PANELS DE PESSOA -->

<!-- BOTÃO PARA ADICIONAR NOVAS PESSOAS -->
<a class="btn btn-md btn-info" id="btn_add_pessoa" href="javascript:void(null);">
    <i class="fa fa-plus-circle"></i> Adicionar Pessoa
</a>

<hr />

<!-- BOTÃO PARA SALVAR FORMULARIO -->
<a class="btn btn-md <?php if ($origem == 'cadastrarcontrato' || $origem == 'cadastrarcontratopj' || $origem == 'gerenciarmembros' || $origem == 'gerenciarmembrospj') { ?>btn-primary<?php } else { ?>btn-success<?php } ?> pull-right" id="btn_salvar" href="javascript:void(null);" role="button">
    <i class="fa fa-save"></i> Cadastrar Pessoa(s)
</a>

<div class="clearfix"></div>

            

@section('includes_no_body')

<script type="text/javascript">
// Não é possivel utilizar comandos do Laravel dentro de um arquivo JS externo, então guardamos a URL numa variavel JS global
// Estas variaveis tem que ser declaradas antes do arquivo JS que irá utilizá-las
var UrlListarCidadesEstado = '<?php echo url(app("prefixo") . '/painel/listar-cidades-estado'); ?>';
var UrlBuscarEstadoPorUf = '<?php echo url(app("prefixo") . '/painel/buscar-estado-por-uf'); ?>';
var UrlBuscarCidadePorNomeEstado = '<?php echo url(app("prefixo") . '/painel/buscar-cidade-por-nome-estado'); ?>';
</script>

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/valida_cpf_cnpj.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/webcamjs/webcam.min.js'); ?>"></script> <!-- Arquivo responsável pelo uso de Webcam dentro do sistema -->
<script type="text/javascript" src="<?php echo asset('js/combos_estados_cidades.js'); ?>"></script> <!-- Arquivo responsável pelo preenchimento dinâmico dos comboboxes de estado/cidade -->
<script type="text/javascript" src="<?php echo asset('js/preenche_endereco.js'); ?>"></script> <!-- Arquivo responsável pelo preenchimento dinâmico dos campos de endereço utilizando o CEP digitado -->
<script type="text/javascript" src="<?php echo asset('js/calcular_idade.js'); ?>"></script><!-- Arquivo responsável pelo cálculo da idade utilizando a data de nascimento (dividida em partes) como parametro -->
<script type="text/javascript" src="<?php echo asset('js/limpar_campos_dentro_div.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/select2-4.0.6/dist/js/select2.full.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/select2-4.0.6/dist/js/i18n/pt-BR.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativação de máscaras de campos 
    $('.cpf').mask('000.000.000-00');
    $('.cep').mask('00000-000');
    $('.celular').mask('(00) 00000-0000');
    $('.telefone').mask('(00) 0000-0000');

    // Ativação de plugin datepicker em campos
    $('.data_nascimento').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });

    // Controle de caracteres permitidos no campo
    $('.c_nome').on('input blur keyup paste', function() {

        // Expressão regular. Permite letras e o caracter '-'
        var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\ ]/g;

        // Testo o valor digitado com a expressão
        if (this.value.match(regexp)) {

            $(this).val(this.value.replace(regexp,''));

        }

    });

    $('.c_filiacao_mae').on('input blur keyup paste', function() {

        // Expressão regular. Permite letras e o caracter '-'
        var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\ ]/g;

        // Testo o valor digitado com a expressão
        if (this.value.match(regexp)) {

            $(this).val(this.value.replace(regexp,''));

        }

    });

    $('.c_filiacao_pai').on('input blur keyup paste', function() {

        // Expressão regular. Permite letras e o caracter '-'
        var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\ ]/g;

        // Testo o valor digitado com a expressão
        if (this.value.match(regexp)) {

            $(this).val(this.value.replace(regexp,''));

        }

    });

    $('.c_email').on('input blur keyup paste', function() {

        // Expressão regular. Permite letras e o caracter '-'
        var regexp = /[^a-zA-Z0-9-_.@ ]/g;

        // Testo o valor digitado com a expressão
        if (this.value.match(regexp)) {

            $(this).val(this.value.replace(regexp,''));

        }

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
    $(document).on('click', '.btn_salvar_imagem', function(e) {
        
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
            url: "<?php echo url(app('prefixo') . '/painel/clientes/foto-upload'); ?>",
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
    $(document).on('click', '.btn_cancelar_imagem', function(e) {
        e.preventDefault(); 
        $(this).closest('.coluna_foto').find('.modal_upload').modal('hide');
    }); 




    /**************************************************************
     #
     # Atribui função ao evento click da div .preview-documento
     # Ao clicar na div abre um modal para escolher/selecionar DOCUMENTO no seu PC
     # 
    ***************************************************************/ 
    $(document).on('click', '.preview-documento', function() { 
        $(this).closest('.complemento_dados_basicos').find('.modal_documento').modal('show');
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
        var documento_selecionado = $(this).closest('.complemento_dados_basicos').find('#arquivo_documento')[0].files[0];        
        var descricao_documento_selecionado = $(this).closest('.complemento_dados_basicos').find('#descricao_arquivo_documento option:selected').val();  

        //adiciona novo valor dentro de um chave existente dentro da FormData object, 
        //ou adiciona a chave caso ainda não exista.
        form_data.append('documento_upload', documento_selecionado);
        form_data.append('descricao_documento_upload', descricao_documento_selecionado);
                
        // Requisição ajax
        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/clientes/documento-upload'); ?>",
            data: form_data,
            beforeSend: function() { 

                // Exibo div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_documento').hide();

                // Limpo div de mensagens de erro
                elemento.closest('.coluna_foto').find('.msg_erro_documento').html('');

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {
   
                    // Coloco mensagem dentro da div de erros
                    elemento.closest('.coluna_foto').find('.msg_erro_documento').append('<h4 class="pt-0">Alerta</h4>');
                    elemento.closest('.coluna_foto').find('.msg_erro_documento').append(response.erro);  

                    // Exibo div de erros
                    elemento.closest('.coluna_foto').find('.msg_erro_documento').show();            

                } else if (response.status == 'sucesso') {

                    // Atualiza preview 
                    elemento.closest('.complemento_dados_basicos').find('.txt-preview-documento').html('<span style="color: #4286f4;">Arquivo selecionado: ' + documento_selecionado.name + '</span>');

                    // Remove possiveis INPUT HIDDEN criados anteriormente
                    elemento.closest('.complemento_dados_basicos').find('#documento_foto').remove();
                    elemento.closest('.complemento_dados_basicos').find('#descricao_documento_foto').remove();

                    // Coloca dados do documento dentro de INPUT HIDDEN
                    elemento.closest('.complemento_dados_basicos').find('.preview-documento').append("<input type='hidden' id='documento_foto' name='documento_foto' value='" + response.nome_documento + "' />");
                    elemento.closest('.complemento_dados_basicos').find('.preview-documento').append("<input type='hidden' id='descricao_documento_foto' name='descricao_documento_foto' value='" + response.descricao_documento + "' />");

                    // Fecha o modal
                    elemento.closest('.complemento_dados_basicos').find('.modal_documento').modal('hide');

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {
                
                // Coloco mensagem dentro da div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_documento').append('<h4 class="pt-0">Alerta</h4>');
                elemento.closest('.coluna_foto').find('.msg_erro_documento').append('Falha ao fazer upload do documento.');  

                // Exibo div de erros
                elemento.closest('.coluna_foto').find('.msg_erro_documento').show();

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
        $(this).closest('.complemento_dados_basicos').find('.modal_documento').modal('hide');
    }); 



    
    /**************************************************************
     #
     # Atribui função ao evento blur dos inputs com a classe .cpf
     # 
    ***************************************************************/ 
    $(document).on('blur', '.cpf', function() { 
        
        // Definição de variaveis
        var cpf_para_buscar = $(this).val();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: 'POST',
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/buscar-por-cpf'); ?>",
            data: { 
                'cpf_para_buscar': cpf_para_buscar,
                'origem': '<?php echo $origem; ?>'
            },
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

                // Limpa valor da DIV
                $('.msg_erro_cadastrar').html('');

                // Oculta DIV
                $('.msg_erro_cadastrar').hide();

            },
            complete: function(response) {
                // Oculta mensagem 'processando...'
                toast_processando.reset();
            },
            success: function(result) {

                // Convertendo resposta para objeto javascript
                //var result = JSON.parse(result);

                // Checo informações retornadas
                if (result == 'nada-encontrado') {

                    //console.log('Nenhuma pessoa encontrada');

                } else if (result == 'cpf-vazio') {

                    //console.log('CPF informado vazio');

                } else {

                    // Coloco mensagem dentro da div de erros e exibo o elemento
                    $('.msg_erro_cadastrar').append('<h4 class="pt-0">Alerta</h4>');
                    $('.msg_erro_cadastrar').append(result);
                    $('.msg_erro_cadastrar').show();

                    // Volto até o topo da tela para chamar a atenção
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $('.row_msg_erro_cadastrar').offset().top
                    }, 'fast'); 

                    // Travo execução do resto da função
                    return false;

                } 

            },
            error: function (xhr, ajaxOptions, thrownError) {
                //console.log(xhr.responseText);
            }
        });

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
     # Atribui função ao evento change do checkbox com a classe .endereco_primeiro_registro
     # Ao clicar na div abre a caixa para escolher/selecionar a imagem no seu PC
     # 
    ***************************************************************/ 
    $(document).on('change', '.endereco_primeiro_registro', function() { 

        // Checo se o checkbox está marcado
        if (this.checked) {

            // Copio valores dos campos da primeira caixa
            var cep = $('#primeira_caixa_pessoa #cep').val();
            var estado = $('#primeira_caixa_pessoa #estado option:selected').val();
            var cidade = $('#primeira_caixa_pessoa #cidade option:selected').val();
            var bairro = $('#primeira_caixa_pessoa #bairro').val();
            var logradouro = $('#primeira_caixa_pessoa #logradouro').val();
            var complemento = $('#primeira_caixa_pessoa #complemento').val();
            var numero = $('#primeira_caixa_pessoa #numero').val();

            // Insiro valores copiados nos campos da caixa cópia
            $(this).closest('.panel_pessoa').find('#cep').val(cep); 
            $(this).closest('.panel_pessoa').find('#estado option[value="' + estado + '"]').prop('selected', 'selected'); 
            atualizaComboCidade($(this).closest('.panel_pessoa').find('#estado'), estado, cidade); // Utiliza função javascript para atualizar combo de cidades e já deixar uma delas marcada
            $(this).closest('.panel_pessoa').find('#bairro').val(bairro);
            $(this).closest('.panel_pessoa').find('#logradouro').val(logradouro);
            $(this).closest('.panel_pessoa').find('#complemento').val(complemento);
            $(this).closest('.panel_pessoa').find('#numero').val(numero);

        } else {

            // Limpo valores de campos
            $(this).closest('.panel_pessoa').find('#cep').val(''); 
            $(this).closest('.panel_pessoa').find('#estado').val(''); 
            $(this).closest('.panel_pessoa').find('#cidade').val('');
            $(this).closest('.panel_pessoa').find('#cidade').empty();
            $(this).closest('.panel_pessoa').find('#cidade').append("<option value=''>Selecione uma opção</option>");
            $(this).closest('.panel_pessoa').find('#bairro').val('');
            $(this).closest('.panel_pessoa').find('#logradouro').val('');
            $(this).closest('.panel_pessoa').find('#complemento').val('');
            $(this).closest('.panel_pessoa').find('#numero').val('');

        }

    });




    /**************************************************************
     #
     # Atribui função ao evento change do radio com a classe .radio_deficiente
     # Se a opção escolhida for 'sim', exibir linha extra para escolher tipo de deficiência
     # 
    ***************************************************************/ 
    $(document).on('change', '.radio_deficiente', function() { 

        // Checo se o checkbox está marcado
        if (this.checked) {

            // Checo se o valor marcado é igual a 1 (Sim)
            if ($(this).val() == 1) {

                // Exibo linha de tipo de deficiência
                $(this).closest('.panel_pessoa').find('.hidden_linha_deficiencia').show();

            } else {

                // Oculto linha de tipo de deficiência
                $(this).closest('.panel_pessoa').find('.hidden_linha_deficiencia').hide();

            }

        }

    });




    /***********************************************
     #
     # Aplicando função no botão ADICIONAR PESSOA
     # Gera novas caixas de pessoas para inserir em conjunto
     # 
    ************************************************/ 
    $(document).on('click', '#btn_add_pessoa', function() {

        // Conto o total atual de caixas de pessoa
        var total_caixas_pessoas = $('#caixas_de_pessoas').children().size(); 

        // Prenchendo variável de conteúdo dinâmico
        var conteudo = '';

        // Colocando HTML dentro da variavel
        conteudo += '<div class="panel panel-primary panel_pessoa">';
        conteudo += '<div class="panel-heading heading_panel_pessoa">PESSOA ' + (total_caixas_pessoas + 1) + '</div>';
        conteudo += '<div class="panel-body">';
        conteudo += '<!-- INICIO LINHA -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- INICIO COLUNA ESQUERDA -->';
        conteudo += '<div class="col-md-6 col-xs-12">';
        conteudo += '<!-- INICIO PANEL -->';
        conteudo += '<div class="panel panel-default subpanel_pessoa">';
        conteudo += '<div class="panel-heading">INFORMAÇÕES BÁSICAS</div>';
        conteudo += '<div class="panel-body">';
        conteudo += '<!-- INICIO LINHA -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Inicio Coluna da Foto -->';
        conteudo += '<div class="col-sm-4 col-xs-12 coluna_foto">';
        conteudo += '<label class="control-label">Foto (<span data-tooltip="tooltip" data-placement="right" title="Restrições: Apenas arquivos com extensões JPG, JPEG ou PNG." class="yellow-tooltip"><span class="required-red">?</span></span>)</label>';
        conteudo += '<div class="webcam-grid">';
        conteudo += '<a class="btn btn-primary gray-tooltip webcam" data-tooltip="tooltip" data-placement="bottom" title="Tire uma foto com a Webcam"><span><i class="fas fa-camera-retro" aria-hidden="true"></i></span></a>';
        conteudo += '<a class="btn btn-danger clear-foto" title="Limpar Foto"><span><i class="fas fa-trash-alt" aria-hidden="true"></i></span></a>';
        conteudo += '</div>';
        conteudo += '<div id="imagem" class="thumbnail preview-imagem">';
        conteudo += '<img id="thumb" class="img-responsive lightblue-tooltip foto_thumb" data-tooltip="tooltip" data-placement="bottom" title="Upload de arquivo de imagem" src="<?php echo asset('images/sem_foto.jpg'); ?>" />';
        conteudo += '</div>';
        conteudo += '<!-- *******************';
        conteudo += '#';
        conteudo += '# INICIO MODAL UPLOAD';
        conteudo += '# ';
        conteudo += '************************ -->';
        conteudo += '<div class="modal fade modal_upload" id="modal-upload">';
        conteudo += '<div class="modal-dialog modal-md">';
        conteudo += '<div class="modal-content">';
        conteudo += '<div class="modal-header">';
        conteudo += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
        conteudo += '<h2 class="modal-title">Upload de Foto</h2>';
        conteudo += '</div>';
        conteudo += '<div class="modal-body">';
        conteudo += '<div class="row">';
        conteudo += '<!-- Espaço para exibição de erros de validação -->';
        conteudo += '<div id="avisoValidacao">';
        conteudo += '<div class="col-xs-12">';
        conteudo += '<div class="alert alert-danger msg_erro_modal" style="display: none;"></div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row">';
        conteudo += '<div class="form-group col-md-12">';
        conteudo += '<div class="box_alerta_amarelo">';
        conteudo += '<h4 style="margin-top: 0px;">Restrições</h4>';
        conteudo += '- Apenas arquivo com extensão JPG, PNG ou GIF.';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row">';
        conteudo += '<div class="col-md-12">';
        conteudo += '<label class="control-label">Arquivo</label>';
        conteudo += '<input type="file" name="foto" id="foto" class="foto_pessoa" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="modal-footer">';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_imagem">Enviar Arquivo</a>';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_imagem">Cancelar</a>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- *******************';
        conteudo += '#';
        conteudo += '# FIM MODAL UPLOAD';
        conteudo += '# ';
        conteudo += '************************ -->';
        conteudo += '<!-- *******************';
        conteudo += '#';
        conteudo += '# INICIO MODAL WEBCAM';
        conteudo += '#';
        conteudo += '************************ -->';
        conteudo += '<div class="modal fade modal_webcam" id="modal-webcam">';
        conteudo += '<div class="modal-dialog modal-md">';
        conteudo += '<div class="modal-content">';
        conteudo += '<div class="modal-header">';
        conteudo += '<button onclick="close_snapshot();" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
        conteudo += '<h2 class="modal-title"><strong>Tire a foto com a Webcam</strong></h2>';
        conteudo += '</div>';
        conteudo += '<div class="modal-body">';
        conteudo += '<div class="row">';
        conteudo += '<div class="col-md-12">';
        conteudo += '<div id="my_camera" class="center-block"><!-- ESPAÇO ONDE APARECERÁ A FOTO --></div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row" style="margin-top: 10px;">';
        conteudo += '<div class="col-md-12">';
        conteudo += '<div align="center">';
        conteudo += '<a href="javascript:void(null);" class="btn btn-sm btn-primary btn_tirar_foto">Tirar Foto</a>';
        conteudo += '<a href="javascript:void(null);" class="btn btn-sm btn-info btn_nova_foto">Nova Foto</a>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="modal-footer">';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_foto">Salvar Foto</a>';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_foto">Cancelar</a>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- *****************';
        conteudo += '#';
        conteudo += '# FIM MODAL WEBCAM';
        conteudo += '#';
        conteudo += '********************** -->';
        conteudo += '</div>';
        conteudo += '<!-- Fim Coluna da Foto -->';
        conteudo += '<!-- Inicio Coluna Dados Basicos -->';
        conteudo += '<div class="col-sm-8 col-xs-12">';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-12 col-xs-12">';
        conteudo += '<label class="control-label">Nome <span class="required-red">*</span></label>';
        conteudo += '<input type="text" id="nome" name="nome" class="form-control input-sm letra-maiuscula c_nome" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-sm-6 col-xs-12">'; 
        conteudo += '<label class="control-label">Data de Nasc. <span class="required-red">*</span></label>';
        conteudo += '<input type="text" class="form-control input-sm data_nascimento" name="data_nascimento" id="data_nascimento" placeholder="00/00/0000" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-sm-6 col-xs-12">';
        conteudo += '<label class="control-label">Sexo </label>';
        conteudo += '<select class="form-control input-sm" name="sexo" id="sexo">';
        conteudo += '<option value="">Selecione</option>';
        conteudo += '<option value="2">Feminino</option>';
        conteudo += '<option value="1">Masculino</option>';        
        conteudo += '</select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">CPF <span class="required-red">*</span></label>';
        conteudo += '<input type="text" id="cpf" name="cpf" class="form-control input-sm cpf" autocomplete="off" placeholder="000.000.000-00" />';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">RG</label>';
        conteudo += '<input type="text" id="rg" name="rg" class="form-control input-sm" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Fim Coluna Dados Basicos -->';
        conteudo += '</div>';
        conteudo += '<!-- FIM LINHA -->';
        conteudo += '<!-- INICIO LINHA -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Inicio Coluna Complemento Dados Basicos -->';
        conteudo += '<div class="col-sm-12 col-xs-12 complemento_dados_basicos">';        
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="col-sm-6 col-xs-12">';
        conteudo += '<label class="control-label">Documento com foto (<span data-tooltip="tooltip" data-placement="right" title="Restrições: Apenas arquivos com extensões PDF, JPG, JPEG ou PNG." class="yellow-tooltip"><span class="required-red">?</span></span>)</label>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Div com preview do arquivo selecionado via upload -->';
        conteudo += '<div class="form-group col-md-5 col-xs-12 bg-info preview-documento">';
        conteudo += '<div class="row text-center">';
        conteudo += '<div class="col-md-12 col-xs-12"><span style="font-size: 1.6em; color: #73879C;"><i class="fas fa-file-upload"></i></span></div>';
        conteudo += '</div';
        conteudo += '<div class="row text-center">';
        conteudo += '<div class="col-md-12 col-xs-12 txt-preview-documento" style="padding-top: 5px;">Selecione um documento com foto de seu computador</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Div com preview do arquivo selecionado via webcam -->';
        conteudo += '<div class="form-group col-md-5 col-xs-12 col-md-offset-2 bg-info preview-documento-webcam">';
        conteudo += '<div class="row text-center">';
        conteudo += '<div class="col-md-12 col-xs-12"><span style="font-size: 1.6em; color: #73879C;"><i class="fas fa-camera-retro" aria-hidden="true"></i></span></div>';
        conteudo += '</div>';
        conteudo += '<div class="row text-center">';
        conteudo += '<div class="col-md-12 col-xs-12 txt-preview-documento" style="padding-top: 5px;">Tire uma foto do documento com a Webcam</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- *******************';
        conteudo += '#';
        conteudo += '# INICIO MODAL DOCUMENTO';
        conteudo += '# ';
        conteudo += '************************ -->';
        conteudo += '<div class="modal fade modal_documento" id="modal-documento">';
        conteudo += '<div class="modal-dialog modal-md">';
        conteudo += '<div class="modal-content">';
        conteudo += '<div class="modal-header">';
        conteudo += '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
        conteudo += '<h2 class="modal-title">Upload de Documento</h2>';
        conteudo += '</div>';
        conteudo += '<div class="modal-body">';
        conteudo += '<div class="row">';
        conteudo += '<!-- Espaço para exibição de erros de validação -->';
        conteudo += '<div id="avisoValidacao">';
        conteudo += '<div class="col-xs-12">';
        conteudo += '<div class="alert alert-danger msg_erro_documento" style="display: none;"></div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row">';
        conteudo += '<div class="form-group col-md-12">';
        conteudo += '<div class="box_alerta_amarelo">';
        conteudo += '<h4 style="margin-top: 0px;">Restrições</h4>';
        conteudo += '- Apenas arquivo com extensão PDF, JPG, JPEG ou PNG.';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row">';
        conteudo += '<div class="form-group col-md-12">';
        conteudo += '<label class="control-label">Descrição do documento</label>';
        conteudo += '<select class="form-control input-sm" name="descricao_arquivo_documento" id="descricao_arquivo_documento">';
        conteudo += '<option value="">Selecione</option>';
        conteudo += '<option value="Carteira de Habilitação">Carteira de Habilitação (CNH)</option>';
        conteudo += '<option value="Carteira de Identidade">Carteira de Identidade (RG)</option>';
        conteudo += '<option value="Carteira de Trabalho">Carteira de Trabalho (CTPS)</option>';
        conteudo += '<option value="Passaporte">Passaporte</option>';
        conteudo += '<option value="Conselhos">Conselhos</option>';
        conteudo += '</select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row">';
        conteudo += '<div class="col-md-12">';
        conteudo += '<label class="control-label">Arquivo</label>';
        conteudo += '<input type="file" name="arquivo_documento" id="arquivo_documento" class="form-control" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="modal-footer">';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_documento">Enviar Arquivo</a>';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_documento">Cancelar</a>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- *******************';
        conteudo += '#';
        conteudo += '# FIM MODAL DOCUMENTO';
        conteudo += '# ';
        conteudo += '************************ -->';
        conteudo += '<!-- *******************';
        conteudo += '#';
        conteudo += '# INICIO MODAL WEBCAM DOCUMENTO';
        conteudo += '# ';
        conteudo += '************************ -->';
        conteudo += '<div class="modal fade modal_webcam_documento" id="modal-webcam-documento">';
        conteudo += '<div class="modal-dialog modal-md">';
        conteudo += '<div class="modal-content">';
        conteudo += '<div class="modal-header">';
        conteudo += '<button onclick="close_snapshot_documento();" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
        conteudo += '<h2 class="modal-title"><strong>Fotografar documento com a Webcam</strong></h2>';
        conteudo += '</div>';
        conteudo += '<div class="modal-body">';
        conteudo += '<div class="row">';
        conteudo += '<div class="col-md-12">';
        conteudo += '<div id="my_camera_documento" class="center-block"><!-- ESPAÇO ONDE APARECERÁ A FOTO --></div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row" style="margin-top: 10px;">';
        conteudo += '<div class="col-md-12">';
        conteudo += '<div align="center">';
        conteudo += '<a href="javascript:void(null);" class="btn btn-sm btn-primary btn_tirar_foto_documento">Tirar Foto</a>';
        conteudo += '<a href="javascript:void(null);" class="btn btn-sm btn-info btn_nova_foto_documento">Nova Foto</a>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="row">';
        conteudo += '<div class="form-group col-md-12">';
        conteudo += '<label class="control-label">Descrição do documento</label>';
        conteudo += '<select class="form-control input-sm" name="descricao_arquivo_documento" id="descricao_arquivo_documento">';
        conteudo += '<option value="">Selecione</option>';
        conteudo += '<option value="Carteira de Habilitação">Carteira de Habilitação (CNH)</option>';
        conteudo += '<option value="Carteira de Identidade">Carteira de Identidade (RG)</option>';
        conteudo += '<option value="Carteira de Trabalho">Carteira de Trabalho (CTPS)</option>';
        conteudo += '<option value="Passaporte">Passaporte</option>';
        conteudo += '<option value="Conselhos">Conselhos</option>';
        conteudo += '</select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<div class="modal-footer">';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-success btn_salvar_foto_documento">Salvar Foto</a>';
        conteudo += '<a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_foto_documento">Cancelar</a>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- *****************';
        conteudo += '#';
        conteudo += '# FIM MODAL WEBCAM DOCUMENTO';
        conteudo += '# ';
        conteudo += '********************** -->';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-sm-6 col-xs-12">';
        conteudo += '<label class="control-label">Estado Civil </label>';
        conteudo += '<select class="form-control input-sm" name="estado_civil" id="estado_civil">';
        conteudo += '<option value="">Selecione</option>';
        conteudo += '<option value="1">Solteiro(a)</option>';
        conteudo += '<option value="2">Casado(a)</option>';
        conteudo += '<option value="3">Viúvo(a)</option>';
        conteudo += '<option value="4">Divorciado(a)</option>';
        conteudo += '</select>';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">Certidão de Nascimento</label>';
        conteudo += '<input type="text" id="matricula_certidao_nascimento" name="matricula_certidao_nascimento" class="form-control input-sm" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-12 col-xs-12">';
        conteudo += '<label class="control-label">Nome da Mãe</label>';
        conteudo += '<input type="text" id="filiacao_mae" name="filiacao_mae" class="form-control input-sm c_filiacao_mae" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-12 col-xs-12">';
        conteudo += '<label class="control-label">Nome do Pai</label>';
        conteudo += '<input type="text" id="filiacao_pai" name="filiacao_pai" class="form-control input-sm c_filiacao_pai" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row linha_deficiencia">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-4 col-xs-12">';
        conteudo += '<label class="control-label">Deficiente ? <span class="required-red">*</span></label>';
        conteudo += '<br />';
        conteudo += '<input type="radio" name="deficiente[' + (total_caixas_pessoas + 1) + ']" id="deficiente" class="radio_deficiente" value="1"> ';
        conteudo += '<label class="control-label">Sim</label>';
        conteudo += ' <input type="radio" name="deficiente[' + (total_caixas_pessoas + 1) + ']" id="deficiente" class="radio_deficiente" value="0" checked="checked"> ';
        conteudo += '<label class="control-label">Não</label>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row linha_deficiencia hidden_linha_deficiencia" style="display: none;">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-12 col-xs-12">';
        conteudo += '<label class="control-label">Tipos de Deficiências</label>';
        conteudo += '<br />';
        conteudo += '<input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="1"> ';
        conteudo += '<label class="form-check-label" for="tipo_deficiencia">Auditiva</label>';
        conteudo += ' <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="2"> ';
        conteudo += '<label class="form-check-label" for="tipo_deficiencia">Física</label>';
        conteudo += ' <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="3"> ';
        conteudo += '<label class="form-check-label" for="tipo_deficiencia">Mental</label>';
        conteudo += ' <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="4"> ';
        conteudo += '<label class="form-check-label" for="tipo_deficiencia">Visual</label>';
        conteudo += ' <input class="form-check-input" type="checkbox" name="tipo_deficiencia[]" id="tipo_deficiencia" value="5"> ';
        conteudo += '<label class="form-check-label" for="tipo_deficiencia">Múltipla</label>';
        conteudo += '</div>';
        conteudo += '</div>';
        /*conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-12 col-xs-12">';
        conteudo += '<label class="control-label">Parentesco</label>';
        conteudo += '<select class="form-control input-sm" name="parentesco" id="parentesco">';
        conteudo += '<option value="">Selecione</option>';
        conteudo += '<option value="amigo(a)">Amigo(a)</option>';
        conteudo += '<option value="avô(ó)">Avô(ó)</option>';
        conteudo += '<option value="esposo(a)">Esposo(a)</option>';
        conteudo += '<option value="filho(a)">Filho(a)</option>';
        conteudo += '<option value="irmã(o)">Irmã(o)</option>';
        conteudo += '<option value="mãe">Mãe</option>';
        conteudo += '<option value="pai">Pai</option>';
        conteudo += '<option value="primo(a)">Primo(a)</option>';
        conteudo += '<option value="sobrinho(a)">Sobrinho(a)</option>';
        conteudo += '<option value="tio(a)">Tio(a)</option>';
        conteudo += '</select>';
        conteudo += '</div>';
        conteudo += '</div>';*/
        conteudo += '</div>';
        conteudo += '<!-- Fim Coluna Complemento Dados Basicos -->';
        conteudo += '</div>';
        conteudo += '<!-- FIM LINHA -->';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- FIM PANEL -->';
        conteudo += '</div>';
        conteudo += '<!-- FIM COLUNA ESQUERDA -->';
        conteudo += '<!-- INICIO COLUNA DIREITA -->';
        conteudo += '<div class="col-md-6 col-xs-12">';
        conteudo += '<!-- INICIO PANEL -->';
        conteudo += '<div class="panel panel-default subpanel_pessoa_b">';
        conteudo += '<div class="panel-heading">ENDEREÇO</div>';
        conteudo += '<div class="panel-body">';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-8 col-xs-12">';
        conteudo += '<input class="form-check-input endereco_primeiro_registro" type="checkbox" name="usar_endereco_primeiro_registro" id="usar_endereco_primeiro_registro" value="sim"> ';
        conteudo += 'Usar endereço do primeiro registro';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">CEP <span class="required-red">*</span></label>';
        conteudo += '<input type="text" id="cep" name="cep" class="form-control input-sm cep" autocomplete="off" placeholder="00000-000" />';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-sm-6 col-xs-12">';
        conteudo += '<label class="control-label">Estado <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control input-sm estado" name="estado" id="estado">';
        conteudo += '<option value="">Selecione</option>';
        <?php foreach ($estados as $estado) : ?>
            conteudo += '<option value="<?php echo $estado->cod_estado; ?>"><?php echo $estado->nome_estado; ?></option>';
        <?php endforeach; ?>
        conteudo += '</select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-sm-6 col-xs-12">';
        conteudo += '<label class="control-label">Cidade <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control input-sm cidade" name="cidade" id="cidade">';
        conteudo += '<option value="">Selecione um estado</option>';
        conteudo += '</select>';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">Bairro <span class="required-red">*</span></label>';
        conteudo += '<input type="text" id="bairro" name="bairro" class="form-control input-sm" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-12 col-xs-12">';
        conteudo += '<label class="control-label">Logradouro <span class="required-red">*</span></label>';
        conteudo += '<input type="text" id="logradouro" name="logradouro" class="form-control input-sm" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-8 col-xs-12">';
        conteudo += '<label class="control-label">Complemento</label>';
        conteudo += '<input type="text" id="complemento" name="complemento" class="form-control input-sm" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-4 col-xs-12">';
        conteudo += '<label class="control-label">Número <span class="required-red">*</span></label>';
        conteudo += '<input type="text" id="numero" name="numero" class="form-control input-sm" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- FIM PANEL -->';
        conteudo += '<!-- INICIO PANEL -->';
        conteudo += '<div class="panel panel-default subpanel_pessoa_b">';
        conteudo += '<div class="panel-heading">CONTATO</div>';
        conteudo += '<div class="panel-body">';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-12 col-xs-12">';
        conteudo += '<label class="control-label">E-mail</label>';
        conteudo += '<input type="text" id="email" name="email" class="form-control input-sm c_email" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">Telefone</label>';
        conteudo += '<input type="text" id="telefone" name="telefone" class="form-control input-sm telefone" autocomplete="off" placeholder="(00) 0000-0000" />';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">Celular</label>';
        conteudo += '<input type="text" id="celular" name="celular" class="form-control input-sm celular" autocomplete="off" placeholder="(00) 00000-0000" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- FIM PANEL -->';
        conteudo += '<!-- INICIO PANEL -->';
        conteudo += '<div class="panel panel-default subpanel_pessoa">';
        conteudo += '<div class="panel-heading">INFORMAÇÕES DE LOGIN</div>';
        conteudo += '<div class="panel-body">';
        conteudo += '<!-- Linha -->';
        conteudo += '<div class="row">';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">Usuário </label>';
        conteudo += '<input type="text" id="usuario" name="usuario" class="form-control input-sm" autocomplete="off" placeholder="Usuário de acesso" minlength="5" maxlength="30" />';
        conteudo += '</div>';
        conteudo += '<!-- Coluna -->';
        conteudo += '<div class="form-group col-md-6 col-xs-12">';
        conteudo += '<label class="control-label">Senha (Min. 6 caracteres) </label>';
        conteudo += '<input type="password" id="senha" name="senha" class="form-control input-sm" autocomplete="off" placeholder="Senha de acesso" minlength="6" maxlength="30" />';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '<!-- FIM PANEL -->';
        conteudo += '</div>';
        conteudo += '<!-- FIM COLUNA DIREITA -->';
        conteudo += '</div>';
        conteudo += '<!-- FIM LINHA -->';

        <?php
        // Checo a origem de acesso do componente
        if ($origem == 'gerenciarmembros') { 
        ?>

            conteudo += '<!-- INICIO LINHA -->';
            conteudo += '<div class="row" style="margin-top: 8px;">';
            conteudo += '<!-- Coluna -->';
            conteudo += '<div class="form-group col-md-12 col-xs-12">';
            conteudo += '<!-- INICIO PANEL -->';
            conteudo += '<div class="panel panel-default subpanel_pessoa">';
            conteudo += '<div class="panel-heading">INFORMAÇÕES PARA CONTRATO</div>';
            conteudo += '<div class="panel-body">';
            conteudo += '<div class="row">';
            conteudo += '<label class="control-label col-md-12 col-xs-12">Vínculo <span class="required-red">*</span></label>';
            conteudo += '</div>';
            conteudo += '<div class="row">';
            conteudo += '<div class="col-md-12 col-xs-12">';
            conteudo += '<select class="form-control input-sm" name="vinculo_para_contrato" id="vinculo_para_contrato">';
            conteudo += '<option value="">Selecione</option>';
            conteudo += '<option value="1">Membro</option>';
            conteudo += '<option value="2">Membro e Resp. Financeiro</option>';
            conteudo += '<option value="3">Resp. Financeiro</option>';
            conteudo += '</select>';
            conteudo += '</div>';
            conteudo += '</div>';
            conteudo += '</div>';
            conteudo += '</div>';
            conteudo += '<!-- FIM PANEL -->';
            conteudo += '</div>';
            conteudo += '</div>';
            conteudo += '<!-- FIM LINHA -->';

        <?php
        }
        ?>
        conteudo += '<!-- BOTÃO PARA REMOVER PESSOAS -->';
        conteudo += '<a class="btn btn-sm btn-danger pull-right" id="btn_remove_pessoa" href="javascript:void(null);">';
        conteudo += '<i class="fa fa-times-circle"></i> Remover Caixa';
        conteudo += '</a>';
        conteudo += '</div>';
        conteudo += '</div>';

        // Insiro variavel dentro da div que engloba todas as caixas de pessoas
        $(conteudo).appendTo('#caixas_de_pessoas');

        // Ativação de máscaras de campos 
        $('.cpf').mask('000.000.000-00');
        $('.cep').mask('00000-000');
        $('.celular').mask('(00) 00000-0000');
        $('.telefone').mask('(00) 0000-0000');

        // Ativação de plugin datepicker em campos
        $('.data_nascimento').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            weekStart: 0,
            startDate: '-120y',
            endDate: '0d',
            todayHighlight: true,
            autoclose: true
        });

        // Controle de caracteres permitidos no campo
        $('.c_nome').on('input blur keyup paste', function() {

            // Expressão regular. Permite letras e o caracter '-'
            var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\. ]/g;

            // Testo o valor digitado com a expressão
            if (this.value.match(regexp)) {

                $(this).val(this.value.replace(regexp,''));

            }

        });

        $('.c_filiacao_mae').on('input blur keyup paste', function() {

            // Expressão regular. Permite letras e o caracter '-'
            var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\. ]/g;

            // Testo o valor digitado com a expressão
            if (this.value.match(regexp)) {

                $(this).val(this.value.replace(regexp,''));

            }

        });

        $('.c_filiacao_pai').on('input blur keyup paste', function() {

            // Expressão regular. Permite letras e o caracter '-'
            var regexp = /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\. ]/g;

            // Testo o valor digitado com a expressão
            if (this.value.match(regexp)) {

                $(this).val(this.value.replace(regexp,''));

            }

        });

        $('.c_email').on('input blur keyup paste', function() {

            // Expressão regular. Permite letras e o caracter '-'
            var regexp = /[^a-zA-Z0-9-_.@ ]/g;

            // Testo o valor digitado com a expressão
            if (this.value.match(regexp)) {

                $(this).val(this.value.replace(regexp,''));

            }

        });

    });




    /***********************************************
     #
     # Aplicando função no botão REMOVER PESSOA
     # 
    ************************************************/ 
    $(document).on('click', '#btn_remove_pessoa', function() {

        // Remove caixa de pessoa
        $(this).closest('.panel_pessoa').remove();

        // Conto o total atual de caixas de pessoa
        var total_caixas_pessoas = $('#caixas_de_pessoas').children().size(); 

        // Contador
        var i = 1;

        // Loop por todas as caixas de pessoas
        $('div#caixas_de_pessoas > div.panel_pessoa').each(function() {

            // Checo se o contador é menor ou igual ao total de caixas restantes
            if (i <= total_caixas_pessoas) {

                // Modifico o texto do heading da caixa copiada (Ex: Pessoa 2, Pessoa 3, etc)
                $(this).find('.heading_panel_pessoa').html('PESSOA ' + i);

                // Modifica name dos radiobuttons 'deficiente?'
                $(this).find('.radio_deficiente').attr('name', 'deficiente[' + i + ']');

                // Incrementa contador
                i++;

            }

        });

    });




    /************************************
     #
     # Aplicando função no botão SALVAR
     # 
    *************************************/ 
    $(document).on('click', '#btn_salvar', function(e) {
     
        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Limpo e oculto div de erros
        $('.msg_erro_cadastrar').html('');
        $('.msg_erro_cadastrar').hide();
        $('.msg_erro_gerencia_membro').html('');
        $('.msg_erro_gerencia_membro').hide();

        // Declaração de variaveis
        var form_valido = true;
        var msg_erro_validacao;
        var pessoas_pai = new Array; // Crio um array
        var pessoas_filho = {}; // Crio um objeto
        var tipo_deficiencia_selecionados = new Array; // Crio um array
        var contador = 1;
        var cpfs_usados = new Array; // Variavel de controle de CPFs repetidos

        // Loop por todas as caixas de pessoas 
        $('div#caixas_de_pessoas > div.panel_pessoa').each(function() {

            // Reuno os dados da caixa atual do loop e coloco num objeto javascript
            /************************************
              ::: INFORMAÇÕES BÁSICAS :::
            *************************************/
            pessoas_filho['foto_webcam'] = ($('#foto_webcam', this).val() == null) ? '' : $('#foto_webcam', this).val(); // Nome da foto salva pela webcam
            pessoas_filho['foto_upload'] = ($('#foto_upload', this).val() == null) ? '' : $('#foto_upload', this).val(); // Foto enviada via upload
            pessoas_filho['nome'] = $('#nome', this).val();
            pessoas_filho['data_nascimento'] = $('#data_nascimento', this).val();
            pessoas_filho['sexo'] = $('#sexo', this).val();
            pessoas_filho['cpf'] = $('#cpf', this).val();
            pessoas_filho['rg'] = $('#rg', this).val();
            pessoas_filho['documento_foto'] = $('#documento_foto', this).val(); // Documento enviado via upload
            pessoas_filho['descricao_documento_foto'] = $('#descricao_documento_foto', this).val();
            pessoas_filho['estado_civil'] = $('#estado_civil', this).val();
            pessoas_filho['matricula_certidao_nascimento'] = $('#matricula_certidao_nascimento', this).val();
            pessoas_filho['filiacao_mae'] = $('#filiacao_mae', this).val();
            pessoas_filho['filiacao_pai'] = $('#filiacao_pai', this).val();
            pessoas_filho['deficiente'] = ($('#deficiente:checked', this).val() == null) ? '' : $('#deficiente:checked', this).val();
            
            // Faço loop por possiveis checkboxes marcados
            $(this).find('input[name="tipo_deficiencia[]"]:checked').each(function() {
                tipo_deficiencia_selecionados.push($(this).val());
            });

            pessoas_filho['tipo_deficiencia'] = (tipo_deficiencia_selecionados.length == 0) ? '' : tipo_deficiencia_selecionados; // Checo tamanho do array de tipos de deficiências com o length
            /************************************
              ::: ENDEREÇO :::
            *************************************/
            pessoas_filho['usar_endereco_primeiro_registro'] = ($('#usar_endereco_primeiro_registro:checked', this).val() == null) ? '' : $('#usar_endereco_primeiro_registro:checked', this).val();
            pessoas_filho['cep'] = $('#cep', this).val();
            pessoas_filho['estado'] = $('#estado', this).val();
            pessoas_filho['cidade'] = $('#cidade', this).val();
            pessoas_filho['bairro'] = $('#bairro', this).val();
            pessoas_filho['logradouro'] = $('#logradouro', this).val();
            pessoas_filho['complemento'] = $('#complemento', this).val();
            pessoas_filho['numero'] = $('#numero', this).val();
            /************************************
              ::: CONTATO :::
            *************************************/
            pessoas_filho['email'] = $('#email', this).val();
            pessoas_filho['telefone'] = $('#telefone', this).val();
            pessoas_filho['celular'] = $('#celular', this).val();
            /************************************
              ::: INFORMAÇÕES DE LOGIN :::
            *************************************/
            pessoas_filho['usuario'] = $('#usuario', this).val();
            pessoas_filho['senha'] = $('#senha', this).val();
            /************************************
              ::: INFORMAÇÕES DE CONTRATO :::
            *************************************/
            pessoas_filho['vinculo_para_contrato'] = $('#vinculo_para_contrato', this).val();

            /*
             ###########################################
             # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
             ###########################################
            */
            if (pessoas_filho['nome'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo NOME da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            if (pessoas_filho['data_nascimento'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo DATA DE NASCIMENTO da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            // Calcula idade da pessoa através da data de nascimento
            var a = pessoas_filho['data_nascimento'].split('/');
            var idade = checa_idade(a[2], a[1], a[0]);

            // Checa se é menor de idade
            if (idade < 18) {

                // Campos obrigatórios apenas para menores de idade
                if (pessoas_filho['matricula_certidao_nascimento'].length === 0 && pessoas_filho['filiacao_mae'].length === 0) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- A pessoa cujo dados foram digitados na caixa <i>PESSOA ' + contador + '</i> é menor de idade, logo deverá ser informado obrigatoriamente a MATRICULA DA CERTIDÃO DO NASCIMENTO ou o NOME DA MÃE.';
                    // Sai do loop
                    return false;
                }

            }

            // Checa se é maior de idade
            if (idade >= 18) {

                // Checo se o CPF foi preenchido
                if (pessoas_filho['cpf'].length === 0) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- O campo CPF da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                    // Sai do loop
                    return false;
                }

                // Checo se o CPF é válido
                if (!valida_cpf_cnpj(pessoas_filho['cpf'])) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- O campo CPF da caixa <i>PESSOA ' + contador + '</i> foi preenchido com uma informação inválida.';
                    // Sai do loop
                    return false;
                }

                // Checo se o CPF já foi utilizado em outra caixa de pessoa
                if ($.inArray(pessoas_filho['cpf'], cpfs_usados) !== -1) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- O CPF informado na caixa <i>PESSOA ' + contador + '</i> já foi utilizado previamente.';
                    // Sai do loop
                    return false;
                }

            }

            if (pessoas_filho['deficiente'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo DEFICIENTE da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            // Verificação adicional para o caso de ter marcado a opção 'sim' no campo deficiente
            if (pessoas_filho['deficiente'] == 1) {

                if (pessoas_filho['tipo_deficiencia'].length === 0) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- É necessário informar os TIPOS DE DEFICIÊNCIAS na caixa <i>PESSOA ' + contador + '</i>.';
                    // Sai do loop
                    return false;
                }

            }

            if (pessoas_filho['cep'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo CEP da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            if (pessoas_filho['estado'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo ESTADO da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            if (pessoas_filho['cidade'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo CIDADE da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            if (pessoas_filho['bairro'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo BAIRRO da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            if (pessoas_filho['logradouro'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo LOGRADOURO da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            if (pessoas_filho['numero'].length === 0) {
                // Sinaliza erro
                form_valido = false;
                // Monto mensagem de erro
                msg_erro_validacao = '- O campo NÚMERO da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                // Sai do loop
                return false;
            }

            if (pessoas_filho['telefone'].length > 0) {

                if (pessoas_filho['telefone'].length < 10) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- O campo TELEFONE da caixa <i>PESSOA ' + contador + '</i> deve possuir pelo menos 10 caracteres.';
                    // Sai do loop
                    return false;
                }

            }

            if (pessoas_filho['celular'].length > 0) {

                if (pessoas_filho['celular'].length < 11) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- O campo TELEFONE da caixa <i>PESSOA ' + contador + '</i> deve possuir pelo menos 11 caracteres.';
                    // Sai do loop
                    return false;
                }

            }

            if (pessoas_filho['senha'].length > 0) {

                if (pessoas_filho['senha'].length < 6) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- O campo SENHA da caixa <i>PESSOA ' + contador + '</i> deve possuir pelo menos 6 caracteres.';
                    // Sai do loop
                    return false;
                }

            }

            <?php
            // Checo a origem de acesso do componente
            if ($origem == 'gerenciarmembros') { 
            ?>
                if (pessoas_filho['vinculo_para_contrato'].length === 0) {
                    // Sinaliza erro
                    form_valido = false;
                    // Monto mensagem de erro
                    msg_erro_validacao = '- O campo VÍNCULO da caixa <i>PESSOA ' + contador + '</i> não foi preenchido corretamente.';
                    // Sai do loop
                    return false;
                }
            <?php
            }
            ?>
            /*
             ###########################################
             # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
             ###########################################
            */

            // Coloco o Objeto filho dentro do Array pai
            pessoas_pai.push(pessoas_filho);

            // Coloco o CPF dentro do array de CPFs usados
            cpfs_usados.push(pessoas_filho['cpf']);

            // Limpo variaveis para futuras utilizações
            pessoas_filho = {};
            tipo_deficiencia_selecionados = new Array;
            a = null;
            idade = null;

            // Incrementa contador
            contador++;

        }); // Fecho loop pelas caixas de pessoas

        // Checo se houve erro no preenchimento dos campos obrigatórios
        if (form_valido == false) {

            // Coloco mensagem dentro da div de erros
            $('.msg_erro_cadastrar').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_cadastrar').append(msg_erro_validacao);

            // Exibo div de erros
            $('.msg_erro_cadastrar').show();

            // Volto até o topo da tela para chamar a atenção
            $([document.documentElement, document.body]).animate({
                scrollTop: $('.row_msg_erro_cadastrar').offset().top
            }, 'fast'); 

            // Travo execução do resto da função
            return false;

        }

        // Converto Array para JSON
        pessoas_em_json = JSON.stringify(pessoas_pai, null, 2); 

        <?php
        if ($origem == 'cadastrarcontrato' || $origem == 'cadastrarcontratopj') {
        ?>

            // Limpa valor da DIV
            $('.msg_erro').html('');

            // Oculta DIV
            $('.msg_erro').hide();

            // Resetando todos os possiveis Toast
            $.toast().reset('all');

            // Procuro serviços possiveis dentro de input hidden #servicos_do_plano (as informações foram salvas dentro dele previamente)
            var servicos_possiveis = $('#servicos_do_plano').val();

            // Checo se existem serviços possiveis para listar
            if (servicos_possiveis == '') {

                // Coloco mensagem dentro da div de erros
                $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro').append('Antes de selecionar os membros, você deve definir o plano que será utilizado.');

                // Exibo div de erros
                $('.msg_erro').show();

                // Volto até o topo da tela para chamar a atenção
                $('html, body').animate({ scrollTop: 0 }, 'fast'); 

                return false;

            }

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

        <?php
        }
        ?>
        
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/cadastrar'); ?>",
            data: { 
                "pessoas_para_cadastro": pessoas_em_json,
                "origem": '<?php echo $origem; ?>'
            },
            beforeSend: function() { 

                // Limpa valor da DIV
                $('.msg_erro_cadastrar').html('');
                $('.msg_sucesso_cadastrar').html('');

                // Oculta DIV
                $('.msg_erro_cadastrar').hide();
                $('.msg_sucesso_cadastrar').hide();

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

                    // Coloco mensagem dentro da div de erros
                    $('.msg_erro_cadastrar').append('<h4 class="pt-0">Alerta</h4>');
                    $('.msg_erro_cadastrar').append(response.erro);  

                    // Exibo div de erros
                    $('.msg_erro_cadastrar').show();  

                    // Volto até o topo da tela para chamar a atenção
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $('.row_msg_erro_cadastrar').offset().top
                    }, 'fast');            

                } else if (response.status == 'sucesso') {

                    <?php
                    if ($origem == 'cadastrarcontrato') {
                    ?>

                        // Oculta mensagem 'processando...
                        $('#msg_processando').hide();

                        // Oculta mensagem de lista de membros vazia
                        $('#texto_sem_pessoas').hide();

                        // Faço loop pelas pessoas que foram cadastradas com sucesso
                        $.each(response.pessoas_cadastradas, function(index, value) {
                        
                            // Preenchendo variável de conteúdo dinâmico
                            var conteudo_cx_membro = '';
                            conteudo_cx_membro += '<div class="col-md-4 col-sm-4 col-xs-12 caixa_membro" data-codigo-pessoa="' + value['cod_pessoa'] + '" style="display: none;">';
                            conteudo_cx_membro += '<div class="x_panel tile" style="border-color: #73879C;">';
                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">CPF: </label>';
                            conteudo_cx_membro += '<div class="col-md-8 col-xs-12">' + value['cpf_pessoa'] + '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Nome: </label>';
                            conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="membro_nome">' + value['nome_pessoa'] + '</span></div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Data Nasc.: </label>';
                            conteudo_cx_membro += '<div class="col-md-8 col-xs-12">' + value['data_nascimento_pessoa'] + '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Vínculo:</label>';
                            conteudo_cx_membro += '<div class="col-md-8 col-xs-12">';
                            conteudo_cx_membro += '<select class="form-control input-sm" name="vinculo" id="vinculo">';
                            conteudo_cx_membro += '<option value="">Selecione</option>';
                            conteudo_cx_membro += '<option value="1">Membro</option>';
                            conteudo_cx_membro += '<option value="2">Membro e Resp. Financeiro</option>';
                            conteudo_cx_membro += '<option value="3">Resp. Financeiro</option>';
                            conteudo_cx_membro += '</select>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<label class="control-label col-md-3 col-xs-12">Serviços:</label>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="col-md-12 col-xs-12">';

                            // Faço loop pelos serviços possiveis
                            $.each(servicos_possiveis, function(chave, valor) {
                                
                                conteudo_cx_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + valor['cod_servico_possivel'] + '">';
                                conteudo_cx_membro += ' ' + valor['nome_servico'] + ' <br />';

                            });

                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '<a class="btn btn-sm btn-danger pull-right" id="btn_remove_membro" style="margin-top: 5px;" href="javascript:void(null);">';
                            conteudo_cx_membro += '<i class="fa fa-times-circle"></i> Remover';
                            conteudo_cx_membro += '</a>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';

                            // Adiciona nova caixa de membro (e uma pequena animação de fade)
                            $(conteudo_cx_membro).appendTo('#espaco_caixa_membros > .row').fadeIn('slow');

                        }); // Fecha $.each

                        // Rola a página até o elemento criado
                        $('html, body').animate({
                            scrollTop: $('#espaco_caixa_membros .caixa_membro:last').offset().top
                        }, 50);

                        // Limpo todos os campos dentro do panel 'cadastrar pessoas'
                        limpar_campos_dentro_div('.panel_cadastrar_pessoas');

                        // Deixo apenas uma caixa de cadastro dentro do panel 'cadastrar pessoas', removendo todas as outras
                        $('div#caixas_de_pessoas').contents(':not(div#primeira_caixa_pessoa)').remove();

                        // Fecho collapse-panel
                        $('.panel_cadastrar_pessoas').find('.panel-collapse.in').collapse('hide');

                    <?php
                    } elseif ($origem == 'cadastrarcontratopj') {
                    ?>

                        // Oculta mensagem 'processando...
                        $('#msg_processando').hide();

                        // Oculta mensagem de lista de membros vazia
                        $('#texto_sem_pessoas').hide();

                        // Faço loop pelas pessoas que foram cadastradas com sucesso
                        $.each(response.pessoas_cadastradas, function(index, value) {
                        
                            // Preenchendo variável de conteúdo dinâmico
                            var conteudo_cx_membro = '';
                            conteudo_cx_membro += '<div class="col-md-4 col-sm-4 col-xs-12 caixa_membro" data-codigo-pessoa="' + value['cod_pessoa'] + '" style="display: none;">';
                            conteudo_cx_membro += '<div class="x_panel tile" style="border-color: #73879C;">';
                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">CPF: </label>';
                            conteudo_cx_membro += '<div class="col-md-8 col-xs-12">' + value['cpf_pessoa'] + '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';

                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Nome: </label>';
                            conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="membro_nome">' + value['nome_pessoa'] + '</span></div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';

                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Data Nasc.: </label>';
                            conteudo_cx_membro += '<div class="col-md-8 col-xs-12">' + value['data_nascimento_pessoa'] + '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '<br />';

                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="form-group">';                    
                            conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Submembros: </label>';
                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';

                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="col-md-12 col-xs-12">';
                            conteudo_cx_membro += '<select class="form-control pessoas_submembro" name="submembros[]" id="submembros' + contador_combo + '" multiple>';
                            conteudo_cx_membro += '</select>';
                            conteudo_cx_membro += '</div>';   
                            conteudo_cx_membro += '</div>'; 
                            conteudo_cx_membro += '<br />'; 

                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<label class="control-label col-md-3 col-xs-12">Serviços:</label>';
                            conteudo_cx_membro += '</div>';

                            conteudo_cx_membro += '<div class="row">';
                            conteudo_cx_membro += '<div class="col-md-12 col-xs-12">';

                            // Faço loop pelos serviços possiveis
                            $.each(servicos_possiveis, function(chave, valor) {
                                
                                conteudo_cx_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + valor['cod_servico_possivel'] + '">';
                                conteudo_cx_membro += ' ' + valor['nome_servico'] + ' <br />';

                            });

                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>';

                            conteudo_cx_membro += '<a class="btn btn-sm btn-danger pull-right" id="btn_remove_membro" style="margin-top: 5px;" href="javascript:void(null);">';
                            conteudo_cx_membro += '<i class="fa fa-times-circle"></i> Remover';
                            conteudo_cx_membro += '</a>';

                            conteudo_cx_membro += '</div>';
                            conteudo_cx_membro += '</div>'; //fim caixa membro

                            // Adiciona nova caixa de membro (e uma pequena animação de fade)
                            $(conteudo_cx_membro).appendTo('#espaco_caixa_membros > .row').fadeIn('slow');

                        }); // Fecha $.each

                        // Rola a página até o elemento criado
                        $('html, body').animate({
                            scrollTop: $('#espaco_caixa_membros .caixa_membro:last').offset().top
                        }, 50);

                        // Limpo todos os campos dentro do panel 'cadastrar pessoas'
                        limpar_campos_dentro_div('.panel_cadastrar_pessoas');

                        // Deixo apenas uma caixa de cadastro dentro do panel 'cadastrar pessoas', removendo todas as outras
                        $('div#caixas_de_pessoas').contents(':not(div#primeira_caixa_pessoa)').remove();

                        // Fecho collapse-panel
                        $('.panel_cadastrar_pessoas').find('.panel-collapse.in').collapse('hide');

                    <?php
                    } elseif ($origem == 'gerenciarmembros') { 
                    ?>

                        // Oculta mensagem 'processando...
                        $('#msg_processando').hide();

                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Pessoa(s) cadastrada(s) com sucesso. Processando inclusão no contrato...',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: false, // em milisegundos
                            allowToastClose: true
                        });

                        // Variavel de controle
                        var sucesso_cadastro_membro = true;

                        // Faço loop pelas pessoas que foram cadastradas com sucesso
                        $.each(response.pessoas_cadastradas, function(index, value) {
                        
                            // Requisição ajax para CADASTRAR MEMBRO
                            $.ajax({
                                cache: false,
                                type: "POST",
                                url: "<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/incluir-membro-ajax'); ?>",
                                data: { 
                                    "cod_contrato_pessoa_fisica_plano": contrato_sendo_gerenciado,
                                    "cod_pessoa": value['cod_pessoa'],
                                    "vinculo": value['vinculo_para_contrato']
                                },
                                beforeSend: function() { 
                                    // Nothing here
                                },
                                success: function(responseR) {
                                    
                                    // Convertendo resposta para objeto javascript
                                    var responseR = JSON.parse(responseR);

                                    // Checo retorno
                                    if (responseR.status == 'erro') {

                                        // Coloco mensagem dentro da div de erros
                                        $('.msg_erro_gerencia_membro').append('<h4 class="pt-0">Alerta</h4>');
                                        $('.msg_erro_gerencia_membro').append(responseR.erro);

                                        // Exibo div de erros
                                        $('.msg_erro_gerencia_membro').show();

                                        /******************************************************************  
                                        * AÇÕES APÓS FALHA
                                        *******************************************************************/
                                        // Fecho collapse-panel
                                        $('.panel_cadastrar_pessoas').find('.panel-collapse.in').collapse('hide');

                                        // Volto até o topo da tela para chamar a atenção
                                        $('html, body').animate({ scrollTop: 0 }, 'fast'); 

                                        // Retorno
                                        return false;              

                                    } else if (responseR.status == 'sucesso') {

                                        // Preenchendo variável de conteúdo dinâmico
                                        var conteudo_cx_membro = '';
                                        conteudo_cx_membro += '<div class="col-md-4 col-sm-4 col-xs-12 caixa_membro" data-codigo-pessoa="' + value['cod_pessoa'] + '" style="display: none;">';
                                        conteudo_cx_membro += '<input type="hidden" id="cod_membro" name="cod_membro" class="codigo_membro" value="' + responseR.cod_membro_crypt + '" />';
                                        conteudo_cx_membro += '<input type="hidden" id="cod_cliente" name="cod_cliente" class="codigo_cliente" value="' + responseR.cod_cliente_crypt + '" />';
                                        conteudo_cx_membro += '<div class="x_panel tile" style="border-color: #73879C;">';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Carteirinha: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.carteirinha_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">CPF: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.cpf_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Nome: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro membro_nome">' + responseR.nome_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Sexo: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.sexo_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Data Nasc.: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.data_nascimento_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Vínculo:</label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12">';
                                        conteudo_cx_membro += '<select class="form-control input-sm" name="vinculo" id="vinculo">';
                                        conteudo_cx_membro += '<option value="">Selecione</option>';

                                        if (responseR.vinculo_pessoa == 1) {
                                            conteudo_cx_membro += '<option value="1" selected="selected">Membro</option>';
                                        } else {
                                            conteudo_cx_membro += '<option value="1">Membro</option>';
                                        }

                                        if (responseR.vinculo_pessoa == 2) {
                                            conteudo_cx_membro += '<option value="2" selected="selected">Membro e Resp. Financeiro</option>';
                                        } else {
                                            conteudo_cx_membro += '<option value="2">Membro e Resp. Financeiro</option>';
                                        }

                                        if (responseR.vinculo_pessoa == 2) {
                                            conteudo_cx_membro += '<option value="3" selected="selected">Resp. Financeiro</option>';
                                        } else {
                                            conteudo_cx_membro += '<option value="3">Resp. Financeiro</option>';
                                        }

                                        conteudo_cx_membro += '</select>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-12 col-xs-12">Serviços:</label>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<div class="col-md-12 col-xs-12">';

                                        // Faço loop pelos serviços possiveis
                                        $.each(servicos_possiveis, function(chave3, valor3) {

                                            conteudo_cx_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + valor3['cod_servico_pessoa_fisica'] + '" />';
                                            conteudo_cx_membro += ' <span class="letra-azul-claro">' + valor3['nome_servico'] + '</span> <br />';

                                        });

                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';

                                        conteudo_cx_membro += '<div class="row" style="margin-top: 10px;">';
                                        conteudo_cx_membro += '<div class="col-md-6 col-xs-12">';
                                        conteudo_cx_membro += '<a class="btn btn-block btn-default btn_ver_membro" href="<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/visualizar'); ?>/' + responseR.cod_pessoa_crypt + '">';
                                        conteudo_cx_membro += '<i class="fa fa-search"></i> Ver';
                                        conteudo_cx_membro += '</a>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="col-md-6 col-xs-12">';
                                        conteudo_cx_membro += '<a class="btn btn-block btn-danger btn_inativa_membro" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/remover-membro'); ?>/' + responseR.cod_membro_crypt + '">';
                                        conteudo_cx_membro += '<i class="fa fa-times-circle"></i> Inativar';
                                        conteudo_cx_membro += '</a>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';

                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';

                                        // Adiciona nova caixa de membro (e uma pequena animação de fade)
                                        $(conteudo_cx_membro).appendTo('.row_espaco_caixa_membros').fadeIn('slow');

                                        /******************************************************************  
                                        * AÇÕES APÓS SUCESSO
                                        *******************************************************************/
                                        // Fecho collapse-panel
                                        $('.panel_cadastrar_pessoas').find('.panel-collapse.in').collapse('hide');

                                        // Rola a página até o elemento criado
                                        $('html, body').animate({
                                            scrollTop: $('#espaco_caixa_membros .caixa_membro:last').offset().top
                                        }, 50);

                                        // Resetando todos os possiveis Toast
                                        $.toast().reset('all');

                                        // Mostra mensagem de sucesso
                                        $.toast({
                                            heading: 'Sucesso',
                                            text: 'Membro incluído com sucesso.',
                                            showHideTransition: 'fade',
                                            icon: 'success',
                                            position: 'top-right',
                                            hideAfter: false, // em milisegundos
                                            allowToastClose: true
                                        });

                                    } // Fecha else if

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
                            }); // Fecha $.ajax

                        }); // Fecha $.each

                        // Limpo todos os campos dentro do panel 'cadastrar pessoas'
                        limpar_campos_dentro_div('.panel_cadastrar_pessoas');

                        // Deixo apenas uma caixa de cadastro dentro do panel 'cadastrar pessoas', removendo todas as outras
                        $('div#caixas_de_pessoas').contents(':not(div#primeira_caixa_pessoa)').remove();

                    <?php
                    } elseif ($origem == 'gerenciarmembrospj') { 
                    ?>

                        // Oculta mensagem 'processando...
                        $('#msg_processando').hide();

                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Pessoa(s) cadastrada(s) com sucesso. Processando inclusão no contrato...',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: false, // em milisegundos
                            allowToastClose: true
                        });

                        // Variavel de controle
                        var sucesso_cadastro_membro = true;

                        // Faço loop pelas pessoas que foram cadastradas com sucesso
                        $.each(response.pessoas_cadastradas, function(index, value) {
                        
                            // Requisição ajax para CADASTRAR MEMBRO
                            $.ajax({
                                cache: false,
                                type: "POST",
                                url: "<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/incluir-membro-ajax'); ?>",
                                data: { 
                                    "cod_contrato_pessoa_juridica_plano": contrato_sendo_gerenciado,
                                    "cod_pessoa": value['cod_pessoa']
                                },
                                beforeSend: function() { 
                                    // Nothing here
                                },
                                success: function(responseR) {
                                    
                                    // Convertendo resposta para objeto javascript
                                    var responseR = JSON.parse(responseR);

                                    // Checo retorno
                                    if (responseR.status == 'erro') {

                                        // Coloco mensagem dentro da div de erros
                                        $('.msg_erro_gerencia_membro').append('<h4 class="pt-0">Alerta</h4>');
                                        $('.msg_erro_gerencia_membro').append(responseR.erro);

                                        // Exibo div de erros
                                        $('.msg_erro_gerencia_membro').show();

                                        /******************************************************************  
                                        * AÇÕES APÓS FALHA
                                        *******************************************************************/
                                        // Fecho collapse-panel
                                        $('.panel_cadastrar_pessoas').find('.panel-collapse.in').collapse('hide');

                                        // Volto até o topo da tela para chamar a atenção
                                        $('html, body').animate({ scrollTop: 0 }, 'fast'); 

                                        // Retorno
                                        return false;              

                                    } else if (responseR.status == 'sucesso') {

                                        // Preenchendo variável de conteúdo dinâmico
                                        var conteudo_cx_membro = '';
                                        conteudo_cx_membro += '<div class="col-md-4 col-sm-4 col-xs-12 caixa_membro" data-codigo-pessoa="' + value['cod_pessoa'] + '" style="display: none;">';
                                        conteudo_cx_membro += '<input type="hidden" id="cod_membro" name="cod_membro" class="codigo_membro" value="' + responseR.cod_membro_crypt + '" />';
                                        conteudo_cx_membro += '<input type="hidden" id="cod_cliente" name="cod_cliente" class="codigo_cliente" value="' + responseR.cod_cliente_crypt + '" />';
                                        conteudo_cx_membro += '<div class="x_panel tile" style="border-color: #73879C;">';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Carteirinha: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.carteirinha_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">CPF: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.cpf_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Nome: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro membro_nome">' + responseR.nome_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Sexo: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.sexo_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Data Nasc.: </label>';
                                        conteudo_cx_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.data_nascimento_pessoa + '</span></div>';
                                        conteudo_cx_membro += '</div>';
                                        
                                        conteudo_cx_membro += '<br />'; 
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<div class="form-group">';                    
                                        conteudo_cx_membro += '<label class="control-label col-md-4 col-xs-12">Submembros: </label>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<div class="col-md-12 col-xs-12">';
                                        conteudo_cx_membro += '<select class="form-control pessoas_submembro" name="submembros[]" id="submembros" multiple>';
                                        conteudo_cx_membro += '</select>';
                                        conteudo_cx_membro += '</div>';   
                                        conteudo_cx_membro += '</div>'; 
                                        conteudo_cx_membro += '<br />';

                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<label class="control-label col-md-12 col-xs-12">Serviços:</label>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="row">';
                                        conteudo_cx_membro += '<div class="col-md-12 col-xs-12">';

                                        // Faço loop pelos serviços possiveis
                                        $.each(servicos_possiveis, function(chave3, valor3) {

                                            conteudo_cx_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + valor3['cod_servico_pessoa_fisica'] + '" />';
                                            conteudo_cx_membro += ' <span class="letra-azul-claro">' + valor3['nome_servico'] + '</span> <br />';

                                        });

                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';

                                        conteudo_cx_membro += '<div class="row" style="margin-top: 10px;">';
                                        conteudo_cx_membro += '<div class="col-md-6 col-xs-12">';
                                        conteudo_cx_membro += '<a class="btn btn-block btn-default btn_ver_membro" href="<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/visualizar'); ?>/' + responseR.cod_pessoa_crypt + '">';
                                        conteudo_cx_membro += '<i class="fa fa-search"></i> Ver';
                                        conteudo_cx_membro += '</a>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '<div class="col-md-6 col-xs-12">';
                                        conteudo_cx_membro += '<a class="btn btn-block btn-danger btn_inativa_membro" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/remover-membro'); ?>/' + responseR.cod_membro_crypt + '">';
                                        conteudo_cx_membro += '<i class="fa fa-times-circle"></i> Inativar';
                                        conteudo_cx_membro += '</a>';
                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';

                                        conteudo_cx_membro += '</div>';
                                        conteudo_cx_membro += '</div>';

                                        // Adiciona nova caixa de membro (e uma pequena animação de fade)
                                        $(conteudo_cx_membro).appendTo('.row_espaco_caixa_membros').fadeIn('slow');

                                        /******************************************************************  
                                        * AÇÕES APÓS SUCESSO
                                        *******************************************************************/
                                        // Fecho collapse-panel
                                        $('.panel_cadastrar_pessoas').find('.panel-collapse.in').collapse('hide');

                                        // Rola a página até o elemento criado
                                        $('html, body').animate({
                                            scrollTop: $('#espaco_caixa_membros .caixa_membro:last').offset().top
                                        }, 50);

                                        // Ativa o select multiple (com busca ajax)
                                        $('.pessoas_submembro').select2({
                                            language: "pt-BR",
                                            placeholder: "Digite o nome da pessoa para localizá-la",
                                            minimumInputLength: 3, // define o valor mínimo de caracteres digitados antes de iniciar a pesquisa
                                            allowClear: true,
                                            ajax: {
                                                type: 'POST',
                                                url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoa/buscar-por-nome'); ?>",
                                                dataType: 'json',
                                                delay: 250,
                                                quietMillis: 250,
                                                data: function (term, page) {
                                                    return {
                                                        q: term, // termo pesquisado
                                                    };
                                                },
                                                processResults: function (data) {
                                                    return {
                                                        results: data.items // informo o nome do vetor de resultados
                                                    };
                                                }
                                            }
                                        });

                                        // Resetando todos os possiveis Toast
                                        $.toast().reset('all');

                                        // Mostra mensagem de sucesso
                                        $.toast({
                                            heading: 'Sucesso',
                                            text: 'Membro incluído com sucesso.',
                                            showHideTransition: 'fade',
                                            icon: 'success',
                                            position: 'top-right',
                                            hideAfter: false, // em milisegundos
                                            allowToastClose: true
                                        });

                                    } // Fecha else if

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
                            }); // Fecha $.ajax

                        }); // Fecha $.each

                        // Limpo todos os campos dentro do panel 'cadastrar pessoas'
                        limpar_campos_dentro_div('.panel_cadastrar_pessoas');

                        // Deixo apenas uma caixa de cadastro dentro do panel 'cadastrar pessoas', removendo todas as outras
                        $('div#caixas_de_pessoas').contents(':not(div#primeira_caixa_pessoa)').remove();

                    <?php
                    } else { 
                    ?>

                        // Alerta sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Pessoa(s) cadastrada(s) com sucesso.',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 2500, // em milisegundos
                            allowToastClose: true,
                            afterHidden: function() { // Evento após o alert desaparecer
                                
                                // Redireciono
                                window.location.replace("<?php echo url(app('prefixo') . '/painel/clientes'); ?>");

                            }
                        });

                    <?php
                    }
                    ?>

                }

            },
            complete: function(response) {
                // Soon
            },
            error: function(response, thrownError) {

                // Oculta mensagem 'processando...
                $('#msg_processando').hide();

                // Insiro mensagem de erro dentro da DIV
                $('.msg_erro_cadastrar').append('Falha na requisição. Atualize a página e tente novamente.');

                // Revela DIV
                $('.msg_erro_cadastrar').show();

                // Volto até o topo da tela para chamar a atenção
                $([document.documentElement, document.body]).animate({
                    scrollTop: $('.row_msg_erro_cadastrar').offset().top
                }, 'fast');

            }
        });

    }); 

}); 	
</script>

<script type="text/javascript">
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
    console.log('Atenção! A Webcam não foi encontrada.');
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
                url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/foto-webcam'); ?>",
                data: { 'data_uri': data_uri },
                type: 'POST',
                dataType: 'json',
                success: function(response) {

                    if (response != false) {
                        
                        $(elemento).closest('.coluna_foto').find('#thumb').attr('src', '<?php echo URL::asset('arquivos-temporarios/clientes') . "/"; ?>' + response.name_file);
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
</script>


<script type="text/javascript">
/*******************************
 #
 # Funções para uso da Webcam
 # PARA TIRAR FOTOS DOS DOCUMENTOS
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
    console.log('Atenção! A Webcam não foi encontrada.');
});

// Pausar Câmera para captura
function take_snapshot_documento() {
    Webcam.freeze();
}

// Despausar Câmera para nova foto
function clear_snapshot_documento() {
    Webcam.unfreeze();
}

// Desligar Câmera
function close_snapshot_documento() {
    Webcam.reset();
}

// Aplicando função no botão WEBCAM (Abre modal para tirar foto com a Webcam)
$(document).on('click', '.preview-documento-webcam', function() {

    var elemento = $(this);

    Webcam.attach('#my_camera_documento');

    $(elemento).closest('.complemento_dados_basicos').find('.modal_webcam_documento').modal('show');

});

// Aplicando função no botão TIRAR FOTO
$(document).on('click', '.btn_tirar_foto_documento', function() {

    take_snapshot_documento();

});

// Aplicando função no botão NOVA FOTO
$(document).on('click', '.btn_nova_foto_documento', function() {

    clear_snapshot_documento();

});

// Aplicando função no botão SALVAR FOTO (Realizar o salvamento da imagem via ajax)
$(document).on('click', '.btn_salvar_foto_documento', function() {

    var elemento = $(this);
    var descricao_documento_selecionado = $(this).closest('.modal_webcam_documento').find('#descricao_arquivo_documento option:selected').val();
    
    origem_camera = 'foto_documento';

    if (descricao_documento_selecionado == '') {

        alert('A escolha de uma descrição para o documento em questão é obrigatória.');

        return false;

    }

    if (origem_camera == 'foto_documento') {

        Webcam.snap(function(data_uri) {

            $.ajax({
                url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/foto-documento-webcam'); ?>",
                data: { 'data_uri': data_uri, 'descricao_arquivo_documento': descricao_documento_selecionado },
                type: 'POST',
                dataType: 'json',
                success: function(response) {

                    if (response != false) {
                        
                        // Atualiza preview 
                        $(elemento).closest('.complemento_dados_basicos').find('.txt-preview-documento').html('<span style="color: #4286f4;">Arquivo selecionado: ' + response.nome_documento + '</span>');

                        // Remove possiveis INPUT HIDDEN criados anteriormente
                        $(elemento).closest('.complemento_dados_basicos').find('#documento_foto').remove();
                        $(elemento).closest('.complemento_dados_basicos').find('#descricao_documento_foto').remove();

                        // Coloca dados do documento dentro de INPUT HIDDEN
                        $(elemento).closest('.complemento_dados_basicos').find('.preview-documento').append("<input type='hidden' id='documento_foto' name='documento_foto' value='" + response.nome_documento + "' />");
                        $(elemento).closest('.complemento_dados_basicos').find('.preview-documento').append("<input type='hidden' id='descricao_documento_foto' name='descricao_documento_foto' value='" + response.descricao_documento + "' />");

                    }

                    close_snapshot_documento();

                },
                error: function() {
                    alert('Erro! A foto do documento não pôde ser processada. Tente novamente.');
                }
            });

        });

        origem_camera = null;

        $(elemento).closest('.complemento_dados_basicos').find('.modal_webcam_documento').modal('hide');

    }

});

// Aplicando função no botão CANCELAR FOTO
$(document).on('click', '.btn_cancelar_foto_documento', function() {

    var elemento = $(this);

    close_snapshot_documento();

    $(elemento).closest('.complemento_dados_basicos').find('.modal_webcam_documento').modal('hide');

});
</script>

@stop