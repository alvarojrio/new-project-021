@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Clientes | Visualizar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('css/linhadotempo.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-juridica-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Cliente Pessoa Jurídica</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a data-toggle="tab" href="#aba_1" id="tab_1">Dados Gerais</a></li>                           
                            <li><a data-toggle="tab" href="#aba_2" id="tab_2">Contratos</a></li>
                            <li><a data-toggle="tab" href="#aba_3" id="tab_3">Linha do Tempo</a></li>
                        </ul>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- INICIO COLUNA -->
                    <div class="col-xs-12">

                        <!-- INICIO CONTEUDO DAS ABAS -->
                        <div class="tab-content tab_content_customizado">

                            <!-- ###### INICIO ABA 1 ############################# -->
                            <div id="aba_1" class="tab-pane fade in active">

                                <!-- INICIO LINHA -->
                                <div class="row">
                                    
                                    <!-- INICIO COLUNA ESQUERDA -->
                                    <div class="col-md-6 col-xs-12">
                                        
                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa" style="min-height: 472px;">
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
                                                        
                                                                <label class="control-label">CNPJ </label> 

                                                                <br />
                                                                
                                                                <span class="letra-azul-claro">
                                                                <?php
                                                                if (!empty($pessoa_juridica['cnpj'])) {

                                                                    // Exibe valor com máscara já adicionada
                                                                    echo drclub\Biblioteca\FuncoesGlobais::mascaraCnpj($pessoa_juridica['cnpj']);

                                                                } else {

                                                                    echo '-';

                                                                }
                                                                ?>
                                                                </span>
                                                        
                                                            </div>
                     
                                                        </div>
                                                        
                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-12 col-xs-12">
                                                        
                                                                <label class="control-label">Razão Social</label>

                                                                <br />

                                                                <span class="letra-azul-claro"><?php echo mb_strtoupper($pessoa_juridica['razao_social']); ?></span>
                                                                                                                                                                                              
                                                            </div>

                                                        </div>

                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-12 col-xs-12">
                                                        
                                                                <label class="control-label">Nome Fantasia</label>

                                                                <br />

                                                                <span class="letra-azul-claro"><?php echo mb_strtoupper($pessoa_juridica['nome_fantasia']); ?></span>
                                                                                                                                                                                              
                                                            </div>

                                                        </div>

                                                        <!-- Linha -->
                                                        <div class="row">
                                                          
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-6 col-xs-12">
                                                        
                                                                <label class="control-label">Segmento</label>

                                                                <br />

                                                                <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['segmento'])) ? ucwords($pessoa_juridica['segmento']) : '-'; ?></span>  
                                                                
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
                                            <div class="panel-heading">ENDEREÇO</div>
                                            <div class="panel-body">
                                                                                            
                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-6 col-xs-12">
                                                    
                                                        <label class="control-label">CEP </label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['cep_empresa'])) ? $pessoa_juridica['cep_empresa'] : '-'; ?></span>  
                                                        
                                                    </div>
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-sm-6 col-xs-12">

                                                        <label class="control-label">Estado </label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['estado'])) ? $pessoa_juridica['estado'] : '-'; ?></span> 

                                                    </div>

                                                </div>

                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-sm-6 col-xs-12">

                                                        <label class="control-label">Cidade </label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['cidade'])) ? $pessoa_juridica['cidade'] : '-'; ?></span> 

                                                    </div>

                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-6 col-xs-12">
                                                    
                                                        <label class="control-label">Bairro </label> 
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['bairro_empresa'])) ? $pessoa_juridica['bairro_empresa'] : '-'; ?></span> 
                                                                                                                      
                                                    </div>

                                                </div>

                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-12 col-xs-12">
                                                    
                                                        <label class="control-label">Logradouro </label> 
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['logradouro_empresa'])) ? $pessoa_juridica['logradouro_empresa'] : '-'; ?></span>                                                 
                                                                                                                      
                                                    </div>

                                                </div>
                                                
                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-8 col-xs-12">
                                                    
                                                        <label class="control-label">Complemento</label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['complemento_empresa'])) ? $pessoa_juridica['complemento_empresa'] : '-'; ?></span> 
                                                        
                                                    </div>

                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-4 col-xs-12">
                                                        
                                                        <label class="control-label">Número</label>

                                                        <br />

                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['numero_empresa'])) ? $pessoa_juridica['numero_empresa'] : '-'; ?></span> 
                                                        
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

                                                        <br />

                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa_juridica['email_empresa'])) ? $pessoa_juridica['email_empresa'] : '-'; ?></span> 
                                                        
                                                    </div>

                                                </div>

                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-6 col-xs-12">
                                                        
                                                        <label class="control-label">Telefone</label>

                                                        <br />
                                                        
                                                        <span class="letra-azul-claro">
                                                        <?php
                                                        if (!empty($pessoa_juridica['telefone_empresa'])) {

                                                            // Exibe valor com máscara já adicionada
                                                            echo drclub\Biblioteca\FuncoesGlobais::mascaraTelefone($pessoa_juridica['telefone_empresa']);

                                                        } else {

                                                            echo '-';

                                                        }
                                                        ?>
                                                        </span>
                                                        
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
                                    
                                    <div class="col-md-12 col-xs-12">

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">PESSOAS DE CONTATO DA EMPRESA</div>
                                            <div class="panel-body">

                                                Estas serão as pessoas responsáveis por centralizar o contato com a empresa. <br /><br />
                                                
                                                <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>Nome</td>
                                                        <td>Sexo</td>
                                                        <td>Setor</td>
                                                        <td>E-mail</td>
                                                        <td>Telefone 1</td>
                                                        <td>Telefone 2</td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php 
                                                    // Checo se existem proprietários / responsáveis para exibir
                                                    if (count($pessoas_contato) > 0) { 
                                                    ?>

                                                        <?php
                                                        // Faço loop pelos proprietários
                                                        foreach ($pessoas_contato as $pc) :
                                                        ?>

                                                            <tr>
                                                                <td><?php echo $pc->nome; ?></td>
                                                                <td>
                                                                    <?php 
                                                                    switch ($pc->sexo) {
                                                                        case 0:
                                                                            echo 'Não informado';
                                                                        break;

                                                                        case 1:
                                                                            echo 'Masculino';
                                                                        break;

                                                                        case 2:
                                                                            echo 'Feminino';
                                                                        break;
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo (!empty($pc->setor)) ? $pc->setor : '-'; ?></td>
                                                                <td><?php echo (!empty($pc->email)) ? $pc->email : '-'; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if (!empty($pc->telefone1)) {
                                                                        $parte_um = substr($pc->telefone1,0,2);
                                                                        $parte_dois = substr($pc->telefone1,2,5);
                                                                        $parte_tres = substr($pc->telefone1,7,10);

                                                                        echo $monta_telefone = "($parte_um) $parte_dois - $parte_tres";

                                                                    } else {

                                                                        echo '-';

                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if (!empty($pc->telefone2)) {
                                                                        $parte_um = substr($pc->telefone2,0,2);
                                                                        $parte_dois = substr($pc->telefone2,2,5);
                                                                        $parte_tres = substr($pc->telefone2,7,10);

                                                                        echo $monta_telefone = "($parte_um) $parte_dois - $parte_tres";

                                                                    } else {

                                                                        echo '-';

                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        endforeach;
                                                        ?>

                                                    <?php
                                                    } else {
                                                    ?>

                                                        <tr>
                                                            <td colspan="6">Não há registros para serem exibidos</td>
                                                        </tr>

                                                    <?php
                                                    }
                                                    ?>

                                                </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>

                                </div> 
                                <!-- FIM LINHA -->

                                <!-- INICIO LINHA --> 
                                <div class="row">
                                    
                                    <div class="col-md-12 col-xs-12">

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">ARQUIVOS</div>
                                            <div class="panel-body">
                                                
                                                <div class="row">

                                                    <div class="col-md-12 col-xs-12">
                                                        Arquivos relacionados a pessoa jurídica. <br /><br />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12 col-xs-12">

                                                        @if (count($arquivos_pessoa_juridica))

                                                            <table class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nome do Arquivo</th>
                                                                    <th class="text-center">Download</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($arquivos_pessoa_juridica as $arquivo)
                                                                <tr>
                                                                    <td>{{ $arquivo->arquivo }}</td>
                                                                    <td class="text-center"><a href="{{ url(app('prefixo') . '/painel/clientes/pessoajuridica/download-arquivo/' . Crypt::encrypt($arquivo->cod_arquivo_pessoa_juridica)) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i></a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            </table>

                                                        @else

                                                            <span class="letra-vermelho-claro">Não existem arquivos para esta pessoa jurídica.</span> <br /><br />

                                                        @endif

                                                    </div>

                                                </div>
                                                
                                                <!-- BOTÃO UPLOAD DE ARQUIVOS -->
                                                <a class="btn btn-md btn-terciary" id="btn_upload_arquivos" href="javascript:void(null);">
                                                    <i class="fas fa-upload"></i> Upload de Arquivos
                                                </a> 

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>

                                </div> 
                                <!-- FIM LINHA -->  
                                
                                <!-- INICIO LINHA --> 
                                <div class="row" style="margin-top: 30px;">
                                    
                                    <!-- Coluna -->
                                    <div class="col-md-4 col-xs-12">

                                        <!-- BOTÃO EDITAR -->
                                        <a class="btn btn-md btn-info" id="btn_editar_pessoa" href="javascript:void(null);">
                                            <i class="fa fa-edit"></i> Editar Pessoa Jurídica
                                        </a>    

                                    </div>

                                </div>  
                                <!-- FIM LINHA -->                        

                            </div>
                            <!-- ###### FIM ABA 1 ############################# -->

                                             



                            <!-- ###### INICIO ABA 2 ########################## -->
                            <div id="aba_2" class="tab-pane fade">

                                <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>Nº do Contrato</td>
                                        <td>Data de Criação</td>
                                        <td>Data de Cancelamento</td>
                                        <td>Vinculo</td>
                                        <td>Membro Ativo?</td>
                                        <td>Contrato Ativo?</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php
                                    if (count($contratos_pj) > 0) {
                                    ?>

                                        @foreach ($contratos_pj as $cpj)

                                            <?php
                                            // Checo se o contrato está ativo. Então fornece variaveis para sinalizar esta informação na tabela.
                                            if ($cpj->status == 1) {
                                                $eh_contrato_ativo = 1;
                                            } else {
                                                $eh_contrato_ativo = 0;
                                            }
                                            ?>
                                                                                                                        
                                            <tr>        
                                                <td><?php echo $cpj->numero_contrato_pj; ?></td>
                            					<td><?php echo date('d/m/Y', strtotime($cpj->data_inclusao)); ?></td>
                            					<td>
                                                    <?php 
                                                    if (!empty($cpj->data_cancelamento_contrato)) {
                                                        echo date('d/m/Y', strtotime($cpj->data_cancelamento_contrato)); 
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?>
                                                </td>                                                
                                                <td>
                                                    <b>
                                                    RESPONSÁVEL FINANCEIRO
                                                    </b>
                                                </td>
                                                <td>
                                                    <?php if ($eh_contrato_ativo == 0) { ?>                                                                                 
                                                        <i class="fas fa-times" style="color: #f44242; font-size: 17px;"></i>
                                                    <?php } elseif ($eh_contrato_ativo == 1) { ?>
                                                        <i class="fas fa-check" style="color: #4ec458; font-size: 17px;"></i>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($eh_contrato_ativo == 0) { ?>                                                                                 
                                                        <i class="fas fa-times" style="color: #f44242; font-size: 17px;"></i>
                                                    <?php } elseif ($eh_contrato_ativo == 1) { ?>
                                                        <i class="fas fa-check" style="color: #4ec458; font-size: 17px;"></i>
                                                    <?php } ?>
                                                </td>                                                
                                                <td>
                                                    <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar Contrato" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/visualizar/' .  Crypt::encrypt($cpj->cod_contrato_pessoa_juridica_plano)); ?>">
                                                        <i class="fas fa-search"></i>
                                                    </a>
            					                </td>                                                                            
                                            </tr>
                                        
                                        @endforeach

                                    <?php
                                    } else {
                                    ?>
                                        
                                        <tr>
                                            <td colspan="7">
                                                Não há registros para serem exibidos.
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                
                                </tbody>
                                </table>

                            </div>
                            <!-- ###### FIM ABA 2 ############################# -->



                            


                            <!-- ###### INICIO ABA 3 ########################## -->
                            <div id="aba_3" class="tab-pane fade">
                                
                                <?php
                                // Checo se existem logs
                                if (count($logs_pessoa_juridica) > 0) {
                                ?>

                                    <!-- INICIO CAIXA DO FILTRO -->
                                    <div class="box_caixa_filtro">

                                        <!-- INICIO LINHA --> 
                                        <div class="row">	                		

                                            <div class="form-group col-md-6 col-xs-12">
                                                
                                                <label class="control-label">Módulo</label>
                                                <select class="form-control input-sm" name="modulo_busca" id="modulo_busca">
                                                    <option value="">Selecione</option>
                                                    <option value="1">Agendamento</option>
                                                    <option value="2">Atendimento</option>
                                                    <option value="3">Cadastro</option>
                                                    <option value="4">Financeiro</option>
                                                    <option value="5">Médico</option>
                                                </select>
                                                                                                              
                                            </div>

                                            <div class="form-group col-md-6 col-xs-12">
                                                
                                                <label class="control-label">Data do evento</label>
                                                <input type="text" id="data_evento_busca" name="data_evento_busca" class="form-control input-sm" autocomplete="off" placeholder="00/00/0000" />
                                                                                                              
                                            </div>

                                        </div>  
                                        <!-- FIM LINHA --> 

                                        <!-- INICIO LINHA --> 
                                        <div class="row">   

                                            <div class="form-group col-md-12 col-xs-12">

                                                <a class="btn btn-md btn-primary pull-right btn_buscar_lt" href="javascript:void(null);">
                                                    <i class="fas fa-search"></i> Filtrar
                                                </a>

                                                <a class="btn btn-md btn-danger pull-right btn_resetar_lt" href="javascript:void(null);">
                                                    <i class="fa fa-times-circle"></i> Resetar Filtro
                                                </a>

                                            </div>
        	                               
                                        </div>  
                                        <!-- FIM LINHA -->  

                                    </div>
                                    <!-- FIM CAIXA DO FILTRO -->

                                    <br />
                                    
                                    <!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
            	                	<div class="box_alerta_carregando" style="display: none;">
                                        Processando...
            	                	</div>
            	                	<!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                                   
                                    <!-- INICIO CAIXA DE ALERTA DE ERRO -->
    	                            <div class="box_alerta_erro" style="display: none; margin-bottom: 10px;"></div>
                                    <!-- FIM CAIXA DE ALERTA DE ERRO -->
                                    
                                    <!-- Div de titulo da timeline -->
                                    <div class="titulo_ultimos_eventos" style="margin-bottom: 15px; margin-left: 2%;"><h3>Últimos Eventos</h3></div>
                                    
                                    <!-- Div para mostrar quantidade de registros encontrados -->
                                    <div id="qtd-linha-do-tempo" style="margin-bottom: 15px; margin-left: 2%;"></div>
                                        
                                    <!-- Timeline -->
                                    <div class="timeline" id="linha-do-tempo">              
                                        
                                        <!-- Line component -->
                                        <div class="line text-muted timeline-always"></div>

                                        <!-- Separator -->
                                        <div class="separator text-muted timeline-always"></div>
                                        <!-- /Separator -->
                                        
                                        <?php 
                                        foreach ($logs_pessoa_juridica as $lc) : 
                                        ?>
                                            
                                            <!-- Panel -->
                                            <article class="panel panel-primary">

                                                <!-- Icon -->
                                                <div class="panel-heading icon">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                                <!-- /Icon -->

                                                <!-- Heading -->
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                    <?php 
                                                    switch ($lc->modulo) {
                                                        case 1:
                                                            echo 'agendamento';
                                                        break;

                                                        case 2:
                                                            echo 'atendimento';
                                                        break;

                                                        case 3:
                                                            echo 'cadastro';
                                                        break;

                                                        case 4:
                                                            echo 'financeiro';
                                                        break;

                                                        case 5:
                                                            echo 'médico';
                                                        break;
                                                    }
                                                    ?>
                                                    </h4>
                                                </div>
                                                <!-- /Heading -->

                                                <!-- Body -->
                                                <div class="panel-body">

                                                    <!--Informação da caixa-->
                                                    <?php echo $lc->mensagem; ?>

                                                </div>
                                                <!-- /Body -->

                                                <!-- Footer -->
                                                <div class="panel-footer">
                                                    <small><?php echo date('d/m/Y H:i:s', strtotime(str_replace('/', '-', $lc->created_at))); ?></small>
                                                </div>
                                                <!-- /Footer -->

                                            </article>
                                            <!-- /Panel -->

                                        <!-- Separator -->
                                        <div class="separator text-muted"></div>
                                        <!-- /Separator -->

                                        <?php
                                        endforeach;
                                        ?>

                                    </div>
                                    <!-- /Timeline -->

                                <?php
                                } else {
                                ?>
                                    
                                    <br /><br />

                                    <h2 class="text-danger">Não existem eventos para esta linha do tempo.</h2>
                                    
                                    <br /><br />

                                <?php
                                }
                                ?>

                            </div>
                            <!-- ###### FIM ABA 3 ############################# -->

                        </div>
                        <!-- FIM CONTEUDO DAS ABAS -->

                    </div>
                    <!-- FIM COLUNA -->

                </div>
                <!-- FIM LINHA -->


            </div>
        </div>
    </div>
    
</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/limpar_campos_dentro_div.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativação de plugin datepicker no campo data
    $('#data_evento_busca').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });
    


    // Aplicando função no botão BUSCAR (LINHA TEMPO PJ)
    $(document).on('click', '.btn_buscar_lt', function(event) {
    
        event.preventDefault();
        
        // Limpando div de erros
        $('.box_alerta_erro').html('');

        // Limpando linha do tempo
        $('#linha-do-tempo').html('');

        // Limpando qtd linha do tempo
        $('#qtd-linha-do-tempo').html('');

        // Oculta div
        $('.titulo_ultimos_eventos').hide();
        
        // Capto valores dos campos
        var modulo_busca = $('#modulo_busca').val();
        var data_evento_busca = $('#data_evento_busca').val();
                
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoajuridica/buscar-linha-tempo'); ?>",
            data: { 
                "modulo_busca": modulo_busca,
                "data_evento_busca": data_evento_busca,
                "cod_pessoa_juridica": "<?php echo Crypt::encrypt($pessoa_juridica['cod_pessoa_juridica']); ?>"
            },
            beforeSend: function() {
                
                // Revela DIV
                $('.box_alerta_carregando').show();

                // Oculta div
                $('.box_alerta_erro').hide();
                
            },    
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
                    
                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV DE ERRO
                    $('.box_alerta_erro').append('<h4>Atenção</h4>');
                    $('.box_alerta_erro').append(response.erro);
                    $('.box_alerta_erro').show();                     

                } else if (response.status == 'sucesso') {
                    
                    var linha_tempo = response.linha_tempo;
                    
                    // INSERINDO A LINHA DO TEMPO DINAMICAMENTE
                    $('#qtd-linha-do-tempo').append('<small>Registros encontrados: ' + response.qtd_linha_tempo + ' </small>');
                    $('#linha-do-tempo').append(linha_tempo);
                    
                }      

            },
            complete: function(response) {
                
                // Oculta DIV
                $('.box_alerta_carregando').hide(); 
                
            },
            error: function(response, thrownError) {
                // Revela DIV DE ERRO
                $('.box_alerta_erro').append('<h4>Atenção</h4>');
                $('.box_alerta_erro').append('Não foi possivel localizar dados com as informações fornecidas.');
                $('.box_alerta_erro').show();
            }
        }); 
                
    });



    // Aplicando função no botão RESETAR (LINHA TEMPO)
    $(document).on('click', '.btn_resetar_lt', function(event) {

        event.preventDefault();
        
        // Limpando div de erros
        $('.box_alerta_erro').html('');

        // Limpando linha do tempo
        $('#linha-do-tempo').html('');

        // Limpando qtd linha do tempo
        $('#qtd-linha-do-tempo').html('');

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoajuridica/resetar-linha-tempo'); ?>",
            data: { 
                "cod_pessoa_juridica": "<?php echo Crypt::encrypt($pessoa_juridica['cod_pessoa_juridica']); ?>"
            },
            beforeSend: function() {
                
                // Revela DIV
                $('.box_alerta_carregando').show();

                // Oculta div
                $('.box_alerta_erro').hide();
                
            },    
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
                    
                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV DE ERRO
                    $('.box_alerta_erro').append('<h4>Atenção</h4>');
                    $('.box_alerta_erro').append(response.erro);
                    $('.box_alerta_erro').show();                     

                } else if (response.status == 'sucesso') {
                    
                    // Limpo todos os campos dentro da div
                    limpar_campos_dentro_div('.box_caixa_filtro');

                    // Recebo resposta
                    var linha_tempo = response.linha_tempo;
                    
                    // INSERINDO A LINHA DO TEMPO DINAMICAMENTE
                    $('#linha-do-tempo').append(linha_tempo);

                    // Revela DIV
                    $('.titulo_ultimos_eventos').show();
                    
                }      

            },
            complete: function(response) {
                
                // Oculta DIV
                $('.box_alerta_carregando').hide(); 
                
            },
            error: function(response, thrownError) {
                // Revela DIV DE ERRO
                $('.box_alerta_erro').append('<h4>Atenção</h4>');
                $('.box_alerta_erro').append('Não foi possivel localizar dados com as informações fornecidas.');
                $('.box_alerta_erro').show();
            }
        });

    });
    

});
</script>

@stop