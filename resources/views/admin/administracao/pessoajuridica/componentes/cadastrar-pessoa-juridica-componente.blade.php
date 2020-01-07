@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

@stop



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
                <div class="panel panel-default subpanel_pessoa">
                    <div class="panel-heading">INFORMAÇÕES BÁSICAS</div>
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">
                                                            
                            <!-- Inicio Coluna Dados Basicos -->
                            <div class="col-sm-8 col-xs-12">
                                
                                <!-- Linha -->
                                <div class="row">
                                    
                                    <!-- Coluna -->
                                    <div class="form-group col-md-6 col-xs-12">
                                
                                        <label class="control-label">CNPJ <span class="required-red">*</span></label>
                                        <input type="text" id="cnpj" name="cnpj" class="form-control input-sm cnpj" autocomplete="off" autofocus="autofocus" placeholder="00.000.000/0000-00" tabindex="23" />
                                                                                                      
                                    </div>
                                    
                                </div>
                                
                                <!-- Linha -->
                                <div class="row">
                                    
                                    <!-- Coluna -->
                                    <div class="form-group col-md-12 col-xs-12">
                                
                                        <label class="control-label">Razão Social <span class="required-red">*</span></label>
                                        <input type="text" id="razao_social" name="razao_social" class="form-control input-sm letra-maiuscula c_razao_social" autocomplete="off" tabindex="24" />
                                                                                                      
                                    </div>

                                </div>
                                
                                <!-- Linha -->
                                <div class="row">
                                    
                                    <!-- Coluna -->
                                    <div class="form-group col-md-12 col-xs-12">
                                
                                        <label class="control-label">Nome Fantasia <span class="required-red">*</span></label>
                                        <input type="text" id="nome_fantasia" name="nome_fantasia" class="form-control input-sm letra-maiuscula" autocomplete="off" autofocus="autofocus" tabindex="25" />
                                                                                                      
                                    </div>

                                </div>
                                
                            </div>
                            <!-- Fim Coluna Dados Basicos -->
                        
                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->
                        <div class="row">

                            <!-- Inicio Coluna Complemento Dados Basicos -->
                            <div class="col-sm-12 col-xs-12 ">
                                                                    
                                <!-- Linha -->
                                <div class="row">
                                    
                                    <!-- Coluna -->
                                    <div class="form-group col-md-12 col-xs-12">
                                
                                        <label class="control-label">Segmento</label>
                                        <input type="text" id="segmento" name="segmento" class="form-control input-sm" autocomplete="off" tabindex="26" />
                                                                                                      
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
                                <input type="text" id="cep_empresa" name="cep_empresa" class="form-control input-sm cep" autocomplete="off" placeholder="00000-000" tabindex="27" />
                                                                                              
                            </div>
                            
                            <!-- Coluna -->
                            <div class="form-group col-sm-6 col-xs-12">

                                <label class="control-label">Estado <span class="required-red">*</span></label>
                                <select class="form-control input-sm estado" name="estado" id="estado" tabindex="28">
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
                                <select class="form-control input-sm cidade" name="cidade" id="cidade" tabindex="29">
                                    <option value="">Selecione um estado</option>
                                </select>

                            </div>

                            <!-- Coluna -->
                            <div class="form-group col-md-6 col-xs-12">
                            
                                <label class="control-label">Bairro <span class="required-red">*</span></label>
                                <input type="text" id="bairro_pj" name="bairro_pj" class="form-control input-sm bairro" autocomplete="off" tabindex="30" />
                                                                                              
                            </div>

                        </div>

                        <!-- Linha -->
                        <div class="row">
                            
                            <!-- Coluna -->
                            <div class="form-group col-md-12 col-xs-12">
                            
                                <label class="control-label">Logradouro <span class="required-red">*</span></label>
                                <input type="text" id="logradouro_pj" name="logradouro_pj" class="form-control input-sm logradouro" autocomplete="off" tabindex="31" />
                                                                                              
                            </div>

                        </div>

                        <!-- Linha -->
                        <div class="row">
                            
                            <!-- Coluna -->
                            <div class="form-group col-md-8 col-xs-12">
                            
                                <label class="control-label">Complemento</label>
                                <input type="text" id="complemento_pj" name="complemento_pj" class="form-control input-sm" autocomplete="off" tabindex="32" />
                                                                                              
                            </div>

                            <!-- Coluna -->
                            <div class="form-group col-md-4 col-xs-12">
                                
                                <label class="control-label">Número <span class="required-red">*</span></label>
                                <input type="text" id="numero_pj" name="numero_pj" class="form-control input-sm" autocomplete="off" tabindex="33" />

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
                <div class="panel panel-default subpanel_pessoa_b">
                    <div class="panel-heading">CONTATO</div>
                    <div class="panel-body">
                        
                        <!-- Linha -->
                        <div class="row">
                            
                            <!-- Coluna -->
                            <div class="form-group col-md-6 col-xs-12">
                                
                                <label class="control-label">Telefone</label>
                                <input type="text" id="telefone_empresa" name="telefone_empresa" class="form-control input-sm telefone" autocomplete="off" placeholder="(00) 0000-0000" tabindex="34" />

                            </div>

                            <!-- Coluna -->
                            <div class="form-group col-md-6 col-xs-12">
                                
                                <label class="control-label">E-mail</label>
                                <input type="email" id="email_empresa" name="email_empresa" class="form-control input-sm c_email" autocomplete="off" tabindex="35" />

                            </div>

                        </div>

                    </div>
                </div>
                <!-- FIM PANEL -->

            </div>
            <!-- FIM COLUNA -->

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

                        Estas serão as pessoas responsáveis por centralizar o contato com a empresa. <br /><br />
                        
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
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Nome <span class="required-red">*</span></label>
                                                <input type="text" id="nome_responsavel_1" name="nome_responsavel_1" class="form-control input-sm letra-maiuscula" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>
                                        
                                        <!-- Linha -->
                                        <div class="row">
                                            
                                            <!-- Coluna -->
                                            <div class="form-group col-sm-12 col-xs-12">

                                                <label class="control-label">Sexo </label>
                                                <select class="form-control input-sm" name="sexo_responsavel_1" id="sexo_responsavel_1">
                                                    <option value="">Selecione</option>
                                                    <option value="2">Feminino</option>
                                                    <option value="1">Masculino</option>                                                
                                                </select>

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Setor </label>
                                                <input type="text" id="setor_responsavel_1" name="setor_responsavel_1" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">E-mail </label>
                                                <input type="text" id="email_responsavel_1" name="email_responsavel_1" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Telefone 1 <span class="required-red">*</span></label>
                                                <input type="text" id="telefone1_responsavel_1" name="telefone1_responsavel_1" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Telefone 2 </label>
                                                <input type="text" id="telefone2_responsavel_1" name="telefone2_responsavel_1" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

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
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Nome </label>
                                                <input type="text" id="nome_responsavel_2" name="nome_responsavel_2" class="form-control input-sm letra-maiuscula" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>
                                        
                                        <!-- Linha -->
                                        <div class="row">
                                            
                                            <!-- Coluna -->
                                            <div class="form-group col-sm-12 col-xs-12">

                                                <label class="control-label">Sexo </label>
                                                <select class="form-control input-sm" name="sexo_responsavel_2" id="sexo_responsavel_2">
                                                    <option value="">Selecione</option>
                                                    <option value="2">Feminino</option>
                                                    <option value="1">Masculino</option>                                                
                                                </select>

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Setor </label>
                                                <input type="text" id="setor_responsavel_2" name="setor_responsavel_2" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">E-mail </label>
                                                <input type="text" id="email_responsavel_2" name="email_responsavel_2" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Telefone 1 </label>
                                                <input type="text" id="telefone1_responsavel_2" name="telefone1_responsavel_2" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

                                            </div>

                                        </div>

                                        <!-- Linha -->
                                        <div class="row">

                                            <!-- Coluna -->
                                            <div class="form-group col-md-12 col-xs-12">

                                                <label class="control-label">Telefone 2 </label>
                                                <input type="text" id="telefone2_responsavel_2" name="telefone2_responsavel_2" class="form-control input-sm" autocomplete="off" autofocus="autofocus" />

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
        
        <!-- INICIO LINHA --> 
        <div class="row">

            <!-- Início Div PANEL ARQUIVO -->
            <div class="col-md-12 col-xs-12 complemento_arquivo coluna_arquivo">

                <!-- INICIO PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">ARQUIVOS</div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-12 col-xs-12">
                                Arquivos relacionados a pessoa jurídica. <br /><br />
                            </div>

                        </div>

                        <!-- Linha -->
                        <div class="row">

                            <!-- Coluna -->
                            <div class="col-sm-6 col-xs-12">

                                <label class="control-label">Documento com foto (<span data-tooltip="tooltip" data-placement="right" title="Restrições: Apenas arquivos com extensões PDF, JPG, JPEG ou PNG." class="yellow-tooltip"><span class="required-red">?</span></span>)</label>

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
   


<hr />

<!-- BOTÃO PARA SALVAR FORMULARIO -->
<a class="btn btn-md <?php if ($origem == 'cadastrarcontrato' || $origem == 'gerenciarmembros') { ?>btn-primary<?php } else { ?>btn-success<?php } ?> pull-right" id="btn_salvar_pj" href="javascript:void(null);" role="button">
    <i class="fa fa-save"></i> Cadastrar Pessoa Jurídica
</a>

<div class="clearfix"></div>            



@section('includes_no_body_2')

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
<script type="text/javascript" src="<?php echo asset('js/combos_estados_cidades.js'); ?>"></script> <!-- Arquivo responsável pelo preenchimento dinâmico dos comboboxes de estado/cidade -->
<script type="text/javascript" src="<?php echo asset('js/preenche_endereco.js'); ?>"></script> <!-- Arquivo responsável pelo preenchimento dinâmico dos campos de endereço utilizando o CEP digitado -->
<script type="text/javascript" src="<?php echo asset('js/calcular_idade.js'); ?>"></script><!-- Arquivo responsável pelo cálculo da idade utilizando a data de nascimento (dividida em partes) como parametro -->
<script type="text/javascript" src="<?php echo asset('js/limpar_campos_dentro_div.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativação de máscaras de campos 
    $('.cnpj').mask('00.000.000/0000-00');
    $('.cpf').mask('000.000.000-00');
    $('.cep').mask('00000-000');
    $('.telefone').mask('(00) 0000-0000');
    $('.celular').mask('(00) 00000-0000');
    $('#telefone1_responsavel_1').mask('(00) 0000-0000');
    $('#telefone1_responsavel_2').mask('(00) 0000-0000');
    $('#telefone2_responsavel_1').mask('(00) 0000-0000');
    $('#telefone2_responsavel_2').mask('(00) 0000-0000');
    
    // Ativação de máscaras de campos 
    $('#cpf_busca').mask('000.000.000-00');

    // Garante que apenas números sejam digitados no campo cpf_busca
    $(document).on('keyup', '#cpf_busca', function() {
        this.value = this.value.replace(/[^0-9]/g,'');
    });
       
    
    // Controle de caracteres permitidos no campo
    $('.c_razao_social').on('input blur keyup paste', function() {

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




    /**************************************************************
     #
     # Atribui função ao evento blur dos inputs com a classe .cnpj
     # 
    ***************************************************************/ 
    $(document).on('blur', '.cnpj', function() { 
        
        // Definição de variaveis
        var cnpj_para_buscar = $(this).val();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: 'POST',
            url: "<?php echo url(app("prefixo") . '/painel/clientes/pessoajuridica/buscar-por-cnpj'); ?>",
            data: { 
                'cnpj_para_buscar': cnpj_para_buscar,
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
                $('.msg_erro_cadastrar_pj').html('');

                // Oculta DIV
                $('.msg_erro_cadastrar_pj').hide();

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

                    //console.log('Nenhuma empresa encontrada');

                } else if (result == 'cnpj-vazio') {

                    //console.log('CNPJ informado vazio');

                } else {

                    // Coloco mensagem dentro da div de erros e exibo o elemento
                    $('.msg_erro_cadastrar_pj').append('<h4 class="pt-0">Alerta</h4>');
                    $('.msg_erro_cadastrar_pj').append(result);
                    $('.msg_erro_cadastrar_pj').show();

                    // Volto até o topo da tela para chamar a atenção
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $('.row_msg_erro_cadastrar_pj').offset().top
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
            url: "<?php echo url(app("prefixo") . '/painel/clientes/pessoajuridica/documento-upload'); ?>",
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
 



    /************************************
     #
     # Aplicando função no botão SALVAR PESSOA JURIDICA [FORMULARIO]
     # Cadastra a empresa no banco
     # 
    *************************************/ 
    $(document).on('click', '#btn_salvar_pj', function(e) {
        
        // Previne ação default do elemento
        e.preventDefault();
        
        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Limpo e oculto div de erros
        $('.msg_erro_cadastrar_pj').html('');
        $('.msg_erro_cadastrar_pj').hide();
        
        // Declaração de variaveis
        var elemento = $(this);
        var form_valido_pj = true;
        
        // Reuno dados do formulário
        var cnpj = $('#cnpj').val();   
        var razao_social = $('#razao_social').val();
        var nome_fantasia = $('#nome_fantasia').val();
        var segmento = $('#segmento').val();
        var cep_empresa = $('#cep_empresa').val();
        var estado = $('#estado').val();
        var cidade = $('#cidade').val();
        var bairro_empresa = $('#bairro_pj').val();
        var logradouro_empresa = $('#logradouro_pj').val();
        var complemento_empresa = $('#complemento_pj').val();
        var numero_empresa = $('#numero_pj').val();
        var telefone_empresa = $('#telefone_empresa').val();
        var email_empresa = $('#email_empresa').val();                
        var documento_foto_pj = $('#documento_foto_pj').val(); // Documento enviado via upload
        var descricao_documento_foto_pj = $('#descricao_documento_foto_pj').val();

        /* Dados dos responsaveis */
        var nome_responsavel_1 = $('#nome_responsavel_1').val();
        var sexo_responsavel_1 = $('#sexo_responsavel_1').val();
        var setor_responsavel_1 = $('#setor_responsavel_1').val();
        var email_responsavel_1 = $('#email_responsavel_1').val();
        var telefone1_responsavel_1 = $('#telefone1_responsavel_1').val();
        var telefone2_responsavel_1 = $('#telefone2_responsavel_1').val();
        var nome_responsavel_2 = $('#nome_responsavel_2').val();
        var sexo_responsavel_2 = $('#sexo_responsavel_2').val();
        var setor_responsavel_2 = $('#setor_responsavel_2').val();
        var email_responsavel_2 = $('#email_responsavel_2').val();
        var telefone1_responsavel_2 = $('#telefone1_responsavel_2').val();
        var telefone2_responsavel_2 = $('#telefone2_responsavel_2').val();
                    
        /*
        ###########################################
        # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
        ###########################################
        */
       
        var msg_erro_validacao_pj = "";
        
        if (cnpj.length === 0) {
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo CNPJ não foi preenchido corretamente. </br>'; 
        }

        if (razao_social.length === 0) {
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo RAZÃO SOCIAL não foi preenchido corretamente. </br>'; 
        }

        if (nome_fantasia.length === 0) {
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo NOME FANTASIA não foi preenchido corretamente. </br>'; 
        }

        if (cep_empresa.length === 0) {
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo CEP não foi preenchido corretamente. </br>';
        }

        if (estado.length === 0) {                
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo ESTADO não foi preenchido corretamente. </br>';               
        }

        if (cidade.length === 0) {                
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo CIDADE não foi preenchido corretamente. </br>';                
        } 

        if (bairro_empresa.length === 0) {                
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo BAIRRO não foi preenchido corretamente. </br>';                
        }

        if (logradouro_empresa.length === 0) {                
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo LOGRADOURO não foi preenchido corretamente. </br>';               
        }

        if (numero_empresa.length === 0) {                
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo NÚMERO não foi preenchido corretamente. </br>';               
        }
        
        if (telefone_empresa.length > 0) {

            if (telefone_empresa.length < 10) {
                // Sinaliza erro
                form_valido_pj = false;
                // Monto mensagem de erro
                msg_erro_validacao_pj += '- O campo TELEFONE deve possuir pelo menos 10 caracteres. </br>';
            }

        }

        if (nome_responsavel_1.length === 0) {                
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo NOME da pessoa de contato da empresa não foi preenchido corretamente. </br>';               
        }

        if (telefone1_responsavel_1.length === 0) {                
            // Sinaliza erro
            form_valido_pj = false;
            // Monto mensagem de erro
            msg_erro_validacao_pj += '- O campo TELEFONE 1 da pessoa de contato da empresa não foi preenchido corretamente. </br>';               
        }
            
        /*
         ###########################################
         # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
         ###########################################
        */                
         
        // Checo se houve erro no preenchimento dos campos obrigatórios
        if (form_valido_pj == false) {
           
            // Coloco mensagem dentro da div de erros
            $('.msg_erro_cadastrar_pj').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_cadastrar_pj').append(msg_erro_validacao_pj);

            // Exibo div de erros
            $('.msg_erro_cadastrar_pj').show();

            // Volto até o topo da tela para chamar a atenção
            $([document.documentElement, document.body]).animate({
                scrollTop: $('.row_msg_erro_cadastrar_pj').offset().top
            }, 'fast'); 

            // Travo execução do resto da função
            return false;

        }

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app("prefixo") . '/painel/clientes/pessoajuridica/cadastrar'); ?>",
            data: {                 
                "cnpj": cnpj,        
                "razao_social": razao_social,
                "nome_fantasia": nome_fantasia,
                "segmento": segmento,            
                "cep": cep_empresa,
                "estado": estado,
                "cidade": cidade,
                "bairro": bairro_empresa,
                "logradouro": logradouro_empresa,
                "complemento": complemento_empresa,
                "numero": numero_empresa,
                "telefone": telefone_empresa,
                "email": email_empresa,                
                "documento_foto": documento_foto_pj,
                "descricao_documento_foto": descricao_documento_foto_pj,                
                "nome_responsavel_1": nome_responsavel_1,
                "sexo_responsavel_1": sexo_responsavel_1,
                "email_responsavel_1": email_responsavel_1,
                "telefone1_responsavel_1": telefone1_responsavel_1,
                "telefone2_responsavel_1": telefone2_responsavel_1,
                "nome_responsavel_2": nome_responsavel_2,
                "sexo_responsavel_2": sexo_responsavel_2,
                "email_responsavel_2": email_responsavel_2,
                "telefone1_responsavel_2": telefone1_responsavel_2,
                "telefone2_responsavel_2": telefone2_responsavel_2
            },
            beforeSend: function() {
                                
                // Limpa valor da DIV
                $('.msg_erro_cadastrar_pj').html('');

                // Oculta DIV
                $('.msg_erro_cadastrar_pj').hide();
                
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
                    $('.msg_erro_cadastrar_pj').append('<h4 class="pt-0">Alerta</h4>');
                    $('.msg_erro_cadastrar_pj').append(response.erro);  

                    // Exibo div de erros
                    $('.msg_erro_cadastrar_pj').show();  

                    // Volto até o topo da tela para chamar a atenção
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $('.row_msg_erro_cadastrar_pj').offset().top
                    }, 'fast');                    

                } else if (response.status == 'sucesso') {
                    
                    // Alerta sucesso
                    alert('Empresa cadastrada com sucesso.');

                    // Redireciono
                    window.location.replace("<?php echo url(app('prefixo') . '/painel/clientes'); ?>");
                
                }      

            },
            complete: function(response) {                
                // Soon                
            },
            error: function(response, thrownError) {
                
                // Insiro mensagem de erro dentro da DIV
                $('.msg_erro_cadastrar_pj').append('Falha na requisição. Atualize a página e tente novamente.');

                // Revela DIV
                $('.msg_erro_cadastrar_pj').show();

                // Volto até o topo da tela para chamar a atenção
                $([document.documentElement, document.body]).animate({
                    scrollTop: $('.row_msg_erro_cadastrar_pj').offset().top
                }, 'fast');
                
            }
        });

    });

    

}); 	
</script>

@append